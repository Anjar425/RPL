<div id="deleteModal" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center">
    <div class="bg-white rounded-lg w-1/2">
        <form method="POST" id="delete-button">
            @csrf
            <h2 class="text-center font-semibold text-lg text-gray-800 pt-5">Are You Sure Delete This Data?</h2><br>
            <div class="flex flex-row gap-3 px-10">
                <button type="submit"
                    class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-11/12 px-5 py-2.5 text-center bg-red-600 hover:bg-red-700 focus:ring-red-800 mb-5">
                    Delete
                </button>
                <button type="button" onclick="closeDeleteModal()"
                    class="text-gray-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-11/12 px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-200 focus:ring-gray-400 mb-5">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
