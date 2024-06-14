<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-row overflow-hidden max-h-screen ">
        <div class="w-64 bg-gray-800 text-white min-h-screen max-h-screen p-4 flex flex-col flex-shrink-0">
            <div class="welcome-message mt-5 mb-20">
                <h6><strong>Hai! Selamat datang</strong></h6>
                <p>Hidup Sehat Keluarga Sehat (aktif)</p>
            </div>
            <nav class="flex flex-col gap-2">
                <a href="#" class="nav-link flex items-center py-2 px-4 bg-gray-700 rounded-md mb-2">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a href="#" class="nav-link flex items-center py-2 px-4 bg-gray-700 rounded-md mb-2">
                    <i class="fas fa-search mr-2"></i> Cari
                </a>
                <a href="#" class="nav-link flex items-center py-2 px-4 bg-gray-700 rounded-md mb-2">
                    <i class="fas fa-book mr-2"></i> Laporan Inventaris
                </a>
                <a href="#" class="nav-link flex items-center py-2 px-4 bg-gray-700 rounded-md mb-2">
                    <i class="fas fa-bell mr-2"></i> Notifikasi
                </a>
            </nav>
        </div>
        <div class="flex-1 p-4 min-h-screen max-h-screen">
            <nav class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold"><i class="fas fa-home mr-2"></i> Dashboard</h1>
                <form class="flex" style="width: 50%;">
                    <input class="form-input mr-2 border-gray-300 rounded-md" type="search" placeholder="Search" aria-label="Search">
                    <button class="bg-green-500 text-white py-2 px-4 rounded-md" type="submit">Search</button>
                </form>
                <div class="flex items-center">
                    <span class="mr-3">Help</span>
                    <div class="relative">
                        <button class="flex items-center text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                            <img src="https://via.placeholder.com/30" alt="Profile Picture" class="rounded-full w-8 h-8 mr-2">
                            Profile
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 hidden" aria-labelledby="user-menu" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Action</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Another action</a>
                            <div class="border-t border-gray-200"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="bg-white p-4 rounded-md shadow-md h-full overflow-scroll overscroll-auto flex flex-col items-center">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('Insert Modal')
    @yield('Edit Modal')
    @include('layout.delete')

    <script>
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


        window.addEventListener('click', function(event) {
            var insertModal = document.getElementById('insertModal');
            var deleteModal = document.getElementById('deleteModal');
            var editModalPrefix = "editModal";

            if (event.target === insertModal) {
                closeInsertModal();
            }

            if (event.target === deleteModal) {
                closeDeleteModal();
            }

            if (event.target.id.startsWith(editModalPrefix)) {
                var idNumber = event.target.id.substring(editModalPrefix.length);

                closeEditModal(idNumber);
            }
        });
    </script>
</body>
</html>
