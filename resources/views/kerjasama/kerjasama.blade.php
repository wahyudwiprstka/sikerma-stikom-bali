@extends('layout.main')

@section('content')
    <form action="/kerjasama" class="mb-2 bg-white py-2 px-2 rounded-lg shadow border-slate-400">

        <div class="grid grid-cols-7 gap-y-4 justify-items-center items-center">

            <p class="row-span-3 text-2xl font-semibold">Sort by:</p>

            <div class="flex items-center col-span-2">
                <label for="klas_mitra" class="block w-[10rem]">Klasifikasi Mitra</label>
                <select name="klas_mitra" id="klas_mitra" class="rounded px-2 py-1 w-[15rem]">
                    @if ($selected_klasmitra != null)
                        <option value={{ $selected_klasmitra->id }} hidden>{{ $selected_klasmitra->klasifikasi }}</option>
                    @endif
                    <option value="">All</option>
                    @foreach ($klas_mitras as $klasmitra)
                        <option value={{ $klasmitra->id }}>{{ $klasmitra->klasifikasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center col-span-2">
                <label for="jenis" class="block w-[10rem]">Jenis Kerjasama</label>
                <select name="jenis" id="jenis" class="rounded px-2 py-1 w-[15rem]">
                    @if ($selected_jenis != null)
                        <option value="{{ $selected_jenis }}" hidden selected>{{ $selected_jenis }}</option>
                    @endif
                    <option value="">All</option>
                    <option value="MOU">MOU</option>
                    <option value="MOA">MOA</option>
                    <option value="Realisasi">Realisasi</option>
                    <option value="IA">IA</option>
                    <option value="Laporan Pelaksanaan Kerjasama">Laporan Pelaksanaan Kerjasama</option>
                </select>
            </div>

            <div class="flex items-center col-span-2">
                <label for="tahun" class="block w-[10rem]">Tahun</label>
                <select name="tahun" id="tahun" class="rounded px-2 py-1 w-[15rem]">
                    @if ($selected_tahun != null)
                        <option value={{ $selected_tahun }} hidden>{{ Str::ucfirst($selected_tahun) }}</option>
                    @endif
                    <option value="">All</option>
                    @foreach ($tahun_kerjasama as $tahunkerjasama)
                        <option value={{ $tahunkerjasama->tahun }}>{{ $tahunkerjasama->tahun }}</option>
                    @endforeach
                    {{-- <option value="aktif">Aktif</option>
                    <option value="kadaluarsa">Kadaluarsa</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                    <option value="dalam perpanjangan">Dalam Perpanjangan</option> --}}
                </select>


            </div>

            <div class="flex items-center col-span-2">
                <label for="status" class="block w-[10rem]">Status</label>
                <select name="status" id="status" class="rounded px-2 py-1 w-[15rem]">
                    @if ($selected_status != null)
                        <option value="{{ $selected_status }}" hidden>{{ Str::ucfirst($selected_status) }}</option>
                    @endif
                    <option value="">
                        All</option>
                    <option value="aktif">Aktif</option>
                    <option value="kadaluarsa">Kadaluarsa</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                    <option value="dalam perpanjangan">Dalam Perpanjangan</option>
                </select>
            </div>

            <div class="flex items-center col-span-2">
                <label for="bagian" class="block w-[10rem]">Bagian</label>
                <select name="bagian" id="bagian" class="rounded px-2 py-1 w-[15rem]">
                    @if ($selected_bagian != null)
                        <option value="{{ $selected_bagian->id }}" hidden>
                            {{ Str::ucfirst($selected_bagian->nama_bagian) }}</option>
                    @endif
                    <option value="">All</option>
                    @foreach ($bagianAll as $bagian)
                        <option value={{ $bagian->id }}>{{ $bagian->nama_bagian }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="bg-blue-600 rounded px-2 py-1 text-white mx-auto col-span-5 w-[30rem]">Submit</button>
        </div>

    </form>

    @can('admin')
        <div class="flex justify-between">
            <form class="flex gap-2 mb-2" action="/kerjasama" method="get">
                @csrf
                <input class="rounded" type="text" name="search" id="search">
                <button type="submit"
                    class="hover:bg-sky-800 duration-200 transition-all flex items-center gap-2 bg-sky-700 rounded text-white px-2 text-sm">Search</button>
            </form>
            <form action="/kerjasama/create" method="get">
                @csrf
                <button type="submit"
                    class="hover:bg-green-700 duration-200 transition-all flex items-center gap-2 bg-green-600 rounded text-white py-2 px-2 text-sm"><img
                        src="/svg/plus.svg" alt="plus image" width="10px" height="10px" /><span>Tambah
                        Kerjasama</span></button>
            </form>
        </div>
    @endcan

    @can('user')
        <form class="flex gap-2 mb-2" action="/kerjasama" method="get">
            @csrf
            <input class="rounded" type="text" name="search" id="search">
            <button type="submit"
                class="hover:bg-sky-800 duration-200 transition-all flex items-center gap-2 bg-sky-700 rounded text-white px-2 text-sm">Search</button>
        </form>
    @endcan

    @if (session()->has('success'))
        <div class="shadow p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-2 border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'id')
                            <a href="/kerjasama?orderby=id&order=asc">
                            @elseif ($orderby == 'id' && $order == 'asc')
                                <a href="/kerjasama?orderby=id&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">No</h3>
                            @if ($orderby != 'id')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'id' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'judul')
                            <a href="/kerjasama?orderby=judul&order=asc">
                            @elseif ($orderby == 'judul' && $order == 'asc')
                                <a href="/kerjasama?orderby=judul&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">Judul</h3>
                            @if ($orderby != 'judul')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'judul' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'jenis')
                            <a href="/kerjasama?orderby=jenis&order=asc">
                            @elseif ($orderby == 'jenis' && $order == 'asc')
                                <a href="/kerjasama?orderby=jenis&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">Jenis</h3>
                            @if ($orderby != 'jenis')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'jenis' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'status')
                            <a href="/kerjasama?orderby=status&order=asc">
                            @elseif ($orderby == 'status' && $order == 'asc')
                                <a href="/kerjasama?orderby=status&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">Status</h3>
                            @if ($orderby != 'status')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'status' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'durasi')
                            <a href="/kerjasama?orderby=durasi&order=asc">
                            @elseif ($orderby == 'durasi' && $order == 'asc')
                                <a href="/kerjasama?orderby=durasi&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">Durasi</h3>
                            @if ($orderby != 'durasi')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'durasi' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        @if ($orderby != 'tanggal_awal')
                            <a href="/kerjasama?orderby=tanggal_awal&order=asc">
                            @elseif ($orderby == 'tanggal_awal' && $order == 'asc')
                                <a href="/kerjasama?orderby=tanggal_awal&order=desc">
                                @else
                                    <a href="/kerjasama">
                        @endif
                        <div class="flex items-center justify-center">
                            <h3 class="mr-2">Masa Berlaku</h3>
                            @if ($orderby != 'tanggal_awal')
                                <i class="fa-sharp fa-solid fa-sort"></i>
                            @elseif($orderby == 'tanggal_awal' && $order == 'asc')
                                <i class="fa-sharp fa-solid fa-sort-up"></i>
                            @else
                                <i class="fa-sharp fa-solid fa-sort-down"></i>
                            @endif
                        </div>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mitra
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Bagian
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $index => $dokumen)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer">
                        <th scope="row"
                            class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $documents->firstItem() + $index }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $dokumen->judul }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->jenis }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ Str::ucfirst($dokumen->status) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->durasi }} Tahun
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($dokumen->tanggal_awal != null && $dokumen->tanggal_berakhir != null)
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_awal)->format('d F Y') }} ~
                                {{ \Carbon\Carbon::parse($dokumen->tanggal_berakhir)->format('d F Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->mitra->nama }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $dokumen->bagians->nama_bagian }}
                        </td>
                        </td>
                        @can('admin')
                            <td class="px-6 py-4 text-center flex justify-center">
                                <a href="/kerjasama/{{ $dokumen->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="svg/detail.svg" alt="Detail" class="rounded" />
                                </a>
                                <a href="/kerjasama/{{ $dokumen->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="svg/edit.svg" alt="Detail" class="rounded" />
                                </a>
                                <form action="/kerjasama/{{ $dokumen->id }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <img src="svg/delete.svg" alt="Detail" class="rounde" />
                                    </button>
                                </form>
                            </td>
                        @endcan
                        @can('user')
                            <td class="px-6 py-4 text-center flex justify-center">
                                <a href="/kerjasama/{{ $dokumen->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <img src="svg/detail.svg" alt="Detail" class="rounded" />
                                </a>
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
@endsection
