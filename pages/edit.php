<?php

require "./../koneksi.php";

$id = $_GET["id"];

$result = mysqli_query($koneksi, "SELECT * FROM obat WHERE id = $id");

$obt = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    edit($_POST, $id, "obat");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "
            <script>
                alert('Datamu Berhasil Diedit!');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Datamu Gagal Diedit!');
                document.location.href = '../index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <script src="https://cdn.tailwindcss.com">
    </script>

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg p-8 bg-white shadow-md rounded-lg">
        <a href="../index.php"
            class="text-blue-500 hover:text-blue-700 text-sm mb-4 inline-block"> Back to home
        </a>
        <h1 class="text-2xl font-bold mb-6"> Edit Data Obat </h1>

        <form action=""
            method="post"
            class="space-y-4">

            <div>
                <label
                    for="obat"
                    class="block text-sm font-medium text-gray-700"> Nama Obat
                </label>
                <input type="text"
                    name="obat"
                    id="obat"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $obt["nama_obat"]; ?>">

            </div>
            <div>
                <label
                    for="kategori"
                    class="block text-sm font-medium text-gray-700"> Kategori
                </label>
                <input type="text"
                    name="kategori"
                    id="kategori"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $obt["kategori"]; ?>">

            </div>

            <div>

                <label
                    for="harga"
                    class="block text-sm font-medium text-gray-700"> Harga(Rp)
                </label>
                <input type="number"
                    name="harga"
                    id="harga"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $obt["harga"]; ?>">
            </div>

            <div>
                <label
                    for="stok"
                    class="block text-sm font-medium text-gray-700"> Stok </label>
                <input type="number"
                    name="stok"
                    id="stok"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $obt["stok"]; ?>">

            </div>

            <button type="submit"
                name="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"> Edit Data! </button>
        </form>
    </div>
</body>

</html>