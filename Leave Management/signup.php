<?php
require "_dbcon.php";

if (isset($_POST['sign_up'])) {
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $user = $_POST['user'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$user'");
    $numExistRow = mysqli_num_rows($result);
    if (!($numExistRow > 0)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`id`, `user`, `password`, `type`, `date`) VALUES (NULL, '$user', '$hash', 'employee', current_timestamp())";

        if (mysqli_query($conn, $sql)) {
            echo 'User Create Successful!';
        } else {
            echo 'Network Error!';
        }
    } else {
        echo 'User already exists!';
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
    <title>Sign Up</title>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <main class="form-signin w-100 m-auto formcustom">
        <form method="post" class="my-5">

            <div class="p-3 mb-2 bg-info text-dark formcustom">
                <h1 class="h3 mb-3 fw-normal">Create an Account</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Your Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-check text-start">
                    <input class="form-check-input" type="checkbox" value="receive-emails" id="flexCheckEmails">
                    <label class="form-check-label" for="flexCheckEmails">
                        Receive promotional emails
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
            </div>
        </form>
</main>
</body>

</html>