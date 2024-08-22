@extends('layout.main')

@section('content')
    <section>
        <div class="w-full shadow bg-white rounded">
            <div class="px-20 pt-10 flex justify-between lg:flex-row flex-col">
                <div>
                    <div class="mb-4">
                        <h1 class="font-bold">Judul</h1>
                        <p class="">{{ $kerjasama->judul }}</p>
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Jenis</h1>
                        @if ($kerjasama->jenis == 'mou')
                            <p class="text-sm md:text-base">MOU (Memorandum of Understanding)</p>
                        @elseif($kerjasama->jenis == 'moa')
                            <p class="text-sm md:text-base">MOA (Memorandum of Aggreement)</p>
                        @else
                            <p class="text-sm md:text-base">IA (Implementation Aggreement)</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Status</h1>
                        <p class="">{{ Str::ucfirst($kerjasama->status) }}</p>
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Nomor Dokumen (STIKOM)</h1>
                        <p class="">{{ $kerjasama->dokumen->no_dokumen_stikom }}</p>
                        @if ($kerjasama->dokumen->no_dokumen_stikom == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Nomor Dokumen (Mitra)</h1>
                        <p class="">{{ $kerjasama->dokumen->no_dokumen_mitra }}</p>
                        @if ($kerjasama->dokumen->no_dokumen_stikom == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Bentuk Kerjasama</h1>
                        <p class="">{{ $kerjasama->bentuk_kerjasama }}</p>
                        @if ($kerjasama->dokumen->no_dokumen_stikom == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Durasi</h1>
                        <p class="">{{ $kerjasama->durasi }} Tahun</p>
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Bagian</h1>
                        <p class="">{{ $kerjasama->bagians->nama_bagian }}</p>
                        @if ($kerjasama->bagians->nama_bagian == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">PIC Pihak Pertama</h1>
                        <p class="">{{ $kerjasama->pic_pihak_1 }}</p>
                        @if ($kerjasama->pic_pihak_1 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">PIC Pihak Kedua</h1>
                        <p class="">{{ $kerjasama->pic_pihak_2 }}</p>
                        @if ($kerjasama->pic_pihak_2 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Penandatangan Pihak Pertama</h1>
                        <p class="">{{ $kerjasama->ttd_pihak1 }}</p>
                        @if ($kerjasama->ttd_pihak1 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Jabatan Penandatangan Pihak Pertama</h1>
                        <p class="">{{ $kerjasama->jabatan_pihak1 }}</p>
                        @if ($kerjasama->jabatan_pihak1 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Penandatangan Pihak Kedua</h1>
                        <p class="">{{ $kerjasama->ttd_pihak2 }}</p>
                        @if ($kerjasama->ttd_pihak2 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Jabatan Penandatangan Pihak Kedua</h1>
                        <p class="">{{ $kerjasama->jabatan_pihak2 }}</p>
                        @if ($kerjasama->jabatan_pihak2 == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h1 class="font-bold">Masa Berlaku</h1>
                        @if ($kerjasama->tanggal_awal != null && $kerjasama->tanggal_berakhir != null)
                            {{ \Carbon\Carbon::parse($kerjasama->tanggal_awal)->format('d F Y') }} ~
                            {{ \Carbon\Carbon::parse($kerjasama->tanggal_berakhir)->format('d F Y') }}
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h3 class="font-bold">Deskripsi</h3>
                        <p class="text-justify">{{ $kerjasama->deskripsi }}</p>
                        @if ($kerjasama->deskripsi == null)
                            <p>-</p>
                        @endif
                    </div>
                    <div class="mb-12">
                        <h3 class="font-bold">Diunggah Oleh</h3>
                        <p class="text-justify">{{ $kerjasama->user->name }}</p>
                        @if ($kerjasama->user == null)
                            <p>-</p>
                        @endif
                    </div>
                </div>
                <div>
                    <a href="/document/{{ $kerjasama->dokumen->dokumen }}/preview" target="_blank"
                        class="flex justify-start lg:justify-center flex-col gap-2 pdf lg:text-center mb-4">
                        <img src="/img/pdf.png" class="lg:m-auto" />
                        <p class="flex-wrap text-sm overflow-hidden whitespace-nowrap text-ellipsis ">
                            {{ $kerjasama->dokumen->dokumen }}
                        </p>
                    </a>
                </div>
            </div>
            <hr class="border" />
            <div class="flex justify-between px-2 flex-wrap">
                <p><span class="font-semibold">Dibuat
                        pada </span>{{ \Carbon\Carbon::parse($kerjasama->created_at)->format('d F Y') }}</p>
                <p><span class="font-semibold">Terakhir diubah
                    </span>{{ \Carbon\Carbon::parse($kerjasama->updated_at)->format('d F Y') }}</p>
            </div>
        </div>
    </section>
@endsection
