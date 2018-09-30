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
    $first_name = mysqli_real_escape_string($conn, $_REQUEST['directorfn']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['directorln']);
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $genre = mysqli_real_escape_string($conn, $_REQUEST['genre']);
    $runtime = mysqli_real_escape_string($conn, $_REQUEST['runtime']);
    $plot = mysqli_real_escape_string($conn, $_REQUEST['plot']);
    $comments = mysqli_real_escape_string($conn, $_REQUEST['comments']);

    $sql = "INSERT INTO director (firstname, lastname) VALUES ( '$first_name', '$last_name')";

    if ($conn->query($sql) === TRUE) {
        echo $conn->affected_rows . " Director added to database<br/>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "INSERT INTO movie (title, year, genre, runtime, plotdescription, comments) 
      VALUES ('$title', '$year', '$genre', '$runtime', '$plot', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo $conn->affected_rows . " Movie added to database";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();




}





?>

    </p>
  </div>

</body>
</html>


