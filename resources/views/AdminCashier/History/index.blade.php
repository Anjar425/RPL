@extends('layout.home')

@section('link')
    @include('AdminCashier.link')
@endsection

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Report</h1>
    <div class="container">
        <form action="{{ route('history.index') }}" method="GET" id="yearForm" class="flex justify-center items-center">
            <label for="year" class="mr-2">Select Year:</label>
            <select name="year" id="year" onchange="document.getElementById('yearForm').submit()"
                    class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:border-blue-500">
                @foreach ($years as $y)
                    <option value="{{ $y }}" {{ $y == $selectedYear ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
        </form>
    
        <canvas id="myChart" class="mt-4 w-full mb-20"></canvas>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var selectYear = document.getElementById('year');

        // Ambil nilai tahun teratas dari pilihan
        var defaultYear = selectYear.options[0].value;

        if (window.location == "{{ route('history.index') }}") {
            window.location.href = "{{ route('history.index') }}?year=" + defaultYear;
        }

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($data['months']) !!},
                datasets: {!! json_encode($data['datasets']) !!}
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var yearSelect = document.getElementById('year');

            yearSelect.addEventListener('change', function() {
                var selectedYear = yearSelect.value;

                // Redirect to the same route with selected year as query parameter
                window.location.href = "{{ route('history.index') }}?year=" + selectedYear;
            });
        });
    </script>
@endsection
