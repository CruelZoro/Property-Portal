@extends('layouts.dashboardmaster')
@section('content')
    <br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if ($message = Session::get('success'))
            <div class="">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ ++$i }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->user_status }}
                            </td>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <td class="flex px-6 py-4 space-x-2 " >
                               <a href="{{ route('users.show',$user->id)}}">  <button 
                                    class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                                    View
                                </button> </a>
                                <form action="{{ route('users.unblock', $user->id) }}" method="put">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 font-semibold text-green-700 bg-transparent border border-green-500 rounded hover:bg-green-500 hover:text-white hover:border-transparent">Unblock</button>
                                </form>
                                
                                <form action="{{ route('users.delete', $user->id) }}"  method="POST">
                                    @csrf
                                        @method('delete')
                                    <button class="px-4 py-2 font-semibold text-red-700 bg-transparent border border-red-500 rounded hover:bg-red-500 hover:text-white hover:border-transparent"
                                type="submit" >
                                Delete
                                </form>
                               

                            </td>

                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $data->render() !!}
@endsection
