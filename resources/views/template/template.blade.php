@extends('layout.main')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="mb-6 text-xl font-semibold">Template Dokumen</h1>
        <hr class="mb-6">
        <div class="">
            @foreach ($templates as $template)
                <div class="mb-6">
                    <h2 class="mb-2 font-semibold">{{ $template->judul }}</h2>
                    <a href="/template/preview/{{ $template->dokumen }}" target="_blank"
                        class="flex items-center gap-2 lg:text-center mb-4">
                        <img src="/img/pdf.png" class="" width="40px" />
                        <p class="flex-wrap text-sm overflow-hidden whitespace-nowrap text-ellipsis ">
                            {{ $template->dokumen }}
                        </p>
                    </a>
                    {{-- <h2>{{ $template->dokumen }}</h2> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
