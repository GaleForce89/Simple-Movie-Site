<html>
<head>
  <title>Query All Movies from Database</title>
  <link rel="stylesheet" type="text/css" href="siteStyle.css">
<body>

  <!--Menu-->
  <nav class="navbar">
    <a href="index.html"><img src="Home.png" width="24" height="16">Home</a>
    <a class="active" href="all_movies.php">Movies Database</a>
    <a href="insert_form.html">Movie submission form</a>
    <a href="insert_book.html">Book submission form</a>
    <a href="books_author.php">Books by Author</a>
    <a href="books_isbn.php">Books by Isbn</a>
    <a href="books_remove.php">Book removal</a>
  </nav>
  <div class="main">
    <div class="whitebackground">

    <h1>Automated query of movies database</h1>
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
    FROM `movie` 
SQL;
    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }

    echo '<div class = "bottomborder"><strong>Number of movies found: ' . $result->num_rows . '</strong></div></div>';

    while($row = $result->fetch_assoc()){
      echo '<p>';
        echo $row['movieid'] . '<br />';
        echo $row['title'] . '<br />';
        echo $row['directorid'] . '<br />';
        echo $row['year'] . '<br />';
        echo $row['genre'] . '<br />';
        echo $row['runtime'] . '<br />';
        echo $row['plotdescription'] . '<br />';
        echo $row['comments'] . '<br />';
        echo '</p>';
    }

    ?>
  </div>
</body>
</html>