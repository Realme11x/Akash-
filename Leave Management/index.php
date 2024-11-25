<link href="index.css" rel="stylesheet">
<?php require_once "_dbcon.php"?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <?php include 'header.php' ?>
    <title>Welcome to Our Website</title>
    
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<header>
        <h1>Welcome to Our Website</h1>
    </header>
    
    
    

        <?php include 'body.php' ?>


        <?php include 'footer.php' ?>
     
</body>
</html>

<?php

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
        
?>