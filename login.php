<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="icon" href="assets/SOUL1.png" />
    <link rel="stylesheet" href="css/lore.css" />
  </head>

  <body>
    <div class="container">
      <header>
        <div class="lore-box">
          <div class="logo">
            <img src="assets/SOUL1.png" alt="" />
          </div> 
          <h2>LOGIN</h2>
          <form action="login-proses.php" method="post">
            <div class="user-box">
              <input type="email" id="email" name="email" required="">
              <label for="email">Email Address</label>
            </div>
            <div class="user-box">
              <input type="password" id="password" name="password" required="">
              <label>Password</label>    
            </div>
            <div class="remember-me">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Remember me</label>
            </div>
            <input type="submit" name="login" value="Login">
		   </button>
          </form>
          <div class="register-link">
            Create Account Here <a href="register.php">Register</a>
          </div>
        </div>
      </header>
    </div>
    <footer>
      <h4>&copy; Soul Studio 2024</h4>
    </footer>

    <?php
      session_start();
      // Data formulir (email dan password) dikirimkan melalui metode POST
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Mengambil nilai dari inputan formulir
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Jika terdapat data / field yang kosong 
        if ($email === "" || $password === "") {
          echo "<script> alert('Data Belum Lengkap.'); </script>";
        } else {
          // Simpan email pengguna ke session
          $_SESSION['email'] = $email;

          // Set cookie dengan email pengguna
          setcookie('email', $email, time() + (86400 * 30), '/'); 
          echo "<script> alert('Selamat, Anda Berhasil Login!'); window.location.href = 'admin.php'; </script>";
          exit();
        }
      }
    ?>
    
  </body>
</html>
