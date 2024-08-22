@extends('layout.main')

@section('content')
    <section class="dark:bg-gray-900 lg:mt-0">
        <div class="bg-white py-8 px-8 mx-auto max-w-4xl rounded border mt-1">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Bagian</h2>
            <form action="/bagian" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_bagian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Bagian</label>
                        <input type="text" name="nama_bagian" id="nama_bagian"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan nama bagian" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="klasifikasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klasifikasi
                            Bagian</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="id_klasifikasi_bagian" id="id_klasifikasi_bagian">
                            @foreach ($klasifikasiBagians as $klasbag)
                                <option value={{ $klasbag->id }}>{{ $klasbag->klasifikasi }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-600">Klasifikasi bagian tidak ditemukan? <a
                                href="/klasifikasi-bagian/create" class="text-blue-600 hover:text-blue-800">tambah
                                klasifikasi</a></p>
                    </div>
                </div>
                <button type="submit"
                    class="w-full px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </section>
@endsection
