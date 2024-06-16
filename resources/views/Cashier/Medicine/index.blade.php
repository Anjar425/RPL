@extends('layout.home')

@section('link')
    @include('Cashier.link')
@endsection

@section('content')
    <h1 class="text-center font-bold text-3xl py-4">Medicines List</h1>
    <div id="result" class="grid grid-cols-3 gap-4 items-center place-content-evenly w-full justify-items-center">
        @foreach ($medicines as $m)
            <div id="result-item" class=" w-80 rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full h-40 object-cover" src="/{{ $m->image }}">
                <div class="px-6 py-2">
                    <div class=" text-center font-bold text-xl mb-2">{{ $m->name }}</div>
                    <p class="text-center text-gray-700 text-base"> {{ $m->desc }}
                    </p>
                    <p class=" text-center text-gray-700 text-base ">Harga: {{ $m->selling_price }}</p>
                    <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: {{ $m->expire }}</p>
                </div>
                <div class="px-6 py-4 justify-center flex flex-row">
                    <button onclick="subProduct('{{ $m->id }}')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-24 py-2 px-4 rounded mr-2">-</button>
                    <input id="cartProduct{{ $m->id }}"
                        class="bg-gray-200 hover:bg-gray-200 text-black text-center font-bold w-24 py-2 px-4 rounded mr-2" min="0" max="{{ $m->stock }}" value="0" readonly/>
                    <button onclick="addProduct('{{ $m->id }}')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-24 py-2 px-4 rounded mr-2">+</button>

                </div>
                <div class="px-6 pb-4 justify-center flex flex-row">
                    <button onclick="addToCart({{ $m->id }})"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold  py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        function addProduct(id){
            var element = document.getElementById('cartProduct' + id);
            var newValue = parseInt(element.value) + 1;
            if (newValue <= parseInt(element.max)){
                element.value = newValue
            }
        }

        function subProduct(id){
            var element = document.getElementById('cartProduct' + id);
            var newValue = parseInt(element.value) - 1;
            if (newValue >= parseInt(element.min)){
                element.value = newValue
            }
        }

        let cart = [];

        function addToCart(productId) {
            let quantity = document.getElementById(`cartProduct${productId}`).value;
            quantity = parseInt(quantity);

            // Check if the product already exists in the cart
            let existingProduct = cart.find(item => item.product_id === productId);

            if (existingProduct) {
                existingProduct.quantity = quantity;
            } else {
                cart.push({ product_id: productId, quantity: quantity });
            }
            saveCart()

            console.log(cart); // For debugging
        }

        function saveCart() {
            fetch('{{ route('addToCart') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(cart)
            })
            .then(response => response.json())
            .catch(error => {
                console.error('Error:', error);
            });
        }




        const searchInput = document.getElementById('search');
        const initialList = {!! json_encode($medicines) !!}; // Data obat awal dari Blade

        searchInput.addEventListener('input', function() {
            const query = this.value.trim(); // Mendapatkan nilai input, tanpa spasi di awal dan akhir

            if (query.length === 0) {
                showInitialList();
                return;
            }

            // Kirim permintaan AJAX ke endpoint pencarian
            fetch(`/search?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Membuat tampilan hasil pencarian berdasarkan data yang diterima
                    const resultDiv = document.getElementById('result');
                    resultDiv.innerHTML = ''; // Bersihkan konten sebelum menambahkan hasil baru

                    data.forEach(medicine => {
                        const html = `
                            <div id="result-item" class="w-80 rounded overflow-hidden shadow-lg bg-white">
                                <img class="w-full h-40 object-cover" src="/${medicine.image}">
                                <div class="px-6 py-2">
                                    <div class="text-center font-bold text-xl mb-2">${medicine.name}</div>
                                    <p class="text-center text-gray-700 text-base">${medicine.desc}</p>
                                    <p class="text-center text-gray-700 text-base">Harga: ${medicine.selling_price}</p>
                                    <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: ${medicine.expire}</p>
                                </div>
                            </div>
                        `;
                        resultDiv.innerHTML += html; // Tambahkan hasil ke dalam div #result
                    });
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                });
        });

        function showInitialList() {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = ''; // Bersihkan konten sebelum menambahkan hasil baru

            initialList.forEach(medicine => {
                const html = `
                    <div id="result-item" class="w-80 rounded overflow-hidden shadow-lg bg-white">
                        <img class="w-full h-40 object-cover" src="/${medicine.image}">
                        <div class="px-6 py-2">
                            <div class="text-center font-bold text-xl mb-2">${medicine.name}</div>
                            <p class="text-center text-gray-700 text-base">${medicine.desc}</p>
                            <p class="text-center text-gray-700 text-base">Harga: ${medicine.selling_price}</p>
                            <p class="text-center text-gray-700 text-base">Tanggal Kadaluarsa: ${medicine.expire}</p>
                        </div>
                    </div>
                `;
                resultDiv.innerHTML += html; // Tambahkan hasil ke dalam div #result
            });
        }
    </script>
@endsection

@section('Insert Modal')
    @include('AdminCashier.Medicine.InsertModal')
@endsection

@section('Edit Modal')
    @include('AdminCashier.Medicine.EditModal')
@endsection
