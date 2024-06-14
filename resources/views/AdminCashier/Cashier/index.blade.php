@extends('layout.home')

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Medicines List</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold w-24 py-2 px-4 rounded mr-2 justify-self-center">Insert</button>
    @foreach ($medicines as $m)
        
    @endforeach
    <div class="grid grid-cols-3 gap-4 items-center place-content-evenly w-full justify-items-center">
        <div class=" w-80 rounded overflow-hidden shadow-lg bg-white">
            <img class="w-full h-40 object-cover" src="gambar_obat.jpg" alt="Gambar Obat">
            <div class="px-6 py-2">
                <div class=" text-center font-bold text-xl mb-2">Nama Obat</div>
                <p class="text-center text-gray-700 text-base"> ppp
                </p>
                <p class=" text-center text-gray-700 text-base mt-2">Harga: Rp. 50.000</p>
                <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: 12 Juni 2025</p>
            </div>
            <div class="px-6 py-4 justify-center flex flex-row">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-24 py-2 px-4 rounded mr-2">Edit</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold w-24 py-2 px-4 rounded">Delete</button>
            </div>
        </div>
    </div>
@endsection
