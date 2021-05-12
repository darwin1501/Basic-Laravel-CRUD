@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 rounded-lg bg-white p-8 m-4 justify-center">
            {{-- loop start --}}
            <select name="username" id="username" class="rounded-lg p-4 w-full border-2 border-gray-300 mb-3">
                <option value=""> -- Select Users --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach 
            </select>
            {{-- loop end --}}
            {{ Form::submit('Add', [
                'class' => 'rounded-lg p-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
            {{ Form::close() }} 
        </div>
    </div>
@endsection