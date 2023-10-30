<?php

session_start();

require "connection.php";

if (isset($_SESSION["student"])) {

    $email = $_SESSION["student"]["email"];

?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Home | Online Thaksalawa </title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="mdb.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/book.png" />

    </head>

    <body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#101010 10%,rgb(50, 48, 48) 100%)">


        <div class="container-fluid">
            <div class="row">

                <?php include "header.php"; ?>

                <br />
                <br />

                <div class="d-lg-none d-xl-block d-xl-none hidden"></div>

                <div style="height: 110px;"></div>
                <div style="height: 10px;"></div>

                <div class="col-12 col-lg-10">
                    <div class="row">


                        <div class="col-4 col-lg-3">
                            <div class="row">
                                <div class="col-12 align-items-start bg-dark vh-50">
                                    <div class="row g-1 text-center">

                                        <div class="col-12 mt-5">
                                            <div>
                                                <h1 class="fs-5" style="color: yellow;"><?php echo $_SESSION["student"]["fname"] . " " . $_SESSION["student"]["lname"]; ?></h1>
                                            </div>
                                            <hr class="border border-1 border-white" />
                                        </div>
                                        <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column">
                                                <div class="text-white fw-bold mb-1 ">
                                                    <h2 class="fw-bold">Dashboard</h2>
                                                </div>

                                                <?php

                                                $details_rs = Database::search("SELECT * FROM `student` INNER JOIN `grade` ON 
                                                grade.grade_id=student.grade_grade_id WHERE `email`='" . $email . "'");

                                                $data = $details_rs->fetch_assoc();
                                                ?>
                                            </nav>
                                        </div>


                                    </div>


                                </div>



                            </div>
                        </div>

                        <div class="col-lg-5 border-light rounded col-12 offset-lg-3 text-center" style="margin-top: 40px;">

                            <span style="color: #74EBD5; font-size: 30px;">Welcome <?php echo $data["fname"]; ?><br> to the Online Thaksalawa <br>E-Learning Platform </span>
                        </div>
                        <div class="col-lg-12 text-center">

                            <div class="col-lg-12 col-12" style="margin-top: 40px;">
                                <div> <span class="offset-lg-2 fw-bold fs-1 text-white mt-2">You are Enroled with the <b style="color: yellow;"><?php echo $data["grade_name"]; ?> </b> Lessons</span></div>
                            </div>
                        </div>


                        <br/>
                        <br/>
                        <br/>


                        <!-- Assignments-->
                        <div class="col-12 col-lg-12 justify-content-center align-items-center text-center " style="margin-top: 80px;">
                            <div class="offset-lg-1 row ui yellow basic button vh-100"  style="width: 100%;">
                                <div class="col-12 emptyView"></div>
                                <div class="col-12 text-center">
                                    <label class="form-label fs-1 fw-bold text-white" style="margin-top: 100px;">You haven't Any Lessons Yet</label>
                                </div>
                            </div>
                        </div>
                        <!-- Assignments -->





                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>


<?php

} else {
    echo ("You are Not a valid user");
}

?>