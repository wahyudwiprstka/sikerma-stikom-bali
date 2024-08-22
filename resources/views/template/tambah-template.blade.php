@extends('layout.main')

@section('content')
    <section class="dark:bg-gray-900 lg:mt-0">
        <div class="py-8 px-8 rounded border mx-auto max-w-4xl bg-white">
            @if (session()->has('dokumenError'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ session('dokumenError') }}
                </div>
            @endif
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Template</h2>
            <form action="/template" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="col-span-2">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Template Dokumen</label>
                        <input type="text"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            name="judul" value={{ old('judul') }}>
                    </div>

                    <div class="items-center justify-center w-full col-span-2 overflow-hidden">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokumen</label>
                        <label for="dropzone-file"
                            class="flex relative flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <div id="file-upload-text" class="">
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click
                                            to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX.
                                        2MB)
                                    </p>
                                </div>
                                <p id="file-uploaded-text" class="mb-2 text-sm text-gray-500 dark:text-gray-400"></p>
                            </div>
                            <input id="dropzone-file" type="file" name="dokumen" accept="application/pdf"
                                class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" required />
                        </label>
                    </div>
                    @error('dokumen')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 w-full">
                    Submit
                </button>
            </form>
        </div>
    </section>
@endsection
