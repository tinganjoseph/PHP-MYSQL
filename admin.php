<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

// Check if the form is submitted for updating the status
if(isset($_POST['update_status'])) {
    $id = $_POST['record_id'];

    // Update the status to "completed"
    $query = "UPDATE requestform SET status = 'completed' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Redirect to the same page to refresh the table
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/home.css">
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> WearView Academy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                     
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class='nav-link dropdown-toggle' href='edit.php?id=$res_id' id='dropdownMenuLink'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>
                                </a>


                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <?php

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                        }


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>Change Profile</a>";


                                        ?>

                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                <h1>WearView Academy</h1>
                    <p>WearView Academy is a secondary school situated in the North East of England, catering to the educational needs of students in the region. As a vital institution in the local community, WearView Academy plays a significant role in shaping the academic, personal, and social development of its students.
                    </p>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/hero-image.png" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section>




    <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>Submitted Forms</h1>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM requestform";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['location'] . "</td>";
                                    echo "<td>" . $row['subject'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>";
                                    // Button to update status
                                    echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
                                    echo "<input type='hidden' name='record_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' name='update_status' class='btn btn-success'> Completed</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No forms submitted yet</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>

    <!-- footer section  -->

    <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
            <h1>CONTACT INFO</h1>
            <p>Wear View Academy. North East</p>
            <p>of England WR2 5VO. United</p>
            <p>Kingdom</p>
            <h1>Phone:</h1>
            <p>+44 00 00000 0000</p>

            <h1>Email:</h1>
            <p>info@wearviewacademy.co.uk</p>
            
            <h1>Working Days/Hours:</h1>
            <p>Mon-Sun 9:00 AM - 8:00 PM</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h1>CUSTOMER SERVICE</h1>
                <p>Request IT Support</p>
                <p>About Us</p>
                <p>Contact Us</p>
                <p>My Account</p>

                <h1>Quick Links</h1>
                <p>Request History</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
                <p>Login</p>

            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">
                <h1>ABOUT US</h1>
                <p>About WearView Academy IT Support
                    We're dedicated to ensuring a seamless
                    IT experience for all Staff. Our team is
                    committed to resolving your technical issues
                    promptly and efficiently. Your success is our 
                    priority!
                </p>
            </div>
        </div>
    </div>
</footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
