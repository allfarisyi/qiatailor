<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="height: 3000px">
    <!----Header --->
    <?php include "header.php";?>
    <!----End Header --->
    <div class="container-lg">
        <div class="row">
            <!----Sidebar --->
            <?php include "sidebar.php"; ?>
            <!--- End Sidebar --->

            <!--- Content --->
           <?php
           if(isset($_GET['x']) && $_GET['x'] == 'dasboard'){
                include "dasboard.php";
           }if(isset($_GET['x']) && $_GET['x'] == 'customer'){
            include "customer.php";
           }if(isset($_GET['x']) && $_GET['x'] == 'order'){
            include "order.php";
           }if(isset($_GET['x']) && $_GET['x'] == 'ukurandanbahan'){
            include "ukurandanbahan.php";
           }if(isset($_GET['x']) && $_GET['x'] == 'admin'){
            include "admin.php";
           }
           ?>
            <!--- End Content --->
        </div>

        <div class="fixed-bottom text-center mb-2">
            Aldi Alfarisyi 2024
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>