<html>
    <head>
        <title>
            Admin: Add Promises
        </title>

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
                <a href = "index.php" style = "font-family: 'Verdana'; font-size: 17px">
                    table
                </a> 
            </div> 

        </div>

        <h3 style = "text-align: center"> Add New Promise </h3>

        <div class = "adminform"> 
            <form method = "POST", action="promise-admin.php">
            
                <p>
                    <label> Category </label><br>
                    <input type="text" id="category" name="category" placeholder="Add Category" required />
                </p>

                <p>
                    <label> Promise </label><br>
                    <input type="text" id="promise" name="promise" placeholder="Add Promise" required />
                </p>

                <p>
                    <label> Status </label><br>
                    <select name="status" id="status">
                        <option value="In progress">In progress</option>
                        <option value="Yet to start"> Yet to start</option>
                        <option value="Stalled"> Stalled </option>
                        <option value="Broken"> Broken</option>
                        <option value="Fulfilled">Fulfilled</option>
                    </select> <br>
                </p>

                <p>
                    <label> Details </label><br>
                    <textarea id="details" name="details" placeholder="Add details"  rows="10" cols="50">
                        </textarea>
                </p>

                <p>
                    <label> Date of Entry</label><br>
                    <input type="date" id="date" name="date" placeholder="Add date of entry" />
                </p>

                <p>
                    <input type="submit" name="submit">
                </p>

            </form>

        </div>

        <div class = footer>
            <a href = "index.php"> back to edit page </a> 
        </div>
    </body>
</html>