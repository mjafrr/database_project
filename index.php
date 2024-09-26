<?php
require 'koneksi.php';

$obat = getTable("obat");
$resep = getTable("resep_dokter");
$pasien = getTable("pasien");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center ">
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg my-16">
        <a href="tambah.php"><button class="px-4 py-4 bg-green-500 rounded-md text-white font-semibold font-serif shadow-lg m-5 hover:brightness-90 transition-all">Tambah Data</button></a>
        <!-- TABLE OBAT -->
        <h1 class="text-2xl font-semibold mb-4">Daftar Obat</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">

            <tr class="w-full bg-gray-200 border-b border-gray-300">
                <th class="py-4 px-6 text-left text-gray-600">No.</th>
                <th class="py-4 px-6 text-left text-gray-600">Nama Obat</th>
                <th class="py-4 px-6 text-left text-gray-600">Kategori</th>
                <th class="py-4 px-6 text-left text-gray-600">Harga</th>
                <th class="py-4 px-6 text-left text-gray-600">Stok</th>
                <th class="py-4 px-6 text-left text-gray-600">Aksi</th>
            </tr>


            <?php $i = 1; ?>
            <?php foreach ($obat as $o) : ?>
                <tr class="border-b border-gray-300">
                    <td class="py-6 px-6"><?= $i; ?></td>
                    <td class="py-6 px-6"><?= $o['nama_obat']; ?></td>
                    <td class="py-6 px-6"><?= $o['kategori']; ?></td>
                    <td class="py-6 px-6">Rp. <?= $o['harga']; ?></td>
                    <td class="py-6 px-6"><?= $o['stok']; ?>pcs</td>
                    <td>
                        <div class="flex gap-3">

                            <a href="./pages/hapus.php?id=<?= $o['id']; ?>" onclick="return confirm('yakin ni??')">
                                <div class="bg-red-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                    </svg></div>
                            </a>

                            <a href="./pages/edit.php?id=<?= $o['id']; ?>">
                                <div class="bg-blue-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                                    </svg></div>
                            </a>

                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>

        <!-- TABLE RESEP -->
        <div class="w-full h-10"></div>
        <a href="tambah_resep.php"><button class="px-4 py-4 bg-green-500 rounded-md text-white font-semibold font-serif shadow-lg m-5 hover:brightness-90 transition-all">Tambah Data</button></a>

        <h1 class="text-2xl font-semibold mb-4">Daftar Resep Dokter</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">

            <tr class="w-full bg-gray-200 border-b border-gray-300">
                <th class="py-4 px-6 text-left text-gray-600">No.</th>
                <th class="py-4 px-6 text-left text-gray-600">Nama Pasien</th>
                <th class="py-4 px-6 text-left text-gray-600">Obat</th>
                <th class="py-4 px-6 text-left text-gray-600">Dosis</th>
                <th class="py-4 px-6 text-left text-gray-600">Tanggal Resep</th>
                <th class="py-4 px-6 text-left text-gray-600">Aksi</th>
            </tr>


            <?php $e = 1; ?>
            <?php foreach ($resep as $rsp) : ?>
                <tr class="border-b border-gray-300">
                    <td class="py-6 px-6"><?= $e; ?></td>
                    <td class="py-6 px-6"><?= $rsp['pasien']; ?></td>
                    <td class="py-6 px-6"><?= $rsp['obat']; ?></td>
                    <td class="py-6 px-6"><?= $rsp['dosis']; ?></td>
                    <td class="py-6 px-6"><?= $rsp['tanggal_resep']; ?></td>
                    <td>
                        <div class="flex gap-3">

                            <a href="hapus_resep.php?id=<?= $rsp['id']; ?>" onclick="return confirm('yakin ni??')">
                                <div class="bg-red-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                    </svg></div>
                            </a>

                            <a href="edit_resep.php?id=<?= $rsp['id']; ?>">
                                <div class="bg-blue-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                                    </svg></div>
                            </a>

                        </div>
                    </td>
                </tr>
                <?php $e++; ?>
            <?php endforeach; ?>
        </table>



        <!-- TABLE PASIEN -->
        <div class="w-full h-10"></div>
        <a href="tambah_pasien.php"><button class="px-4 py-4 bg-green-500 rounded-md text-white font-semibold font-serif shadow-lg m-5 hover:brightness-90 transition-all">Tambah Data</button></a>

        <h1 class="text-2xl font-semibold mb-4">Daftar Pasien</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">

            <tr class="w-full bg-gray-200 border-b border-gray-300">
                <th class="py-4 px-6 text-left text-gray-600">No.</th>
                <th class="py-4 px-6 text-left text-gray-600">Nama Pasien</th>
                <th class="py-4 px-6 text-left text-gray-600">Umur</th>
                <th class="py-4 px-6 text-left text-gray-600">Alamat</th>
                <th class="py-4 px-6 text-left text-gray-600">Riwayat Kesehatan</th>
                <th class="py-4 px-6 text-left text-gray-600">Gol. Darah</th>
                <th class="py-4 px-6 text-left text-gray-600">Tambahan</th>
                <th class="py-4 px-6 text-left text-gray-600">Aksi</th>

            </tr>


            <?php $u = 1; ?>
            <?php foreach ($pasien as $psn) : ?>
                <tr class="border-b border-gray-300">
                    <td class="py-6 px-6"><?= $u; ?></td>
                    <td class="py-6 px-6"><?= $psn['nama_pasien']; ?></td>
                    <td class="py-6 px-6"><?= $psn['umur']; ?></td>
                    <td class="py-6 px-6"><?= $psn['alamat']; ?></td>
                    <td class="py-6 px-6"><?= $psn['riwayat_kesehatan']; ?></td>
                    <td class="py-6 px-6"><?= $psn['gol_darah']; ?></td>
                    <td class="py-6 px-6"><?= $psn['catatan_tambahan']; ?></td>
                    <td>
                        <div class="flex gap-3">

                            <a href="hapus_pasien.php?id=<?= $psn['id']; ?>" onclick="return confirm('yakin ni??')">
                                <div class="bg-red-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                    </svg></div>
                            </a>

                            <a href="edit_pasien.php?id=<?= $psn['id']; ?>">
                                <div class="bg-blue-500 px-3 py-3 rounded-lg cursor-pointer hover:brightness-75 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 256 256">
                                        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                                    </svg></div>
                            </a>

                        </div>
                    </td>
                </tr>
                <?php $u++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>