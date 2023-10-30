<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <link rel="icon" href="resources/LOGO.gif" />

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidepanel {
            width: 0;
            position: fixed;
            z-index: 1;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidepanel a:hover {
            color: #f1f1f1;
        }

        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }
    </style>

</head>

<body>
    <div class="fixed-top">
        <div class="col-12 ">
            <div class="row  mb-1">

                <nav class="navbar navbar-dark" style="background-color: maroon;">
                <div style="height: 10px;"></div>

                    <div class=" offset-1 col-12 row ">
                        <div class="col-lg-4 col-6 col-12">
                            <span class="text-lg-start"><a href="home.php" class=" header-topic ">| &nbsp;Online Thaksalawa&nbsp; |</a></span> |
                        </div>
                        <div class="offset-lg-4 col-lg-4 col-12">
                            <div class="ui buttons">
                                <button class="ui button"><b style="font-size:medium;" onclick="academicsignout();">SignOut</b></button>
                                <div class="or"></div>
                                <button onclick="index();" class="ui positive button"><b  style="font-size:medium;">SignIn</b></button>
                            </div>
                        </div>

                    </div>



                </nav>

                <div class="col-lg-12 col-12 " style="margin-top:-5px;">
                    <div id="mySidepanel" class="sidepanel">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <a href="academicprofile.php" class="p-4">My Profile</a>
                        <a href="#" class="p-4"> Assignment Marks</a>
                        <a href="#" class="p-4">Release Marks</a>
                    </div>
                    <div class="row" style="background-color: black;">

                        <div class="col-lg-2 col-3">
                            <button class="openbtn" onclick="openNav()">☰ MENU</button>
                        </div>

                    </div>
                    <script>
                        function openNav() {
                            document.getElementById("mySidepanel").style.width = "250px";
                        }

                        function closeNav() {
                            document.getElementById("mySidepanel").style.width = "0";
                        }
                    </script>
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