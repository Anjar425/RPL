@extends('layout.home')

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Medicines List</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold w-24 py-2 px-4 rounded mr-2 mb-6 justify-self-center"
        onclick="openInsertModal()">Insert</button>

    <div class="grid grid-cols-3 gap-4 items-center place-content-evenly w-full justify-items-center">
        @foreach ($medicines as $m)
            <div class=" w-80 rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full h-40 object-cover" src="/{{ $m->image }}">
                <div class="px-6 py-2">
                    <div class=" text-center font-bold text-xl mb-2">{{ $m->name }}</div>
                    <p class="text-center text-gray-700 text-base"> {{ $m->desc }}
                    </p>
                    <p class=" text-center text-gray-700 text-base ">Harga: {{ $m->selling_price }}</p>
                    <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: {{ $m->expire }}</p>
                </div>
                <div class="px-6 py-4 justify-center flex flex-row">
                    <button onclick="openEditModal('{{ $m->id }}')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-24 py-2 px-4 rounded mr-2">Edit</button>
                    <button onclick="openDeleteModal('{{ url('/'.'admin/' . $m->id . '/delete-medicine') }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold w-24 py-2 px-4 rounded">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('Insert Modal')
    @include('AdminCashier.Medicine.InsertModal')
@endsection

@section('Edit Modal')
    @include('AdminCashier.Medicine.EditModal')
@endsection
