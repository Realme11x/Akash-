<?php
require "_dbcon.php";
// session_start();
?>

<?php


if (isset($_POST['sumbitinfo'])) {

  $user = $_POST['user'];
  $contact = $_POST['contact'] ;
  $email = $_POST['email'];
  $address = $_POST['address'];
  
  if(mysqli_query($conn, "INSERT INTO `data` (`user`, `contact`, `email`, `address`, `sno`) VALUES ('$user', '$contact', '$email', '$address', NULL);" )) {
   
    echo "successful" ;
    
  }

  else {
    echo "invalid input" ;
  }

  
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
      <form method='post' >
    <div class="container">
        <div class="form-floating">
            <input type="text" class="form-control" name="user" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Enter your Name</label>
        </div>
        <div class="form-floating">
            <input type="contact" class="form-control" name="contact" id="floatingcontact" placeholder="contact">
            <label for="floatingcontact">Enter your Contact</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingemail" placeholder="email">
            <label for="floatingemail">Enter your Email</label>
        </div>

        <div class="form-floating">
            <input type="address" class="form-control" name="address" id="floatingaddress" placeholder="address">
            <label for="floatingaddress"> Enter your Address</label>
          </div>
          <button type="submit" name='sumbitinfo' class="btn btn-primary">Submit</button>
      </div>
</form>
        <section>

            <h2>About Us</h2>
            <p>This is leave management system</p>
        </section>
        <section>
            <h2>Our Services</h2>
            <ul>
                <li>Service 1</li>
                <li>Service 2</li>
                <li>Service 3</li>
            </ul>
        </section>

    </main>
</body>

</html>