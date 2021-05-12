@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/4 bg-white rounded p-6 m-10">
            {{ Form::open(array('url' => route('home'), 'method' => 'GET')) }}
                {{ Form::submit('Back', [
              'class' => 'rounded-lg p-1 pl-2 pr-2 bg-blue-400 cursor-pointer text-white'
              ])}}
            {{  Form::close() }}
            <p class="text-center mb-2 font-bold">Profile info</p>
            <div>
                <p class="mb-2">Username: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
            </div>
            {{ Form::open(array('url' => route('edit', $user), 'method' => 'GET')) }}
                  {{ Form::submit('Edit Profile', [
                'class' => 'rounded-lg p-2 pl-4 pr-4 mt-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
            {{ Form::close() }}
            <p class="text-center mb-2 mt-4 font-bold">Orders</p>
            <label class="font-bold">Total Order:</label> <label>{{$orders->count()}} {{Str::plural('order', $orders->count())}}</label>
            @foreach ($orders as $order)
                <div class="flex mt-2">
                    <label>{{ $order->product_name }}</label>
                    {{ Form::open(array('url' => route('order.edit', $order), 'method' => 'GET')) }}
                        {{ Form::submit('Edit', [
                        'class' => 'rounded-lg w-1/4 pr-8 pl-2 ml-auto bg-blue-400 cursor-pointer text-white'
                        ])}}
                    {{  Form::close() }}
                    {{ Form::open(array('url' => route('order.delete', $order), 'method' => 'Post')) }}
                        @method('DELETE')
                        {{ Form::submit('Delete', [
                        'class' => 'rounded-lg w-1/4 pr-14 pl-2 ml-auto bg-red-400 cursor-pointer text-white'
                        ])}}
                    {{  Form::close() }}
                </div>
            @endforeach
        </div>
    </div>
@endsection