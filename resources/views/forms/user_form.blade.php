
<div class="w-4/12 rounded-lg bg-white p-8 m-4">
    <div class="flex justify-end">
        {{ Form::open(array('url' => route('order'), 'method' => 'GET')) }}
            {{ Form::submit('Add Order', [
            'class' => 'rounded-lg p-2 pr-4 pl-4 mb-4 w-full bg-blue-400 cursor-pointer text-white'
            ])}}
    </div>
    {{ Form::close() }}
    <p class="mb-4 text-center">Add User</p>
    {{ Form::open(array('url' => route('home.post'), 'method' => 'POST')) }}
    @error('username')
        <div class="text-red-500 mt-2 mb-2 text-sm">
            {{ $message }}
        </div>
    @enderror
    {{Form::text('username', old('username'),[
        'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-2'.($errors->has('username') ? 'border-red-500' : null),
        'placeholder' => 'username'
        ])}} 
     @error('email')
        <div class="text-red-500 mt-2 mb-2 text-sm">
            {{ $message }}
        </div>
    @enderror
    @if (session()->get('emailChecker') === 'email already used')
        <div class="text-red-500 mt-2 mb-2 text-sm">
            {{session()->get('emailChecker')}}
        </div>
    @endif
    {{Form::text('email', old('email'),[
        'class' => 'rounded-lg p-4 w-full border-2 border-gray-300 mb-4',
        'placeholder' => 'email'
        ])}} 
    {{ Form::submit('Submit', [
        'class' => 'rounded-lg p-4 w-full bg-blue-400 cursor-pointer text-white'
        ])}}
    {{ Form::close() }} 
</div>
