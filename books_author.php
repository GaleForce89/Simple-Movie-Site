<html>
<head>
    <title>Query books by author</title>
    <link rel="stylesheet" type="text/css" href="siteStyle.css">
<body>

    <!--Menu-->
    <nav class="navbar">
        <a href="index.html"><img src="Home.png" width="24" height="16">Home</a>
        <a href="all_movies.php">Movies Database</a>
        <a href="insert_form.html">Movie submission form</a>
        <a href="insert_book.html">Book submission form</a>
        <a href="books_author.php" class="active">Books by Author</a>
        <a href="books_isbn.php">Books by Isbn</a>
        <a href="books_remove.php">Book removal</a>
    </nav>
    <div class="main">
        <div class="whitebackground">

            <h1>Automated query of books database by Author</h1>
            <?php

            $servername = "localhost";
            $username = "addusername;
            $password = "password";
            $database = "dbname";

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
            if(!$result = $conn->query($sql)){
                die('There was an error running the query [' . $conn->error . ']');
            }

            echo '<div class = "bottomborder"><strong>Number of books found: ' . $result->num_rows . '</strong></div></div>';

            $res = $conn->query("SELECT LastName, FirstName, Title, Genre, Isbn, Comments
                    FROM books
                    GROUP BY LastName");

            while($row = $res->fetch_assoc()){
                echo '<p>';
                echo '<strong>Author: </strong>' . $row['LastName'] . ', ' . $row['FirstName'] . '<br />';
                echo 'title: ' . $row['Title'] . '<br />';
                echo 'genre: ' . $row['Genre'] . '<br />';
                echo 'isbn: ' . $row['Isbn'] . '<br />';
                echo 'comments: ' . $row['Comments'] . '<br />';
                echo '</p>';
            }

            ?>
        </div>
</body>
</html>