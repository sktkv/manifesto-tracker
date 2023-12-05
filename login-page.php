<html>
    <head>
        <title> Admin Login</title>
        <link rel="stylesheet" href="stylesheet.css?v=<?php echo time(); ?>">
        <style> 
            @import url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css);

            a {
            text-decoration: none;
            color:inherit;
            background-color: transparent;
            }

        </style>
    </head>

    <body>
        <div class = "header">
            <div class = "leftside">
                <a href = "index-proper.php">
                    <span style="font-family: 'Noto Sans Kannada'; font-size: 20px"> ಭರವಸೆ</span>
                    <span style="font-family: 'Verdana'; font-size: 17px">bharavase</span>
                </a>
            </div>
            <div class = "rightside">
                <a href = "#" style = "font-family: 'Verdana'; font-size: 17px">
                    about
                </a> 
            </div> 

        </div>

        <div id = "formblank">

            <div id = "loginform">
                <b> Log in </b>
                <br>
                <form action = "login.php" method = "post">
                    <?php if (isset($_GET['error'])){ ?>
                        <p class = "error"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <label> Username </label>
                    <input type = "text" name = "username" placeholder= "Username"><br>

                    <label> Password </label>
                    <input type = "password" name = "password" placeholder="Password"><br>

                    <button type = "submit"> Login </button>
                </form>
            </div>

        </div>

        <div class = footer>
        <a href = "index-proper.php"> back to main page </a> 
        </div>

    </body>
</html>