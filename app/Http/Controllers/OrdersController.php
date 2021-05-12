<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrdersController extends Controller
{
    public function userOrders(User $user){
        dd($user->orders());
    }

    public function addOrder(){
        $users = User::get();
        return view('forms.order_form', [
            'users' => $users
        ]);
    }

    public function saveOrder(Request $request){
        // validate
        $this->validate($request,[
            'username' => 'required',
            'product' => 'required'
        ]);
        //store
        DB::table('orders')->insert([
            'user_id' => $request->username,
            'product_name' => $request->product,
            'created_at' =>  \Carbon\Carbon::now()
        ]);

        return back();
    }

    public function editOrder(Order $order){
        // the user will use at the back button
        $user = User::find($order->user_id);
        return view('forms.edit_order', [
            'order' => $order,
            'user' => $user
        ]);
    }

    public function updateOrder(Request $request, Order $order){
        //update order
        $order->product_name = $request->input('product');
        $order->save();

        return back();
    }

    public function deleteOrder(Order $order){
        //delete order
        $order->delete();

        return back();
    }
}
