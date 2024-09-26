<?php

require "./../koneksi.php";

$id = $_GET["id"];

$result = mysqli_query($koneksi, "SELECT * FROM resep_dokter WHERE id = $id");

$rsp = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    edit($_POST, $id, "resep_dokter");
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
        <h1 class="text-2xl font-bold mb-6"> Edit Data Resep dokter </h1>

        <form action=""
            method="post"
            class="space-y-4">

            <div>
                <label
                    for="pasien"
                    class="block text-sm font-medium text-gray-700"> Nama Pasien
                </label>
                <input type="text"
                    name="pasien"
                    id="pasien"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $rsp["pasien"]; ?>">

            </div>
            <div>
                <label
                    for="obat"
                    class="block text-sm font-medium text-gray-700"> Nama Obat
                </label>
                <input type="text"
                    name="obat"
                    id="obat"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $rsp["obat"]; ?>">

            </div>

            <div>

                <label
                    for="dosis"
                    class="block text-sm font-medium text-gray-700"> Dosis
                </label>
                <input type="text"
                    name="dosis"
                    id="dosis"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $rsp["dosis"]; ?>">
            </div>

            <div>
                <label
                    for="tanggal"
                    class="block text-sm font-medium text-gray-700"> Tanggal resep </label>
                <input type="date"
                    name="tanggal_resep"
                    id="tanggal"
                    required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required value="<?= $rsp["tanggal_resep"]; ?>">

            </div>

            <button type="submit"
                name="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"> Edit Data! </button>
        </form>
    </div>
</body>

</html>