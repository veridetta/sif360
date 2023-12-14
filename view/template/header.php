<!DOCTYPE html>
<html lang="en">
<?php
    include '../../config/database.php';
    session_start();
    $about = mysqli_query($conn, "SELECT * FROM about Limit 1");
    $about = mysqli_fetch_assoc($about);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIF 360</title>
    <link rel="icon" href="../../assets//images/logo.jpg" type="image/png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="../../assets/css/sidebar.css" rel="stylesheet">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../../">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="../../assets/images/logo.jpg" alt="Logo" width="50" height="50">
                    </div>
                    <div class="col">
                        <p class="m-0 font-weight-bold" style="font-weight: bold !important;"><?php echo $about['name'];?></p>
                        <p class="m-0" style="font-size: smaller;"><small><?php echo $about['slogan'];?></small></p>
                        <p class="m-0" style="font-size: small;"><small><?php echo $about['address'];?></small></p>
                    </div>
                </div>
            </a>
        </div>
    </nav>

    </header>
    
