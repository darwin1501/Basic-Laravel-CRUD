@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 rounded-lg bg-white p-8 m-4 justify-center">
            {{ Form::open(array('url' => route('home'), 'method' => 'GET')) }}
            {{ Form::submit('Back', [
            'class' => 'rounded-lg p-2 pr-4 pl-4 mb-4 w-1/4 bg-blue-400 cursor-pointer text-white'
            ])}}
            {{ Form::close() }}
            <p class="mb-4 text-center">Place an Order</p>
            {{ Form::open(array('url' => route('order.post'), 'method' => 'POST')) }}
            @error('username')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <select name="username" id="username" class="rounded-lg p-4 w-full border-2 border-gray-300 mb-3">
                <option value=""> -- Select Users --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach 
            </select>
            @error('product')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            {{ Form::select('product', [
                'apple' => 'apple', 
                'bannana' => 'bannana',
                'chocolate' => 'chocolate'
        ], null, ['placeholder' => 'Select Products', 'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-4'])}}

            {{ Form::submit('Add', [
                'class' => 'rounded-lg p-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
            {{ Form::close() }} 
        </div>
    </div>
@endsection