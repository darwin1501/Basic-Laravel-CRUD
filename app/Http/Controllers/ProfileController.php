<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class ProfileController extends Controller
{
    public function userInfo(User $user){
        // dd($user->id);
        // $order = Order::find($user->id)->get();
        // dd($user->orders()->get());
        // $user->orders()->id();
        $orders = $user->orders()->get();
        return view('profile', [
            'user' => $user,
            'orders' => $orders
        ]);
    }
}
