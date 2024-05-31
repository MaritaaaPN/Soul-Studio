<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $lahir = $_POST['lahir'];
    $bangsa = $_POST['bangsa'];
    $gaya = $_POST['gaya'];
    $bio = $_POST['bio'];

    // if(isset($_POST['simpan'])) {
    //     $nama = $_POST['detail-nama'];
    //     $lahir = $_POST['detail-lahir'];
    //     $bangsa = $_POST['detail-bangsa'];
    //     $gaya = $_POST['detail-gaya'];
    //     $bio = $_POST['detail-bio'];

    $sql = "INSERT INTO tb_artist VALUES(NULL, '$nama', '$lahir', '$bangsa','$gaya', '$bio')";

    if(empty($nama) || empty($lahir)|| empty($bangsa) || empty($gaya) || empty($bio)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'artist-entry.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artist Berhasil Ditambahkan');
                window.location = 'artist.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'artist-entry.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $nama      = $_POST['nama'];
    $lahir     = $_POST['lahir'];
    $bangsa   = $_POST['bangsa'];
    $gaya  = $_POST['gaya'];
    $bio  = $_POST['bio'];

    $sql = "UPDATE tb_artist SET 
            nama = '$nama',
            lahir = '$lahir',
            bangsa = '$bangsa',
            gaya = '$gaya',
            bio = '$bio'
            WHERE id = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artist Berhasil Diubah');
                window.location = 'artist.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'artist-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_artist WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artist Berhasil Dihapus');
                window.location = 'artist.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Artist Gagal Dihapus');
                window.location = 'artist.php';
            </script>
        ";
    }
}else {
    header('location: artist.php');
}
