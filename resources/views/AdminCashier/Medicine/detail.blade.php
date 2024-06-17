<!-- resources/views/medicine_detail.blade.php -->

@extends('layout.home')

@section('link')
    @include('AdminCashier.link')
@endsection

@section('content')
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="text-2xl text-center font-bold">
                    {{ $medicine->name }}
                </div>

                <div class="mt-4">
                    <p class="text-gray-600"><span class="font-semibold">Description:</span></p>
                </div>

                <div class="mt-4">
                    <p class="text-gray-600">{{ $medicine->desc }}</p>
                </div>

                <div class="mt-4">
                    <p><span class="font-semibold">Expired Date:</span> {{ $medicine->expire }}</p>
                </div>

                <div class="mt-4">
                    <p><span class="font-semibold">Purchase Price:</span> Rp {{ number_format($medicine->purchase_price, 0, ',', '.') }}</p>
                </div>

                <div class="mt-4">
                    <p><span class="font-semibold">Selling Price:</span> Rp {{ number_format($medicine->selling_price, 0, ',', '.') }}</p>
                </div>

                <div class="mt-4">
                    <p><span class="font-semibold">Stock:</span> {{ $medicine->stock }}</p>
                </div>

                <div class="mt-4">
                    <img src="{{ asset($medicine->image) }}" alt="{{ $medicine->name }}" class="max-w-xs">
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    Last updated: {{ $medicine->updated_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
