<html>
<head>
    <title>Insert Book Form</title>
    <link rel="stylesheet" type="text/css" href="siteStyle.css">
</head>

<body>
    <!--Menu-->
    <nav class="navbar">
        <a href="index.html"><img src="Home.png" width="24" height="16">Home</a>
        <a href="all_movies.php">Movies Database</a>
        <a href="insert_form.html">Movie submission form</a>
        <a href="insert_book.html" class="active">Book submission form</a>
        <a href="books_author.php">Books by Author</a>
        <a href="books_isbn.php">Books by Isbn</a>
        <a href="books_remove.php">Book removal</a>
    </nav>

    <div class="main">


        <div class="whitebackground">
            <div class="group">
                <section class="leftDB">
                    <h1>Book submission form</h1>
                    <form action="insert_book.php" method="post">

                        <table border=0>
                            <tr><td>Book Title</td>
                                <td><input type=text name=title maxlength=30 size=30 required><br></td></tr>
                            <tr><td>Author's first name</td><td>
                            <input list="firstname" name="authorfn">
                            <datalist id="firstname">



                            <?php

                            $servername = "localhost";
                            $username = "addusername;
                            $password = "password";
                            $database = "dbname";


                            // only process if connected
                            if(! empty ($_POST)) {

// Create connection
                                $conn = new mysqli($servername, $username, $password, $database);

// Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = <<<SQL
    SELECT *
    FROM `books` 
SQL;

                                $res = $conn->query("SELECT FirstName
                                FROM books
                                GROUP BY FirstName");

                                while($row = $res->fetch_assoc()){
                                    echo '<option value = "' . $row['FirstName'] . '">';

                                }

                                echo '</datalist><br></td></tr>';
                                echo '<tr><td>Author last name</td><td>';
                                echo '<input list="lastname" name="authorln">';
                                echo '<datalist id="lastname">';

                                $res = $conn->query("SELECT LastName
                                FROM books
                                GROUP BY LastName");

                                while($row = $res->fetch_assoc()){
                                    echo '<option value = "' . $row['LastName'] . '">';

                                }

                                echo '</datalist><br></td></tr>';


                            }





                            ?>




                            <tr><td>ISBN</td>
                                <td><input type=text name=isbn maxlength=30 size=30 required><br></td></tr>
                            <tr><td>Genre</td>
                                <td>
                                    <select name="genre" required>
                                        <option value=""></option>
                                        <option value="Autobiography">Autobiography</option>
                                        <option value="Biography">Biography</option>
                                        <option value="Educational">Educational</option>
                                        <option value="Non-fiction">Non-fiction</option>
                                        <option value="Fiction">Fiction</option>
                                    </select>
                                    <br></td></tr>
                            <tr><td>Additional Comments</td>
                                <td><textarea name=comments rows=4 cols=40></textarea><br></td></tr>
                            <tr><td>
                                    <input type=submit value="Update Database"></td></tr>
                        </table>

                    </form>
                </section>

                <section class="right"><img src="books-441866_640.png" width="340" height="255"></section>

            </div>
        </div>
    </div>
</body>
</html>
