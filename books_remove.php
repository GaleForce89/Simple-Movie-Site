<html>
<head>
  <title>Select book to remove</title>
  <link rel="stylesheet" type="text/css" href="siteStyle.css">
</head>

<body>
  <!--Menu-->
  <nav class="navbar">
    <a href="index.html"><img src="Home.png" width="24" height="16">Home</a>
    <a href="all_movies.php">Movies Database</a>
    <a href="insert_form.html">Movie submission form</a>
    <a href="insert_book.html" >Book submission form</a>
    <a href="books_author.php">Books by Author</a>
    <a href="books_isbn.php">Books by Isbn</a>
    <a href="books_remove.php" class="active">Book removal</a>
  </nav>

  <div class="main">


    <div class="whitebackground">
      <div class="group">
        <section class="leftDB">
          <h1>Book removal</h1>
          Select book title to remove<br>
          <form action="remove_book.php" method="post">

            <table border=0>
              <tr><td>Book Title</td>
                <td>
                  <select name="title" required>
                    <option value=""></option>
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


                      $res = $conn->query("SELECT Title
                    FROM books
                    GROUP BY Title");

                      while($row = $res->fetch_assoc()){
                          echo '<option value = "' . $row['Title'] . '">' . $row['Title'] . '</option>';

                      }


                      ?>

                  </select>
                  <br></td></tr><td>
              <input type=submit value="Remove book"></td></tr>
            </table>

          </form>
        </section>

        <section class="right"><img src="books-441866_640.png" width="340" height="255"></section>

      </div>
    </div>
  </div>
</body>
</html>
