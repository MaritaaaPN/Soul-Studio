<?php 
include '../koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'artwork-entry.php';
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
                window.location = 'artwork-entry.php';
            </script>
        ";

        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../img_artwork/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $artist = $_POST['artist'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $photo = upload();

    if(!$photo) {
        return false;
    }
    var_dump($photo, $judul, $artist, $kategori, $deskripsi);

    $sql = "INSERT INTO tb_artwork VALUES(NULL, '$photo', '$judul', '$artist','$kategori', '$deskripsi')";

    if(empty($judul) || empty($artist)|| empty($kategori) || empty($deskripsi)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'artwork-entry.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artwork Berhasil Ditambahkan');
                window.location = 'artwork.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'artwork-entry.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $judul      = $_POST['judul'];
    $artist     = $_POST['artist'];
    $kategori   = $_POST['kategori'];
    $deskripsi  = $_POST['deskripsi'];
    $photoLama  = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../img_artwork/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tb_artwork SET 
            photo = '$photo',
            judul = '$judul',
            artist = '$artist',
            kategori = '$kategori',
            deskripsi = '$deskripsi'
            WHERE id = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artwork Berhasil Diubah');
                window.location = 'artwork.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'artwork-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_artwork WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../img_artwork/' . $photo);
    

    $sql = "DELETE FROM tb_artwork WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Artwork Berhasil Dihapus');
                window.location = 'artwork.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Artwork Gagal Dihapus');
                window.location = 'artwork.php';
            </script>
        ";
    }
}else {
    header('location: artwork.php');
}
