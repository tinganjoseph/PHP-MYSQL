<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Response</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div class="container">
        <div class="form-box box">
            <?php
          

            include "connection.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $location = $_POST['location'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                // SQL query to insert data into the requestform table
                $query = "INSERT INTO requestform (name, email, location, subject, message) VALUES ('$name', '$email', '$location', '$subject', '$message')";

               

                // Execute the query
                $result = mysqli_query($conn, $query);

                // Check for SQL errors
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Check if the query was successful
                if ($result) {
                    echo "<div class='message'>
        <p>Message sent successfully ✨</p>
        </div><br>";
                    echo "<a href='home.php'><button class='btn'>Go Back</button></a>";
                } else {
                    echo "<div class='message'>
        <p>Message sending fail 😔</p>
        </div><br>";
                    echo "<a href='home.php'><button class='btn'>Go Back</button></a>";
                }
            }
            ?>

        </div>
    </div>
</body>

</html>
