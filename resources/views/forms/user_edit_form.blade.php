@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 rounded-lg bg-white p-8 m-4">
            {{ Form::open(array('url' => route('home'), 'method' => 'GET')) }}
                {{ Form::submit('Back', [
              'class' => 'rounded-lg p-2 w-1/4 bg-blue-400 cursor-pointer text-white'
              ])}}
            {{ Form::close() }}
            <p class="mb-4 text-center">Edit User</p>
            {{ Form::open(array('url' => route('edit.post', $user), 'method' => 'POST')) }}
            @error('username')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            {{Form::text('username', $user->name,[
                'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-2'.($errors->has('username') ? 'border-red-500' : null),
                'placeholder' => 'username'
                ])}} 
            @error('email')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            {{-- the session()->get('emailChecker') will get the value that is passed in when returning 
            on updateUser method on UsersController --}}
            @if (session()->get('emailChecker') === 'email already used')
                <div class="text-red-500 mt-2 mb-2 text-sm">
                    {{session()->get('emailChecker')}}
                </div>
            @endif
            {{Form::text('email', $user->email,[
                'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-4',
                'placeholder' => 'email'
                ])}} 
            {{ Form::submit('Update', [
                'class' => 'rounded-lg p-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
            {{ Form::close() }} 
        </div>
    </div>
@endsection