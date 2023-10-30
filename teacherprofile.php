<?php

require "connection.php";

session_start();
if (isset($_SESSION["teacher"])) {

    $email = $_SESSION["teacher"]["email"];

?>




    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>My Profile | Online Thaksalawa </title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="mdb.min.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/book.png" />
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                include "teacher-header.php";

                $details_rs = Database::search("SELECT * FROM `teacher` INNER JOIN `gender` ON gender.id=teacher.gender_id WHERE `email`= '".$email."' ");

                $data = $details_rs->fetch_assoc();

                ?>

                <br />
                <br />

                <div style="height:70px;"></div>

                <div class="d-lg-none d-xl-block d-xl-none hidden" style="height: 50px;"></div>



                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <span class="fw-bold fs-3"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                        <span class="fw-bold text-primary"><?php echo $email; ?></span>

                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold fs-3 text-danger offset-1">Teacher Profile Details</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" value="<?php echo $data["password"]; ?>" id="password"/>
                                                    <span class="input-group-text bg-primary" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["joined_date"]; ?>" />
                                            </div>


                                            <div class="col-12">
                                                <label class="form-label">Gender</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["gender_name"]; ?>" />
                                            </div>

                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="teacherupdateProfile();">Update My Profile</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 text-center">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>









            </div>
        </div>


        <script src="script.js"></script>
        <script src="semantic.js"></script>
        <script src="bootstrap.js"></script>
        <script src="semantic.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location:http://localhost/online%20thaksalawa/academicspanel.php");
}

?>