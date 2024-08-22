@extends('layout.main')

@section('content')
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <section>
        <div class="profile mt-2 shadow mx-auto py-2 border rounded flex flex-col justify-center bg-white">
            <div class="mb-2">
                <img class="m-auto" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="120"
                    height="120" />
            </div>
            <div class="text-center col-span-5 mx-2">
                <h3 class="font-semibold text-2xl">{{ $user->name }}</h3>
                <p class="text-sm italic mb-6">{{ $user->role }}</p>
                <div class="mb-2">
                    <h3 class="font-semibold pr-2">Email</h3>
                    <h3 class="">{{ $user->email }}</h3>
                </div>
                <div class="mb-2">
                    <h3 class="font-semibold pr-2">Nomor HP</h3>
                    <h3 class="">{{ $user->phonenumber }}</h3>
                </div>
                <div class="mb-6">
                    <h3 class="font-semibold pr-2">Alamat</h3>
                    <h3 class="">{{ $user->address }}</h3>
                </div>
                <div class="">
                    <a href="/user/edit-profile"
                        class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-800 transition duration-200">Edit
                        Profile</a>
                </div>
            </div>
        </div>
    </section>
@endsection
