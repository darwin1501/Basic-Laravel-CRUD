@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 rounded-lg bg-white p-8 m-4 justify-center">
            {{ Form::open(array('url' => route('profile', $user), 'method' => 'GET')) }}
            {{ Form::submit('Back', [
            'class' => 'rounded-lg p-2 pr-4 pl-4 mb-4 w-1/4 bg-blue-400 cursor-pointer text-white'
            ])}}
            {{ Form::close() }}
            <div class="flex flex wrap space-x-2 mb-4">
                <p class=" text-center font-bold">Order by:</p>
                <p>{{$user->name}}</p>
            </div>
            {{ Form::open(array('url' => route('order.update', $order->id), 'method' => 'POST')) }}
            @error('product')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            {{ Form::select('product', [
                'apple' => 'apple', 
                'bannana' => 'bannana',
                'chocolate' => 'chocolate'
        ], $order->product_name , ['placeholder' => 'Select Products', 'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-4'])}}

            {{ Form::submit('Update', [
                'class' => 'rounded-lg p-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
            {{ Form::close() }} 
        </div>
    </div>
@endsection