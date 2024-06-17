<section id="cart-modal" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center z-50">
    <div class="h-96 min-w-96 w-1/2 bg-white flex flex-col items-center rounded-lg mt-5 py-4 px-10 gap-4 shadow-lg">
        <h1 class="font-bold text-2xl text-gray-800">KERANJANG BELANJA</h1>

        <div id="cart"
            class="flex flex-col w-full bg-gray-50 border-2 border-gray-300 p-2 h-3/5 overflow-x-auto no-scrollbar rounded-lg px-4">
            @foreach ($cartItems as $item)
            <div class="grid grid-cols-6 justify-between items-center border-b-[1px] border-gray-300 p-1" data-product-id="{{ $item['id'] }}">
                <h2 class="font-bold text-lg row-span-2 text-gray-800 col-span-4">{{ $item['name'] }}</h2>
                <div class="flex flex-col col-span-2">
                    <p class="text-gray-400 font-semibold text-sm quantity-input">Jumlah Beli : {{ $item['quantity'] }}</p>
                    <p class="text-gray-400 font-semibold text-sm total-cost">Total Harga : {{ $item['totalCost'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
        <div class="flex flex-row w-full gap-6 items-center justify-center">
            <p class="font-bold text-gray-700">INFOKAN LOKASI :</p>
            <input
                class="bg-gray-100 flex-grow text-gray-700 col-span-2 py-2 rounded-md text-md font-semibold text-center remove-arrow"
                type="text" placeholder="lokasi mu ndi lur" />
        </div>
        <div class="grid grid-cols-2 w-full gap-4 items-center justify-center">
            <button onclick="closeModal()"
                class="bg-red-500 active:ring-2 active:ring-red-300 text-white py-2 px-4 rounded-md text-md font-bold">CANCEL</button>
            <button id="total" onclick=""
                class="bg-green-500 active:ring-2 active:ring-green-300 py-2 px-4 rounded-md text-white text-md font-bold">TOTAL</button>
        </div>
    </div>
</section>
