

<?php 
include '../../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $produk = $_POST['produk'];
   
    
 

    $sql = "INSERT INTO supplier VALUES('', '$nama', '$alamat', '$kontak','$produk')";

    if(empty($nama) || empty($alamat) || empty($kontak) || empty($produk)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'entry_supplier.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Data Berhasil Ditambahkan');
                window.location = 'supplier.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'entry_supplier.php';
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $produk = $_POST['produk'];
    
 

    $sql = "UPDATE tb_transaction SET
            nama = '$nama', 
            alamat = '$alamat',  
            kontak = '$kontak', 
            produk = '$produk', 
            WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Transaction Berhasil Diubah');
                window.location = 'supplier.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'supplier.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM supplier WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Transaction Berhasil Dihapus');
                window.location = 'supplier.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Transaction Gagal Dihapus');
                window.location = 'supplier.php'
            </script>
        ";
    }
}else {
    header('location: supplier.php');
}

?>

