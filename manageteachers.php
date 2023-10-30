<?php
session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Teachers | Admins | Online Thaksalawa</title>


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

            <div class="col-12 bg-dark text-center ">
                <label class="form-label text-white fw-bold fs-1">Manage All Teachers</label>
            </div>

            <div class="col-12 mt-3 mb-3 bg-light">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary py-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-primary py-2">
                        <span class="fs-4 fw-bold text-white">Teacher Name</span>
                    </div>
                    <div class="col-5 col-lg-2 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-primary py-2">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-1 bg-white"></div>
                </div>
            </div>

            <?php

            $query = "SELECT * FROM `teacher`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>
                <div class="col-12 mt-3 mb-3 bg-light">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-primary  py-2 text-end">
                            <span class="fs-4 text-white"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 bg-primary  py-2">
                            <span class="fs-4 text-white"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                        </div>
                        <div class="col-5 col-lg-2 d-lg-block bg-light py-2">
                            <span class="fs-4 "><?php echo $selected_data["email"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-primary  py-2">
                            <span class="fs-4 text-white"><?php echo $selected_data["mobile"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-4 "><?php echo $selected_data["joined_date"]; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                            <?php

                            if ($selected_data["status_id"] == 1) {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger" onclick="blockteacher('<?php echo $selected_data['email']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-success" onclick="blockteacher('<?php echo $selected_data['email']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>

                        </div>
                    </div>
                </div>
                
            <?php

            }

            ?>

            <!--  -->
            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->



        </div>
    </div>

    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="bootstrap.js"></script>
    <script src="semantic.min.js"></script>
</body>

</html>