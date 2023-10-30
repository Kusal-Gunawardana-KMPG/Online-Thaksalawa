<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teacher SignIn | Online Thaksalawa</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="mdb.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/book.png" />
</head>

<body class="workspace ">

    <div class="container-fluid d-flex col-12">

        <!--Teacher SignIn Part -->

        <div class="row align-content-center col-12 col-lg-5 offset-lg-6  bg-dark text-white  bg-opacity-75 text-center ml-1 mt-2  mt-lg-5" style="border-radius: 10px;" id="teachersigninBox">

            <div class="col-12 ">
                <div class="row title-box">
                    <div style="height: 20px;"></div>
                    <div class=" justify-content-center LOGO2 "></div>
                    <div class="col-12 ">
                        <p class="text-center mt-4 font-monospace "><i style="font-size: xx-large; color: rgb(252, 254, 163); font-weight: bolder;">Online Thaksalawa </i><br><br><i class="academic-teacher">Teachers</i></p>
                    </div>
                    <div style="height: 20px;"></div>

                </div>
            </div>

            <div class="col-12 p-2">
                <div class="row">

                    <div class="col-12  d-block">
                        <div class="row g-3 text-center">
                            <div class="col-12">
                                <p class="title02">Sign In to your Account.</p>
                            </div>
                            <div class="col-12  bg-opacity-75 bg-black border-primary" style="border-radius: 10px;">

                                <div class="col-12 p-1">
                                    <label class="form-label  text-light">&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;</label>
                                    <input type="email" class="form-control" placeholder="ex:- widun@gmail.com" id="teachersigninemail" />
                                </div>

                                <div class="col-12 p-1">
                                    <label class="form-label text-light">&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;</label>
                                    <input type="password" class="form-control" placeholder="ex:- **********" id="teachersigninpassword" />
                                </div>

                            </div>
                            <div class="col-12  d-grid">
                                <button class="ui inverted red button text-wrap" style="font-size: 25px;" onclick="teachersignin();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn ui inverted teal button" style="font-size: 20px;" onclick="teacherchangeView();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui inverted brown basic button" onclick="studentlogin();">Back to <br>Student Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Teacher SignIn Part -->


        <!--Teacher SignUp Part -->

        <div class=" d-flex col-12  d-none" id="teachersignupBox">


            <div class="row align-content-center col-12 col-lg-6 offset-lg-5  bg-dark text-white  bg-opacity-75 text-center ml-1 mt-2  mt-lg-5" style="border-radius: 10px;">

                <div class="col-12 ">
                    <div class="row title-box">
                        <div style="height: 20px;"></div>
                        <div class=" justify-content-center LOGO2 "></div>
                        <div class="col-12 ">
                            <p class="text-center mt-4 font-monospace "><i style="font-size: xx-large; color: rgb(252, 254, 163); font-weight: bolder;">Online Thaksalawa </i><br><br><i class="academic-teacher">Teachers</i></p>
                        </div>
                        <div style="height: 20px;"></div>

                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="row">

                        <div class="col-12  d-block">
                            <div class="row g-3 text-center">
                                <div class="col-12">
                                    <p class="title02" >Sign Up As a Teacher </p>
                                    
                                </div>
                                <div class="col-12  bg-opacity-75 bg-black border-primary" style="border-radius: 10px;">

                                    <div class="col-12 p-1">
                                        <label class="form-label  text-light">&nbsp;&nbsp;&nbsp;Add Your Email to Continue&nbsp;&nbsp;&nbsp;</label>
                                        <input type="email" class="form-control" placeholder="ex:- widun@gmail.com" id="teachersignupemail" />
                                    </div>

                                </div>
                                <div class="col-12  d-grid">
                                    <button class="ui inverted red button text-wrap" style="font-size: 25px;" onclick="teachersignup();">Sign Up</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn ui inverted teal button" style="font-size: 20px;" onclick="teacherchangeView();">Already Have an Acoount?<br> SignIn</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="ui inverted brown basic button" onclick="studentlogin();">Back to <br>Student Log In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>


        <!--Teacher SignUp Part -->


        <!--Teacher Verification Modal  -->

        <div class="modal" tabindex="-1" id="teacherverificationModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Teacher Verification Process</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-content-center">
                        <h1> Verify Your Account</h1>
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" id="teachersusername">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" id="teacherspassword">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="teachersvcode">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="verifyteacher();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Teacher Verification Modal  -->


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