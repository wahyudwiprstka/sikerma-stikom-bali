@extends('layout.main')

@section('content')
    <div class="flex gap-2 items-center justify-between">
        <h1 class="py-2 pt-4 font-semibold text-xl">Kerjasama Hampir Kadaluarsa</h1>
        <form action="">
            <select name="waktu" id="waktu" class="rounded border-slate-400 py-1 px-2" onchange="this.form.submit()">
                <option value="7" @if ($waktu == 7) selected @endif>1 Minggu</option>
                <option value="30" @if ($waktu == 30) selected @endif>1 Bulan</option>
                <option value="60" @if ($waktu == 60) selected @endif>2 Bulan</option>
                <option value="90" @if ($waktu == 90) selected @endif>3 Bulan</option>
            </select>
        </form>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-2 border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Masa Berlaku
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mitra
                    </th>
                    </th>
                    @can('admin')
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $index => $dokumen)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $documents->firstItem() + $index }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $dokumen->judul }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ Str::upper($dokumen->jenis) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ Str::ucfirst($dokumen->status) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($dokumen->tanggal_awal != null && $dokumen->tanggal_berakhir != null)
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_awal)->format('d F Y') }} ~
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_berakhir)->format('d F Y') }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->mitra->nama }}
                        </td>
                        </td>
                        @can('admin')
                            <td class="px-6 py-4 text-center flex justify-center">
                                <a href="/kerjasama/{{ $dokumen->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="/svg/detail.svg" alt="Detail" class="rounded" />
                                </a>
                                <a href="/kerjasama/{{ $dokumen->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="/svg/edit.svg" alt="Detail" class="rounded" />
                                </a>
                                <form action="/kerjasama/{{ $dokumen->id }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <img src="/svg/delete.svg" alt="Detail" class="rounded" />
                                    </button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="p-4" aria-label="Table navigation">
            {{ $documents->links() }}
        </nav>
    </div>

    <h1 class="py-2 pt-4 font-semibold text-xl">Kerjasama Lewat Dari Tanggal Berakhir</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-2 border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Masa Berlaku
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mitra
                    </th>
                    </th>
                    @can('admin')
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($documentslewat as $index => $dokumen)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $documents->firstItem() + $index + 1 }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $dokumen->judul }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ Str::upper($dokumen->jenis) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->status }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($dokumen->tanggal_awal != null && $dokumen->tanggal_berakhir != null)
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_awal)->format('d F Y') }} ~
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_berakhir)->format('d F Y') }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->mitra->nama }}
                        </td>
                        </td>
                        @can('admin')
                            <td class="px-6 py-4 text-center flex justify-center">
                                <a href="/kerjasama/{{ $dokumen->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="/svg/detail.svg" alt="Detail" class="rounded" />
                                </a>
                                <a href="/kerjasama/{{ $dokumen->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="/svg/edit.svg" alt="Detail" class="rounded" />
                                </a>
                                <form action="/kerjasama/{{ $dokumen->id }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <img src="/svg/delete.svg" alt="Detail" class="rounded" />
                                    </button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="p-4" aria-label="Table navigation">
            {{ $documentslewat->links() }}
        </nav>
    </div>
@endsection
