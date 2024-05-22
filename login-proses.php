<?php 

include 'koneksi.php';
if(isset($_POST['login'])) {
  $requestEmail = $_POST['email']; 
  $requestPassword = $_POST['password'];

  $sql = "SELECT * FROM tb_admin WHERE email = '$requestEmail'";
  list($id, $nama, $email, $username, $password) = mysqli_fetch_row(mysqli_query($koneksi, $sql));
  $result = mysqli_query($koneksi, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    if (password_verify($requestPassword, $password)) {
        while($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['email'] = $row['email'];
            header('location:admin.php');
        }
      } else { 
          echo "
          <script>
            alert('Email atau Password Anda Salah, Silahkan Coba Lagi');
            window.location = 'login.php';
          </script>
          ";
      }
    } else { 
        echo "
        <script>
          alert('Email atau Password Anda Salah, Silahkan Coba Lagi');
          window.location = 'login.php';
        </script>
        ";
    }
}

?>
