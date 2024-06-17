@extends('layout.home')

@section('link')
    @include('Cashier.link')
@endsection

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Cart List</h1>
    <div class="flex flex-col justify-between w-full overflow-y-scroll" style="height: 85vh">
        <table class="table-auto w-full mt-1 overscroll-x-auto mb-10">
            <thead>
                <tr>
                    <th class="py-2 px-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Id</th>
                    <th class="py-2 px-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Name</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Description</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Expire</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Price</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Quantity</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Total Price</th>
                    <th class="py-2 border-b-2 text-sm border-b-gray-800 font-semibold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr class="hover:bg-gray-100" data-product-id="{{ $item['id'] }}">
                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            {{ $item['id'] }}</td>
                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            {{ $item['name'] }}</td>
                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            {{ $item['desc'] }}</td>
                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            {{ $item['expire'] }}</td>
                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            {{ $item['selling_price'] }}</td>
                        <td
                            class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700 quantity-input">
                            <input type="number" id="quantity-input{{ $item['id'] }}" value="{{ $item['quantity'] }}"
                                class="text-center" min="1" max="{{ $item['stock'] }}"
                                onchange="validateAndUpdateCartItem('{{ $item['id'] }}', this.value)"
                                oninput="validateInput(this)">
                        </td>
                        <td
                            class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700 total-cost">
                            {{ $item['totalCost'] }}</td>

                        <td class="p-2 text-center border-b-[1px] text-xs border-b-gray-700 font-normal text-gray-700">
                            <div class="flex flex-row gap-x-2 justify-center">
                                <button><i class="fa-solid fa-x fa-xl" style="color: #ff0000;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="sticky h-20 w-full items-center flex flex-row justify-end my-2 mx-4 gap-6">
        <div class="flex flex-col ">
            <h1 class="text-center font-bold text-lg">Total Cost</h1>
            <h2 class="text-center font-semibold text-md total-cost-value">Rp{{ $totalCost }}</h2>
        </div>
        <div>
            <button class="py-2 px-8 bg-green-500 rounded-lg " onclick="openCartModal()">Sell</button>
        </div>
    </div>


    <script>
        // Fungsi untuk validasi input nilai
        function validateInput(input) {
            if (input.value < 1) {
                input.value = 1;
            }
            const maxStock = parseInt(input.getAttribute('max'));
            if (input.value > maxStock) {
                input.value = maxStock;
            }
        }

        // Fungsi untuk validasi dan update item dalam keranjang belanja
        function validateAndUpdateCartItem(productId, quantity) {
            const minStock = 1;
            const maxStock = parseInt(document.getElementById('quantity-input' + productId).max);

            console.log(maxStock)

            if (quantity < minStock) {
                quantity = minStock;
            } else if (quantity > maxStock) {
                quantity = maxStock;
            }
            updateCartItem(productId, quantity);
        }
        // Update item dalam keranjang belanja
        function updateCartItem(productId, quantity) {
            fetch('/cart/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Tampilkan pesan sukses atau pesan error
                    const row = document.querySelector(`tr[data-product-id="${productId}"]`);
                    if (row) {
                        row.querySelector('.quantity-input').value = quantity;
                        row.querySelector('.total-cost').textContent = data.updatedItem.totalCost;
                    }
                    // Update total cost
                    document.querySelector('.total-cost-value').textContent = `Rp${data.totalCost}`;

                    const div = document.querySelector(`div[data-product-id="${productId}"]`);
                    if (div) {
                        div.querySelector('.quantity-input').textContent = `Jumlah Beli : ${quantity}`;
                        div.querySelector('.total-cost').textContent = `Total Harga : Rp${data.updatedItem.totalCost}`;
                    }
                    // Update total cost
                    document.querySelector('.total-cost-value').textContent = `Rp${data.totalCost}`;

                    // Tambahkan logika lain jika perlu, seperti memperbarui tampilan atau menghapus item dari DOM
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        }
    </script>
@endsection


@section('Cart Modal')
    @include('Cashier.Cart.modal')
@endsection
