<?php

session_start();

require "connection.php";

if (isset($_SESSION["teacher"])) {

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Teacher | Online Thaksalawa </title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="mdb.min.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/book.png" />
    </head>

    <body>

        <?php include "teacher-header.php" ?>

        <br />
        <br />

        <div style="height: 100px;"></div>

        <div class="d-lg-none d-xl-block d-xl-none hidden" style="height: 50px;"></div>


        <h1><?php echo $_SESSION["teacher"]["fname"] ?></h1>

        <script src="script.js"></script>
        <script src="semantic.js"></script>
        <script src="bootstrap.js"></script>
        <script src="semantic.min.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("You are Not a valid user");
}

?>