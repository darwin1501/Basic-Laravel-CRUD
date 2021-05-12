<table class="table-auto border-2 border-gray-400 p-2">
    <thead class="border-2 border-gray-400 p-2">
      <tr>
        <th class="border-2 border-gray-400 p-2">Username</th>
        <th class="border-2 border-gray-400 p-2">Email</th>
        <th class="border-2 border-gray-400 p-2">Actions</th>
      </tr>
    </thead>
    <tbody class="border-2 border-gray-400 p-2">
      @if(count($users) > 0)
        @foreach ($users as $user)
          <tr class="border-2 border-gray-400 p-2">
            <td class="border-2 border-gray-400 p-2">
              <a href="{{ route('profile', $user) }}" class="hover:text-blue-400 hover:underline">{{$user->name}}</a>
            </td>
            <td class="border-2 border-gray-400 p-2">{{$user->email}}</td>
            <td>
              <div class="flex space-x-4 p-2">
                {{ Form::open(array('url' => route('edit', $user), 'method' => 'GET')) }}
                  {{ Form::submit('Edit', [
                'class' => 'rounded-lg p-2 pl-4 pr-4 w-full bg-blue-400 cursor-pointer text-white'
                ])}}
                {{ Form::close() }}
                {{ Form::open(array('url' => route('delete', $user), 'method' => 'POST')) }}
                    @method('DELETE')
                  {{ Form::submit('Delete', [
                'class' => 'rounded-lg p-2 w-full bg-red-400 cursor-pointer text-white'
                ])}}
                {{ Form::close() }}
              </div> 
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td></td>
          <td class="mt-5 p-2 w-full">No Records to show</td>
          <td></td>
        </tr>
      @endif
    </tbody>
  </table>
