<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Panel | Online Thaksalawa</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="mdb.min.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/book.png" />

    </head>


    <body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#101010 0%,#9FaCE6 100%);">

        <?php include "admin-header.php"; ?>


        <br />
        <br />

        <div style="height:50px;"></div>

        <div class="d-lg-none d-xl-block d-xl-none hidden" style="height: 50px;"></div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-2">
                    <div class="row">
                        <div class="col-12 align-items-start bg-dark vh-100">
                            <div class="row g-1 text-center">

                                <div class="col-12 mt-5">
                                    <h4 style="color:aqua;"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4>
                                    <hr class="border border-1 border-white" />
                                </div>
                                <div style="height: 10px;"></div>
                                <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active text-white fs-5" aria-current="page" href="#">Admin Panel</a>
                                        <a class="nav-link text-white btn-white fs-5" href="managestudents.php">Manage Students</a>
                                        <a class="nav-link text-white btn-white fs-5" href="manageteachers.php">Manage Teachers</a>
                                        <a class="nav-link text-white btn-white fs-5" href="manageacademics.php">Manage Academic Officers</a>
                                        <br>
                                        <a class="nav-link text-warning btn-warning outline fs-5" href="adminprofile.php">My Profile</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-10">
                    <div class="row">

                        <div class="text-white fw-bold mb-1 mt-3">
                            <h2 class="fw-bold">Admin Panel</h2>
                        </div>
                        <div class="col-12">
                            <hr style="color: white;" />
                        </div>
                        <div class="col-12">
                            <div>
                                <div class="bg-secondary row g-1 align-items-center text-center rounded">

                                    <div class="ui statistics justify-content-center">


                                        <div class="statistic">
                                            <div class="value" style="color: silver;">
                                                <i class="bi bi-person-workspace"></i>
                                                <?php
                                                $teacher_rs = Database::search("SELECT * FROM `teacher`");
                                                $teacher_num = $teacher_rs->num_rows;
                                                ?>
                                                <?php echo $teacher_num; ?>
                                            </div>
                                            <div class="label" style="color: white;">
                                                Teachers
                                            </div>
                                        </div>

                                        <div class="statistic">
                                            <div class="value" style="color: aqua;">
                                                <i class="bi bi-people"></i>
                                                <?php
                                                $student_rs = Database::search("SELECT * FROM `student`");
                                                $student_num = $student_rs->num_rows;
                                                ?>
                                                <?php echo $student_num; ?>
                                            </div>
                                            <div class="label" style="color: aqua;">
                                                Students
                                            </div>
                                        </div>

                                        <div class="statistic">
                                            <div class="value" style="color: silver;">
                                                <i class="bi bi-mortarboard"></i>
                                                <?php
                                                $notes_rs = Database::search("SELECT * FROM `lecture_notes`");
                                                $notes_num = $notes_rs->num_rows;
                                                ?>
                                                <?php echo $notes_num; ?>
                                            </div>
                                            <div class="label" style="color: white;">
                                                Lecture Notes
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr style="color: white;" />
                        </div>

                        <div class="col-12 bg-dark">
                            <div class="row">
                                <div class="col-12 col-lg-2 text-center my-3">
                                    <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                </div>
                                <div class="col-12 col-lg-10 text-center my-3">
                                    <?php

                                    $start_date = new DateTime("2022-12-18 00:00:00");

                                    $tdate = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $tdate->setTimezone($tz);

                                    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                    $difference = $end_date->diff($start_date);

                                    ?>
                                    <label class="form-label fs-4 fw-bold text-warning">
                                        <?php

                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row g-1">

                                <div class=" offset-1 col-10 rounded d-none" id="adminacademicinvitation">


                                    <div class="row align-content-center col-12 bg-dark text-white  bg-opacity-75 text-center ml-1 mt-2  mt-lg-5" style="border-radius: 10px;">

                                        <div class="col-12 p-2">
                                            <div>

                                                <div class="col-12 ">
                                                    <div class="row g-3 text-center">
                                                        <div class="col-12">
                                                            <p class="title02">Sending Invitations for Academic Officers<br>to Register </p>

                                                        </div>
                                                        <div class="col-12  bg-opacity-75 bg-black border-primary" style="border-radius: 10px;">

                                                            <div class="col-12 p-1">
                                                                <label class="form-label  text-light">&nbsp;&nbsp;&nbsp;Add Email Here&nbsp;&nbsp;&nbsp;</label>
                                                                <input type="email" class="form-control" placeholder="ex:- widun@gmail.com" id="academicssignupemail" />
                                                            </div>

                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="ui inverted red button text-wrap" style="font-size: 25px;" onclick="adminacademicsend();">Send</button>
                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="ui yellow basic button" style="font-size: 20px;" onclick="adminacademicschangeView();">Sending Invitations for Teachers<br>to Register </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>


                                <div class=" offset-1 col-10  rounded " id="adminteacherinvitation">


                                    <div class="row align-content-center col-12 bg-dark text-white  bg-opacity-75 text-center ml-1 mt-2  mt-lg-5" style="border-radius: 10px;">

                                        <div class="col-12 p-2">
                                            <div>

                                                <div class="col-12 ">
                                                    <div class="row g-3 text-center">
                                                        <div class="col-12">
                                                            <p class="title02">Sending Invitations for Teachers<br>to Register </p>

                                                        </div>
                                                        <div class="col-12  bg-opacity-75 bg-black border-primary" style="border-radius: 10px;">

                                                            <div class="col-12 p-1">
                                                                <label class="form-label  text-light">&nbsp;&nbsp;&nbsp;Add Email Here&nbsp;&nbsp;&nbsp;</label>
                                                                <input type="email" class="form-control" placeholder="ex:- widun@gmail.com" id="academicssignupemail" />
                                                            </div>

                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="ui inverted red button text-wrap" style="font-size: 25px;" onclick="adminteachersend();">Send</button>
                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="ui yellow basic button" style="font-size: 20px;" onclick="adminacademicschangeView();">Sending Invitations for Academic Officers<br>to Register </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    echo ("You are Not a valid user");
}

?>