@extends('layout.home')

@section('link')
    @include('AdminCashier.link')
@endsection

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Expire Medicines List</h1>
    @if ($expireMedicine->isEmpty())
        <h1 class=" text-lg font-semibold text-gray-400 text-center my-8">No medicines are expiring today.</h1>
    @else
        <div id="result" class="grid grid-cols-3 gap-4 items-center place-content-evenly w-full justify-items-center">
            @foreach ($expireMedicine as $m)
                <div id="result-item" class=" w-80 rounded overflow-hidden shadow-lg bg-white">
                    <img class="w-full h-40 object-cover" src="/{{ $m->image }}">
                    <div class="px-6 py-2">
                        <div class=" text-center font-bold text-xl mb-2">{{ $m->name }}</div>
                        <p class="text-center text-gray-700 text-base"> {{ $m->desc }}
                        </p>
                        <p class=" text-center text-gray-700 text-base ">Harga: {{ $m->selling_price }}</p>
                        <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: {{ $m->expire }}</p>
                    </div>
                </div>
            @endforeach
    @endif
    </div>

@endsection
