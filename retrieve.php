<!-- Web Servis untuk menampilkan data -->
<?php
require("koneksi.php");
$perintah = "select * from tbl_tokodessert";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek); // akan mengecek query tadi berefek ke row/record dari database ngga

if ($cek > 0) {
    $response["kode"] = 1; //kalau berhasil kodenya 1
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F["id"] = $ambil->id;
        $F["nama"] = $ambil->nama;
        $F["alamat"] = $ambil->alamat;
        $F["telepon"] = $ambil->telepon;

        array_push($response["data"], $F);
    }
}
else {
    $response["kode"] = 0; //kalau engga berhasil kodenya 0
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($konek);