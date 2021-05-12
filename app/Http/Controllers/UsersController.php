<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\ProfileController;

class UsersController extends Controller
{
    public function getAllUser(){
        $users = User::latest()->get();
        return view('home', [
            'checkDuplicates'=>'no error',
            'users' => $users
        ]);
    }

    public function editUser(User $user){
        // dd($user->name);
        return view('forms.user_edit_form', [
            'user' => $user,
            'checkDuplicates'=>'no error'
        ]);
    }
    public function updateUser(Request $request, User $user){
        // dd($id);
        //validate inputs
        $this->validate($request,[
            'username' => 'required',
            'email' => 'required|email'
        ]);

        //check if theres an error
        //this will catch the error on similar email
        try{
            // insert data to Users table
            // $user = User::find($id);
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->save();
        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                //show the old user input after reload
                session()->flashInput($request->input());
                //return with a value that will use
                //on user.edit_form view to show error message of
                //duplicate email.
                return back()->with('emailChecker', 'email already used');
            }
        }
        // return with no error value
        return back();
    }
    //store data to darabase
    public function post(Request $request)
    {
        //validate inputs
        $this->validate($request,[
            'username' => 'required',
            'email' => 'required|email'
        ]);

        //check if theres an error
        //this will catch the error on similar email
        try{
               // insert data to Users table
            DB::table('users')->insert([
                'name' => $request->username,
                'email' => $request->email,
                'created_at' =>  \Carbon\Carbon::now()
            ]);
        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                //show the old user input after reload
                session()->flashInput($request->input());

                return back()->with('emailChecker', 'email already used');
            }
        }
        return back()->with('emailChecker', 'no error');
    }
    public function deleteUser(User $user){
       
        //delete all the user orders first
        $orders = $user->orders()->get();
        foreach($orders as $order){
            $order->delete();
        }
        //then delete the user
        $user->delete();

        return back();
    }
}
