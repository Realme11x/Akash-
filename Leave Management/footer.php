<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Attractive Bootstrap Footer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="footer.css" rel="stylesheet">


</head>

<body>

    <footer class="bg-dark text-white text-center custom-footer">

        <div class="row">
            <div class="col-md-4 text-left"> <!-- Added class 'text-left' -->
                <h5>Contact Us</h5>
                <p>Email: info@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
            <div class="col-md-4"> <!-- No changes -->
                <h5>Follow Us</h5>
                <a href="#" class="text-white">Facebook</a><br>
                <a href="#" class="text-white">Twitter</a><br>
                <a href="#" class="text-white">Instagram</a>
            </div>
            <div class="col-md-3 ml-auto text-right"> <!-- Added class 'ml-auto' -->
    <h5 class="text-center">Subscribe</h5>
    <form>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-sm">Subscribe</button>
    </form>
</div>


        </div>
        <div class="container mt-2">
            <p class="mb-0">&copy; 2023 Your Company</p>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>