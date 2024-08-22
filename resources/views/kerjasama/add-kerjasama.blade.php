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
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Kerjasama</h2>
            <form action="/kerjasama" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Kerjasama</label>
                        <input type="text" name="judul" id="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan judul kerjasama" required value={{ old('judul') }}>
                        @error('judul')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Dokumen</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="jenis" id="jenis" value={{ old('jenis') }}>
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
                            name="status" id="status" value={{ old('status') }}>
                            <option value="aktif">Aktif</option>
                            <option value="kadaluarsa">Kadaluarsa
                            </option>
                            <option value="tidak aktif">Tidak Aktif</option>
                            <option value="dalam perpanjangan">Dalam Perpanjangan</option>
                        </select>
                    </div>
                    @error('status')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="sm:col-span-2">
                        <label for="bagian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bagian</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="bagian" id="bagian" value={{ old('bagian') }}>
                            @foreach ($bagian as $bagian)
                                <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-600">Bagian tidak ditemukan? <a href="/bagian/create"
                                class="text-blue-600 hover:text-blue-800">tambah
                                Bagian</a></p>
                    </div>
                    <div class="col-span-2">
                        <label for="bentuk_kerjasama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bentuk
                            Kerjasama</label>
                        <input type="text" name="bentuk_kerjasama" id="bentuk_kerjasama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder='Masukkan bentuk kerjasama' required value={{ old('bentuk_kerjasama') }}>
                        @error('bentuk_kerjasama')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    @error('bagian')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="col-span-2">
                        <label for="durasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi
                            Kerjasama (Tahun)</label>
                        <input type="number" name="durasi" id="durasi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder='Masukkan Durasi. Contoh: "5" Tahun' required value={{ old('durasi') }}>
                        @error('durasi')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    @error('bagian')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="sm:col-span-2">
                        <label for="tanggal_awal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ old('tanggal_awal') }}>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tanggal_berakhir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Berakhir</label>
                        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value={{ old('tanggal_berakhir') }}>
                    </div>
                    <div class="col-span-2 realisasi-hide">
                        <label for="no_dokumen_stikom"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Dokumen (Stikom)</label>
                        <input type="text" name="no_dokumen_stikom" id="no_dokumen_stikom"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan nomor dokumen" value={{ old('no_dokumen_stikom') }}>
                        @error('no_dokumen_stikom')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 realisasi-hide">
                        <label for="no_dokumen_mitra"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Dokumen (Mitra)</label>
                        <input type="text" name="no_dokumen_mitra" id="no_dokumen_mitra"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan nomor dokumen" value={{ old('no_dokumen_mitra') }}>
                        @error('no_dokumen_mitra')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="id_mitra"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mitra</label>
                        <select
                            class="dropdown-with-search bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="id_mitra" id="id_mitra" value={{ old('id_mitra') }}>
                            @foreach ($mitras as $mitra)
                                <option {{ old('id_mitra') == $mitra->id ? 'selected' : '' }}
                                    value="{{ $mitra->id }}">
                                    {{ $mitra->nama }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-600">Mitra tidak ditemukan? <a href="/mitra/create"
                                class="text-blue-600 hover:text-blue-800">tambah
                                mitra</a></p>
                    </div>
                    <div class="realisasi-hide">
                        <label for="ttd_pihak1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanda
                            Tangan Pihak Pertama</label>
                        <input type="text" name="ttd_pihak1" id="ttd_pihak1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan penanda tangan pihak pertama" value={{ old('ttd_pihak1') }}>
                        @error('ttd_pihak1')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="realisasi-hide">
                        <label for="jabatan_pihak1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" name="jabatan_pihak1" id="jabatan_pihak1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan jabatan" value={{ old('jabatan_pihak1') }}>
                        @error('jabatan_pihak1')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="realisasi-hide">
                        <label for="ttd_pihak2"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanda
                            Tangan Pihak Kedua</label>
                        <input type="text" name="ttd_pihak2" id="ttd_pihak2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan penanda tangan pihak kedua" value={{ old('ttd_pihak2') }}>
                        @error('ttd_pihak2')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="realisasi-hide">
                        <label for="jabatan_pihak2"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" name="jabatan_pihak2" id="jabatan_pihak2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan jabatan" value={{ old('jabatan_pihak2') }}>
                        @error('jabatan_pihak2')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pic_pihak_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIC
                            Pihak 1</label>
                        <input type="text" name="pic_pihak_1" id="pic_pihak_1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan jabatan" required value={{ old('pic_pihak_1') }}>
                        @error('pic_pihak_1')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pic_pihak_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIC
                            Pihak 2</label>
                        <input type="text" name="pic_pihak_2" id="pic_pihak_2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan jabatan" required value={{ old('pic_pihak_2') }}>
                        @error('pic_pihak_2')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
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
                                <option {{ old('id_mou') == $mou->id ? 'selected' : '' }} value="{{ $mou->id }}">
                                    {{ $mou->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="deskripsi" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Deskripsi dokumen/kerjasama" name="deskripsi" value={{ old('deskripsi') }}></textarea>
                    </div>

                    <div class="flex items-center justify-center w-full col-span-2 overflow-hidden">
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
