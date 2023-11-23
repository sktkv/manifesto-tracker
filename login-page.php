<html>
    <head>
        <title> Admin Login</title>
    </head>

    <body>
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

    </body>
</html>