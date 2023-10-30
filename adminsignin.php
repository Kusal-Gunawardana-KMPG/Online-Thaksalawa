<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin SignIn | Online Thaksalawa</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="mdb.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/book.png" />
</head>

<body class="workspace ">

    <!--Admin SignIn Part -->


    <div class="container-fluid d-flex col-12">

        <div class="row align-content-center col-12 col-lg-5 offset-lg-6  bg-dark text-white  bg-opacity-75 text-center ml-1 mt-2  mt-lg-5" style="border-radius: 10px;">

            <div class="col-12 ">
                <div class="row title-box">
                    <div style="height: 20px;"></div>
                    <div class=" justify-content-center LOGO2 "></div>
                    <div class="col-12 ">
                        <p class="text-center mt-4 font-monospace "><i class=" title01">Hi,,<br>Warmly Welcome</i><br><br><i style="font-size: xx-large; color: rgb(252, 254, 163); font-weight: bolder;">Online Thaksalawa <br>Admins</i></p>
                    </div>

                </div>
            </div>

            <div class="col-12 p-2">
                <div class="row">

                    <div class="col-12  d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title02">Sign In to your Account.</p>
                            </div>
                            <div class="col-12 ">
                                <label class="form-label text-white">Email</label>
                                <input type="email" class="form-control" placeholder="ex : dammika@gmail.com" id="adminemail" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn ui inverted teal button" onclick="adminVerification();">Send Verification Code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class=" ui inverted red button" onclick="studentlogin();">Back to <br>Student Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Admin SignIn Part -->

            <!--Admin Verification Modal  -->

            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="adminvcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Admin Verification Modal  -->

        </div>
    </div>

    <!--Online Thaksalawa footer -->

    <div class="col-12 text-center d-none d-lg-block bg-dark footer fixed-bottom">
        <p>&copy; 2023 Online Thaksalawa.lk || All Rights Reserved</p>
    </div>

    <!--Online Thaksalawa footer -->

    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="bootstrap.js"></script>
    <script src="semantic.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>