

<?php 
include '../../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tgl'];
    
 

    $sql = "INSERT INTO customer VALUES('', '$nama', '$email', '$telp','$alamat','$tanggal')";

    if(empty($nama) || empty($email) || empty($telp) || empty($alamat) || empty($tanggal)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'entry_customers.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Data Berhasil Ditambahkan');
                window.location = 'customers.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'entry_customers.php';
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tgl'];
    
 

    $sql = "UPDATE costumer SET
            nama = '$nama', 
            email = '$email', 
            telp = '$telp', 
            alamat = '$alamat', 
            tgl = '$tanggal', 
            
            WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                window.location = 'customers.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'customers-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_bank WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                window.location = 'customers.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                window.location = 'customers.php'
            </script>
        ";
    }
}else {
    header('location: customers.php');
}

?>

