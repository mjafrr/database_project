<?php

$koneksi = mysqli_connect("localhost", "root", "", "manajemen_apotek");


function getdata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function getTable($table)
{
    global $koneksi;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data, $table)
{
    global $koneksi;

    if ($table == 'obat') {
        // Data untuk tabel obat
        $obat = htmlspecialchars($data["obat"]);
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = htmlspecialchars($data["harga"]);
        $stok = htmlspecialchars($data["stok"]);

        $query = "INSERT INTO obat (nama_obat, kategori, harga, stok) 
                VALUES 
    ('$obat', '$kategori', '$harga', '$stok')";
    } elseif ($table == 'resep_dokter') {
        // Data untuk tabel resep_dokter
        $pasien = htmlspecialchars($data["pasien"]);
        $obat = htmlspecialchars($data["obat"]);
        $dosis = htmlspecialchars($data["dosis"]);
        $tanggal = ($data["tanggal_resep"]);

        $query = "INSERT INTO resep_dokter 
                VALUES
    ('', '$pasien', '$obat', '$dosis', '$tanggal' )";
    } elseif ($table == 'pasien') {
        $pasien = htmlspecialchars($data["nama_pasien"]);
        $umur = htmlspecialchars($data["umur"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kesehatan = ($data["riwayat_kesehatan"]);
        $goldarah = ($data["gol_darah"]);
        $tambahan = ($data["catatan_tambahan"]);

        $query = "INSERT INTO pasien 
                VALUES
    ('', '$pasien', '$umur', '$alamat', '$kesehatan', '$goldarah', '$tambahan' )";
    } else {
        return -1;
    }

    // Menjalankan query
    mysqli_query($koneksi, $query);

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}


function hapus($id, $table)
{
    global $koneksi;

    $query = "DELETE FROM $table WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}



function edit($data, $id, $table)
{
    global $koneksi;

    // Ambil data dari parameter
    $obat = htmlspecialchars($data["obat"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);

    if ($table == 'obat') {
        $query = "UPDATE obat SET 
                    nama_obat = '$obat',
                    kategori = '$kategori', 
                    harga = '$harga', 
                    stok = '$stok'
                    WHERE id = $id";
    } elseif ($table == 'resep_dokter') {
        $pasien = htmlspecialchars($data["pasien"]);
        $obat = htmlspecialchars($data["obat"]);
        $dosis = htmlspecialchars($data["dosis"]);
        $tanggal = ($data["tanggal_resep"]);

        $query = "UPDATE resep_dokter SET 
                pasien = '$pasien',
                obat = '$obat', 
                dosis = '$dosis', 
                tanggal_resep = '$tanggal'
                WHERE id = $id";
    } elseif ($table == 'pasien') {
        $pasien = htmlspecialchars($data["nama_pasien"]);
        $umur = htmlspecialchars($data["umur"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kesehatan = htmlspecialchars($data["riwayat_kesehatan"]);
        $goldarah = htmlspecialchars($data["gol_darah"]);
        $tambahan = htmlspecialchars($data["catatan_tambahan"]);

        $query = "UPDATE pasien SET 
                nama_pasien = '$pasien',
                umur = '$umur', 
                alamat = '$alamat', 
                riwayat_kesehatan = '$kesehatan'
                gol_darah = '$goldarah', 
                catatan_tambahan = '$tambahan', 
                WHERE id = $id";
    } else {
        // Jika tabel tidak dikenal, return error atau exception
        return "Tabel tidak dikenal!";
    }

    // Eksekusi query
    mysqli_query($koneksi, $query);

    // Kembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($koneksi);
}
