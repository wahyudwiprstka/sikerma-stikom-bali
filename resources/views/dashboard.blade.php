@extends('layout.main')

@section('content')
    <section>
        @can('admin')
            @if ($documentsHampirKadaluarsa->count() != 0 || $documentslewat->count() != 0)
                <div class="flex notification justify-between items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 shadow"
                    role="alert">
                    <p>
                        Ada kerjasama yang hampir kadaluarsa atau sudah lewat dari tanggal berakhir! <a
                            href="/kerjasama/hampir-kadaluarsa" class="font-medium">Klik disini untuk melihat</a></p>
                    <button id="closeNotif" class="text-lg">x</button>
                </div>
            @endif
        @endcan
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-cyan-800 text-white rounded">
                <img src="/img/document.png" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">MOU</h3>
                    <p>{{ $mouActive->count() }}</p>
                </div>
            </div>
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-sky-800 text-white rounded">
                <img src="/img/document.png" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">MOA</h3>
                    <p>{{ $moaActive->count() }}</p>
                </div>
            </div>
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-violet-700 text-white rounded">
                <img src="/img/document.png" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">Implementation Arrangement (IA)</h3>
                    <p>{{ $ia->count() }}</p>
                </div>
            </div>
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-blue-800 text-white rounded">
                <img src="/img/document.png" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">Realisasi</h3>
                    <p>{{ $realisasi->count() }}</p>
                </div>
            </div>
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-blue-900 text-white rounded">
                <img src="/img/document.png" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">Laporan Pelaksanaan Kerjasama</h3>
                    <p>{{ $lpk->count() }}</p>
                </div>
            </div>
            <div class="shadow flex gap-2 items-center pl-6 py-4 bg-violet-800 text-white rounded">
                <img src="/svg/mitra.svg" width="80" height="80" />
                <div class="ml-2">
                    <h3 class="text-lg font-semibold">Mitra</h3>
                    <p>{{ $mitra->count() }}</p>
                </div>
            </div>
        </div>

        {{-- Table Kerjasama --}}
        <div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 bg-white border">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Masa Berlaku
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mitra
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kerjasama as $index => $kerjasama)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $kerjasama->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::upper($kerjasama->jenis) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::ucfirst($kerjasama->status) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($kerjasama->tanggal_awal != null && $kerjasama->tanggal_berakhir != null)
                                        {{ \Carbon\Carbon::parse($kerjasama->tanggal_awal)->format('d F Y') }} -
                                        {{ \Carbon\Carbon::parse($kerjasama->tanggal_berakhir)->format('d F Y') }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kerjasama->mitra->nama }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mb-2">
                <button class="shadow border bg-white px-2 py-1 mt-2 rounded text-blue-600 hover:shadow-lg"><a
                        href="kerjasama">See
                        All</a></button>
            </div>

        </div>


        <div id="linechart_material" class="w-[83vw] h-[30rem] mx-auto py-2 shadow rounded px-20 bg-white"></div>
    </section>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // var kerjasama = @json($yearcount);
        // console.log(kerjasama[0].count);
        // console.log(kerjasama);
        // google.charts.load('current', {
        //     packages: ['corechart']
        // });
        // google.charts.setOnLoadCallback(drawChart);

        // function drawChart() {
        //     // Set Data
        //     const data = new google.visualization.DataTable();
        //     data.addColumn('string', 'Year');
        //     data.addColumn('number', 'Kerjasama');
        //     data.addColumn('number', 'Kerjasama');
        //     data.addColumn('number', 'Kerjasama');

        //     for (var i = 0; i < kerjasama.length; i++) {
        //         if (kerjasama[i].date != null) {
        //             data.addRow([String(kerjasama[i].date), kerjasama[i].count]);
        //         }
        //     }
        //     // Set Options
        //     const options = {
        //         title: 'Tahun vs. Kerjasama',
        //         hAxis: {
        //             title: 'Tahun'
        //         },
        //         vAxis: {
        //             title: 'Kerjasama'
        //         },
        //         legend: 'none'
        //     };
        //     // Draw
        //     const chart = new google.visualization.LineChart(document.getElementById('myChart'));
        //     chart.draw(data, options);
        // }

        google.charts.load('current', {
            'packages': ['line']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let kerjasama = @json($yearcount);
            let kerjasamaMOU = @json($yearcountMOU);
            let kerjasamaMOA = @json($yearcountMOA);
            let kerjasamaRealisasi = @json($yearcountRealisasi);
            let mouTemp = 0;
            let moaTemp = 0;
            let realisasiTemp = 0;
            let data = new google.visualization.DataTable();
            data.addColumn('string', 'Year');
            data.addColumn('number', 'MOU');
            data.addColumn('number', 'MOA');
            data.addColumn('number', 'Realisasi');

            for (let i = 0; i < kerjasama.length; i++) {
                mouTemp = 0
                moaTemp = 0
                realisasiTemp = 0
                for (let j = 0; j < kerjasamaMOU.length; j++) {
                    if (kerjasama[i].date == kerjasamaMOU[j].date) {
                        mouTemp = kerjasamaMOU[j].count;
                    } else {
                        continue;
                    }
                }
                for (let k = 0; k < kerjasamaMOA.length; k++) {
                    if (kerjasama[i].date == kerjasamaMOA[k].date) {
                        moaTemp = kerjasamaMOA[k].count;
                    } else {
                        continue;
                    }
                }
                for (let l = 0; l < kerjasamaRealisasi.length; l++) {
                    if (kerjasama[i].date == kerjasamaRealisasi[l].date) {
                        realisasiTemp = kerjasamaRealisasi[l].count;
                    } else {
                        continue;
                    }
                }
                if (kerjasama[i].date != null) {
                    data.addRow([String(kerjasama[i].date), mouTemp, moaTemp, realisasiTemp])
                }
                // console.log(kerjasama[i]);
                console.log(kerjasamaMOU[i]);
                console.log("Year: " + kerjasama[i].date);
                console.log("MOU: " + mouTemp)
                console.log("MOA: " + moaTemp)
                console.log("Realisasi: " + realisasiTemp)
                // console.log(moaTemp);
                // console.log(realisasiTemp);
            }

            var options = {
                chart: {
                    title: 'Jumlah Kerjasama Berdasarkan Tahun Dan Jenis'
                },
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }
    </script>
@endsection
