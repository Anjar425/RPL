@foreach ($medicines as $m)
    <div id="editModal{{ $m->id }}" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center">
        <div class="bg-white rounded-lg w-1/2 shadow-lg">
            <form method="POST" action="{{ url('/'.'admin/' . $m->id . '/update-medicine') }}" enctype="multipart/form-data" class="w-5/6 mx-auto my-5">
                @csrf
                <h2 class="text-center font-semibold text-lg text-gray-800">Insert Medicine</h2><br>

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                    <input name="name" type="text" id="name" value="{{$m->name}}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                    <input name="image" type="file" id="image" value="{{$m->image}}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-5">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                    <input name="desc" type="text" id="desc" value="{{$m->desc}}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex flex-row gap-2">
                    <div class=" basis-1/2 mb-5 w-full">
                        <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-700">Purchase
                            Price</label>
                        <input name="purchase_price" type="number" id="purchase_price" value="{{$m->purchase_price}}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class=" basis-1/2 mb-5 w-full">
                        <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-700">Selling
                            Price</label>
                        <input name="selling_price" type="number" id="selling_price" value="{{$m->selling_price}}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="flex flex-row gap-2">
                    <div class=" basis-1/2 mb-5 w-full">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">Stock</label>
                        <input name="stock" id="stock" type="number" min="0" value="{{$m->stock}}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class=" basis-1/2 mb-5 w-full">
                        <label for="expire" class="block mb-2 text-sm font-medium text-gray-700">Expire Date</label>
                        <input name="expire" type="date" id="expire" value="{{$m->expire}}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="flex flex-row gap-3">
                    <button type="submit" 
                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                    <button type="button" onclick="closeEditModal('{{ $m->id }}')"
                        class="text-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
