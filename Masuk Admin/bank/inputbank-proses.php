<?php 
include '../../koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'entry_Bank.php';
            </script>
        ";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'entry_Bank.php';
            </script>
        ";
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../../img_bank/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $nama_bank = $_POST['nama_bank'];
    $tahun = $_POST['tahun'];
    $photo = upload();

    $sql = "INSERT INTO tb_bank VALUES(NULL, '$photo', '$nama_bank', '$tahun')";

    if(empty($nama_bank) || empty($tahun)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'entry_Bank.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                window.location = 'bank.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'entry_Bank.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $nama_bank = $_POST['nama_bank'];
    $tahun    = $_POST['tahun'];
    $photoLama = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../img_bank/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tb_bank SET 
            photo = '$photo',
            nama_bank = '$nama_bank',
            tahun = '$tahun'
            WHERE id = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                window.location = 'bank.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'bank-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_bank WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../img_bank/' . $photo);
    

    $sql = "DELETE FROM tb_bank WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                window.location = 'bank.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                window.location = 'bank.php';
            </script>
        ";
    }
}else {
    header('location: bank.php');
}
