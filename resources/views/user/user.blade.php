@extends('layout.main')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400" role="alert">
                {{ session('failed') }}
            </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        No HP
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Email
                    </th>
                    @can('admin')
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $users->firstItem() + $index }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $user->phonenumber }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->address }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ @ucfirst($user->role) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->email }}
                        </td>
                        <td class="gap-2 px-6 py-4 text-center text-sm">
                            <div class="flex items-center justify-center mb-1">
                                <a href="/user/{{ $user->id }}/edit"
                                    class="block font-medium text-blue-600 dark:text-blue-500 hover:underline items-center">
                                    <img src="svg/edit.svg" alt="Edit" class="rounded" />
                                </a>
                                <form action="/user/{{ $user->id }}" method="post" class="flex items-center">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <img src="svg/delete.svg" alt="Delete" class="rounded" />
                                    </button>
                                </form>
                            </div>
                            @if ($user->role == 'user')
                                <a href="/user/{{ $user->id }}/role?role=admin"
                                    class="block m-auto button-role text-sm bg-blue-700 text-white px-3 py-2 rounded">Change
                                    Role
                                    To Admin</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="p-4" aria-label="Table navigation">
            {{ $users->links() }}
        </nav>
    </div>
@endsection
