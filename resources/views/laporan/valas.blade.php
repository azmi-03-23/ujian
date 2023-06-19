<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Laporan Perkembangan Nilai Jual Valas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-4">
                        <form>
                          <label for="valas">Pilih Valas:</label>
                          <select name="valas" id="valas">
                          @foreach($valas_ as $valas)
                            <option value="{{ $valas->nama }}">{{ $valas->nama }}</option>
                          @endforeach
                          <input class="valas "type="submit" value="Pilih">
                        </form>
                    </div>
                    <div class="mt-4">
                        <canvas id="valasChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        let submit = document.getElementByClass('valas');
        let valas;
        submit.onclick = function(){
            valas = document.getElementById('valas').value;
            let c = 0;
            const labels = [];
                for(let v of {{ $valas_ }}){
                    if(v['nama'] == valas){
                        labels[c]=v['tanggal_rate'];
                        c++;
                    }
                }
                c=0;
            const data1 = [];
                for(let v of {{ $valas_ }}){
                    if(v['nama'] == valas){
                        data1[c]=v['nilai_jual'];
                        c++;
                    }
                c=0;
            const data2 = [];
                for(let v of {{ $valas_ }}){
                    if(v['nama'] == valas){
                        data2[c]=v['nilai_beli'];
                        c++;
                    }
                }
                var valas_chart = document.getElementById('valasChart').getContext('2d');
                var chart = new Chart(valas_chart, {
                    type: 'line',
                    data: {
                        labels: labels,
                        /*[
                        @foreach($valas_ as $valas)
                            @if($valas->nama == valas)
                                '{{ $valas->tanggal_rate }}',
                            @endif
                        @endforeach
                        ],*/
                        datasets: [
                        {
                            label: 'Nilai Jual',
                            data: data1,
                            /*[
                            @foreach($valas_ as $valas)
                                @if($valas->nama == valas)
                                    {{ $valas->nilai_beli }},
                                @endif
                            @endforeach
                            ],*/
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        },
                        {
                            label: 'Nilai Beli',
                            data: data2,
                            /*[
                            @foreach($valas_ as $valas)
                                @if($valas->nama == valas)
                                    {{ $valas->nilai_beli }},
                                @endif
                            @endforeach
                            ],*/
                            fill: false,
                            borderColor: 'rgb(255,160,122)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: `${valas}`
                            }
                        }
                    },
                });
            };
    </script>
</x-app-layout>
