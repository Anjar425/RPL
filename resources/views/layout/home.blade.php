<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-row overflow-hidden max-h-screen ">
        <div class="w-64 bg-gray-800 text-white min-h-screen max-h-screen p-4 flex flex-col flex-shrink-0">
            <div class="welcome-message mt-5 mb-20">
                <h6><strong>Hai! Selamat datang</strong></h6>
                <p>Hidup Sehat Keluarga Sehat (aktif)</p>
            </div>
            @yield('link')
        </div>
        <div class="flex-1 p-4 min-h-screen max-h-screen">
            <nav class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold w-48"><i class="fas fa-home mr-2"></i> Dashboard</h1>
                <div class="flex justify-self-center">
                    <input class="form-input border-gray-300 rounded-md w-64 px-2 py-2" id="search" type="search"
                        placeholder="Search" aria-label="Search">
                </div>
                <div class="flex items-center w-48 place-content-end">
                    <div id="profile" class="relative">
                        <button onclick="openProfileItem()"
                            class="flex items-center text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            id="user-menu" aria-haspopup="true">
                            <img src="https://via.placeholder.com/30" alt="Profile Picture"
                                class="rounded-full w-8 h-8 mr-2">
                            Profile
                        </button>
                        <form id="profile-item" method="POST" action="/logout"
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden"
                            aria-labelledby="user-menu" role="menu">
                            @csrf
                            <button type="submit"
                                class="w-full h-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div
                class="bg-white p-4 rounded-md shadow-md h-full overflow-scroll overscroll-auto flex flex-col items-center">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('Insert Modal')
    @yield('Edit Modal')
    @yield('Cart Modal')
    @include('layout.delete')

    <script>
        var isOpen = false;

        function openProfileItem() {
            if (!isOpen) {
                var profileItem = document.getElementById('profile-item');
                profileItem.classList.remove('hidden');
            } else {
                closeProfileItem();
            }
            isOpen = !isOpen;
        }

        function closeProfileItem() {
            var profileItem = document.getElementById('profile-item');
            profileItem.classList.add('hidden');
        }

        function openInsertModal() {
            var insertModal = document.getElementById('insertModal');
            insertModal.classList.remove('hidden');
            insertModal.classList.add('flex');
        }

        function closeInsertModal() {
            var insertModal = document.getElementById('insertModal');
            insertModal.classList.add('hidden');
            insertModal.classList.remove('flex');
        }

        function openEditModal(x) {
            let id = "editModal"
            let result = id.concat(x)
            document.getElementById(result).classList.add('flex');
            document.getElementById(result).classList.remove('hidden');

        }

        function closeEditModal(x) {
            let id = "editModal"
            let result = id.concat(x)
            document.getElementById(result).classList.add('hidden');
            document.getElementById(result).classList.remove('flex');
        }

        function openDeleteModal(link) {
            document.getElementById('deleteModal').classList.add('flex');
            document.getElementById('deleteModal').classList.remove('hidden');

            var deleteButton = document.getElementById('delete-button');
            deleteButton.action = link;
        }

        // Fungsi untuk menutup modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Fungsi untuk menghapus data
        function deleteData(link) {
            // Tambahkan logika penghapusan data di sini
            window.location.href = link;

            // Setelah menghapus data, tutup modal
            closeDeleteModal();
        }

        const openCartModal = () => {
            var modal = document.getElementById("cart-modal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        };

        // Close Modal Cart
        const closeCartModal = () => {
            var modal = document.getElementById("cart-modal");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        };


        window.addEventListener('click', function(event) {
            var insertModal = document.getElementById('insertModal');
            var deleteModal = document.getElementById('deleteModal');
            var profileItem = document.getElementById('profile-item');
            var cartModal = document.getElementById("cart-modal");
            var editModalPrefix = "editModal";

            if (event.target === insertModal) {
                closeInsertModal();
            }

            if (event.target === profileItem) {
                closeProfileItem();
            }

            if (event.target === deleteModal) {
                closeDeleteModal();
            }

            if (event.target === cartModal) {
                closeCartModal();
            }

            if (event.target.id.startsWith(editModalPrefix)) {
                var idNumber = event.target.id.substring(editModalPrefix.length);

                closeEditModal(idNumber);
            }
        });
    </script>
</body>

</html>
