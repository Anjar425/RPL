@extends('layout.home')

@section('link')
    @include('AdminCashier.link')
@endsection

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Cashiers List</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold w-24 py-2 px-4 rounded mr-2 mb-6 justify-self-center"
        onclick="openInsertModal()">Insert</button>

    <table class="table-auto w-full mt-1 overscroll-x-auto mb-10">
        <thead>
            <tr>
                <th class="py-2 px-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">
                    Id
                </th>
                <th class="py-2 px-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">
                    Username
                </th>
                <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">
                    Email
                </th>
                <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">
                    Password
                </th>
                <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cashier as $p)
                <tr class="hover:bg-gray-100">
                    <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-600 font-normal text-gray-700">
                        {{ $p->id }}
                    </td>
                    <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-600 font-normal text-gray-700">
                        {{ $p->name }}
                    </td>
                    <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-600 font-normal text-gray-700">
                        {{ $p->email }}
                    </td>
                    <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-600 font-normal text-gray-700">
                        {{ $p->visible_password }}
                    </td>
                    <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-600 font-normal text-gray-700">
                        <div class="flex flex-row gap-x-2 justify-center">
                            <button type="button" onclick="openEditModal('{{ $p->id }}')"
                                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-xs w-12 py-2.5 text-center bg-green-600 hover:bg-green-700 focus:ring-green-500">Edit</button>
                            <button type="button"
                                onclick="openDeleteModal('{{ url('/' . 'admin/' . $p->id . '/delete-cashier') }}')"
                                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-xs w-12 py-2.5 text-center bg-red-600 hover:bg-red-700 focus:ring-red-500">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('Insert Modal')
    @include('AdminCashier.Cashier.InsertModal')
@endsection

@section('Edit Modal')
    @include('AdminCashier.Cashier.EditModal')
@endsection
