@foreach ($cashier as $p)
    <div id="editModal{{ $p->id }}"
        class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center">
        <div  class="bg-white rounded-lg w-1/2">
            <form method="POST" action="{{ url('/'.'admin/' . $p->id . '/update-cashier') }}" class=" w-5/6 mx-auto my-5">
                @csrf
                <h2 class="text-center font-semibold text-lg text-gray-800">Edit Cashier</h2><br>

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                    <input name="name" type="text" id="name" value="{{ $p->name }}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-100 border-gray-300 placeholder-gray-400 text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input name="email" type="text" id="email" value="{{ $p->email }}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-100 border-gray-300 placeholder-gray-400 text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input name="password" type="text" id="password" value="{{ $p->visible_password }}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-100 border-gray-300 placeholder-gray-400 text-gray-800 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex flex-row gap-3">
                    <button type="submit"
                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                    <button type="button" onclick="closeEditModal('{{ $p->id }}')"
                        class="text-blue-600  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
