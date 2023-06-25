<?php 
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $tanggal = $_POST['tgl'];
    $phone = $_POST['phone'];

    echo
    'Nama : ' . $nama . 
    '<br> Jabatan : ' . $jabatan .
    '<br> Tanggal : ' . $tanggal . 
    '<br> No_Telp : ' . $phone;
}

?>
