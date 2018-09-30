<html>
<head>
    <title>Insert Movies Results</title>
    <link rel="stylesheet" type="text/css" href="siteStyle.css">
<body>

    <!--Menu-->
    <nav class="navbar">
        <a href="index.html"><img src="Home.png" width="24" height="16">Home</a>
        <a href="all_movies.php">Movies Database</a>
        <a href="insert_form.html">Movie submission form</a>
        <a href="insert_book.html">Book submission form</a>
      <a href="books_author.php">Books by Author</a>
      <a href="books_isbn.php">Books by Isbn</a>
      <a href="books_remove.php">Book removal</a>
    </nav>

    <div class="main">
        <p>
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

                // Escape user inputs for security
                $first_name = mysqli_real_escape_string($conn, $_REQUEST['authorfn']);
                $last_name = mysqli_real_escape_string($conn, $_REQUEST['authorln']);
                $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
                $isbn = mysqli_real_escape_string($conn, $_REQUEST['isbn']);
                $genre = mysqli_real_escape_string($conn, $_REQUEST['genre']);
                $comments = mysqli_real_escape_string($conn, $_REQUEST['comments']);
                /*
                $dupesql = "SELECT * FROM author WHERE( 
                  FirstName LIKE '%$first_name%'
                  AND LastName LIKE '%$last_name%'
                )";

                if ($conn->query($dupesql) > 0) {

                }
                elseif ($conn->query($dupesql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }else
                 {*/
                 // $sql = "INSERT INTO author (FirstName, LastName) VALUES ( '$first_name', '$last_name')";
                //}

                $sql = "INSERT INTO books (Isbn, Title, Genre, Comments, FirstName, LastName) 
                VALUES ('$isbn', '$title', '$genre', '$comments', '$first_name', '$last_name')";

               // $sql = "SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
                //        FROM Orders
                 //       INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;";

                if ($conn->query($sql) === TRUE) {
                    echo $conn->affected_rows . " Book added to database";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }$conn->close();




            }





            ?>

        </p>
    </div>

</body>
</html>


