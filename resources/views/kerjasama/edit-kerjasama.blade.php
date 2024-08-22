@extends('layout.main')

@section('content')
    <section class="bg-white dark:bg-gray-900 lg:mt-0">
        <div class="py-8 px-4 mx-auto max-w-2xl">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('dokumenError'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ session('dokumenError') }}
                </div>
            @endif
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Dokumen Kerjasama</h2>
            <form action="/kerjasama/{{ $kerjasama->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Dokumen</label>
                        <input type="text" name="judul" id="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan judul dokumen" required value='{{ $kerjasama->judul }}'>
                        @error('judul')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Dokumen</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="jenis" id="jenis" value={{ $kerjasama->jenis }}>
                            <option value={{ $kerjasama->jenis }} selected hidden>{{ $kerjasama->jenis }}</option>
                            <option value="MOU">MOU</option>
                            <option value="MOA">MOA</option>
                            <option value="Realisasi">Realisasi</option>
                            <option value="IA">IA</option>
                            <option value="Laporan Pelaksanaan Kerjasama">Laporan Pelaksanaan Kerjasama</option>
                        </select>
                    </div>
                    @error('jenis')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="sm:col-span-2">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="status" id="status">
                            @if ($kerjasama->status == 'aktif')
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                                <option value="kadaluarsa">Kadaluarsa</option>
                                <option value="dalam perpanjangan">Dalam Perpanjangan</option>
                            @elseif($kerjasama->status == 'tidak aktif')
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak aktif" selected>Tidak Aktif</option>
                                <option value="kadaluarsa">Kadaluarsa</option>
                                <option value="dalam perpanjangan">Dalam Perpanjangan</option>
                            @elseif($kerjasama->status == 'kadaluarsa')
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                                <option value="kadaluarsa" selected>Kadaluarsa</option>
                                <option value="dalam perpanjangan">Dalam Perpanjangan</option>
                            @elseif($kerjasama->status == 'dalam perpanjangan')
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                                <option value="kadaluarsa">Kadaluarsa</option>
                                <option value="dalam perpanjangan" selected>Dalam Perpanjangan</option>
                            @endif

                        </select>
                    </div>
                    @error('status')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="sm:col-span-2">
                        <label for="tanggal_awal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ $kerjasama->tanggal_awal }}>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tanggal_berakhir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Berakhir</label>
                        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ $kerjasama->tanggal_berakhir }}>
                    </div>
                    <div class="col-span-2">
                        <label for="no_dokumen_stikom"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Dokumen (Stikom)</label>
                        <input type="text" name="no_dokumen_stikom" id="no_dokumen_stikom"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan nomor dokumen (stikom)"
                            value={{ $kerjasama->dokumen->no_dokumen_stikom }}>
                        @error('no_dokumen_stikom')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="no_dokumen_mitra"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Dokumen (Mitra)</label>
                        <input type="text" name="no_dokumen_mitra" id="no_dokumen_mitra"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan nomor dokumen (stikom)"
                            value={{ $kerjasama->dokumen->no_dokumen_mitra }}>
                        @error('no_dokumen_mitra')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="id_mitra"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mitra</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="id_mitra" id="id_mitra">
                            @foreach ($mitras as $mitra)
                                <option {{ $kerjasama->id_mitra == $mitra->id ? 'selected' : '' }}
                                    value="{{ $mitra->id }}">
                                    {{ $mitra->nama }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-600">Mitra tidak ditemukan? <a href="/mitra/create"
                                class="text-blue-600 hover:text-blue-800">tambah
                                mitra</a></p>
                    </div>
                    @error('mitra')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="col-span-2" id="dasar">
                        <label for="id_mou" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dasar
                            Dokumen Kerjasama (Optional)</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="id_mou" onchange="checkDocument()">
                            <option></option>
                            @foreach ($mous as $mou)
                                <option {{ $kerjasama->id_mou == $mou->id ? 'selected' : '' }}
                                    value="{{ $mou->id }}">
                                    {{ $mou->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="deskripsi" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Deskripsi dokumen/kerjasama" name="deskripsi">{{ $kerjasama->deskripsi }}</textarea>
                    </div>

                    <div class="flex items-center justify-center w-full col-span-2">
                        <label for="dropzone-file"
                            class="flex relative flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <div id="file-upload-text" class="">
                                    @if ($kerjasama->dokumen == null)
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click
                                                to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX.
                                            2MB)
                                        </p>
                                    @endif
                                </div>
                                @if ($kerjasama->dokumen != null)
                                    <p id="file-uploaded-text" class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $kerjasama->dokumen->dokumen }}</p>
                                @endif
                            </div>
                            <input id="dropzone-file" type="file" name="dokumen" accept="application/pdf"
                                class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                value="/storage/dokumen/{{ $kerjasama->dokumen }}" />
                        </label>
                    </div>
                    @error('dokumen')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 w-full transition">
                    Submit
                </button>
            </form>
        </div>
    </section>
@endsection
