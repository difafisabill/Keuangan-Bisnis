

<?php 
include '../../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['note'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
   
    
 

    $sql = "INSERT INTO product VALUES('', '$nama', '$deskripsi', '$harga','$stok')";

    if(empty($nama) || empty($deskripsi) || empty($harga) || empty($stok)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'entry_product.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Data Berhasil Ditambahkan');
                window.location = 'product.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'entry_product.php';
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['note'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
 

    $sql = "UPDATE product SET
            nama = '$nama', 
            note = '$deskripsi', 
            harga = '$harga', 
            stok = '$stok', 
            WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                window.location = 'product.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'product.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM product WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                window.location = 'product.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                window.location = 'product.php'
            </script>
        ";
    }
}else {
    header('location: product.php');
}

?>

