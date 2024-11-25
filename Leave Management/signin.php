<?php
require "_dbcon.php";
session_start();
?>

<?php


if (isset($_POST['sign_in'])) {

  $user = $_POST['user'];
  $password = $_POST['password'];

  $User_result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$user'");
  $num_rows = mysqli_num_rows($User_result);
  if ($num_rows == 1) {
    while ($get_data_row = mysqli_fetch_assoc($User_result)) {
      if (password_verify($password, $get_data_row['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $get_data_row;
        echo "Successfully Signed in";
      } else {
        echo "Invalid Password";
      }
    }
  } else {
    echo "Invalid User";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="mystyle.css">
  <title>Document</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <main class="form-signin w-100 m-auto formcustom">

    <form method="post" class="my-5">

      <div class="p-3 mb-2 bg-info text-dark">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="user" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2" name="sign_in" value='1' type="submit">Sign In</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
      </div>
    </form>

  </main>
</body>

</html>

<!-- INSERT INTO `users` (`id`, `user`, `password`, `type`, `date`) VALUES (NULL, 'test', 'test', 'user', current_timestamp()); -->