<?php
require_once "scripts/session.php";
include_once "scripts/checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        nav a.nav-link {
            color: #fff !important;
        }
        .custom-navbar {
        background-color: #14314D; 
        }
        .welcome-text {
        color: #ffffff; /* White color */
        }
        .search-button {
        background-color: #CC7139 !important;
        color:#CC7139;
        }

    </style>
    <title>Home Services</title>
</head>
<body>


<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <!-- Left-aligned links -->
        <div class="d-flex align-items-center">
            <!-- Other links -->
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="index.php">
                    <img class="nav-link mr-3" src="images\logowhite.png" alt="" width="200px" height="50px">
                </a>
                <a class="nav-link mr-3" class="nav-link" href="index.php">Home</a>
                <a class="nav-link mr-3" class="nav-link" href="services.php">Services</a>
                <a class="nav-link" href="contact.php">Contact</a>
            <?php elseif ((isset($_SESSION['user']['name']) && $_SESSION['user']['name'] == 'admin')or (isset($_SESSION['user']['name']) && $_SESSION['user']['name'] == 'Admin')) : ?>
                <a href="index.php">
                    <img class="nav-link mr-3" src="images\logowhite.png" alt="" width="200px" height="50px">
                </a>
                <a class="nav-link mr-3" class="nav-link" href="managehall.php">Manage Providers</a>
                <a class="nav-link mr-3" class="nav-link" href="admin.php">Manage Booking</a>

            <?php else: ?>

                <a href="index.php">
                    <img class="nav-link mr-3" src="images\logowhite.png" alt="" width="200px" height="50px">
                </a>
                <a class="nav-link mr-3" class="nav-link" href="index.php">Home</a>
                <a class="nav-link mr-3" class="nav-link" href="services.php">Services</a>
                <a class="nav-link mr-3" class="nav-link" href="contact.php">Contact</a>
            <?php endif; ?>
        </div>

        <div class="ms-auto d-flex align-items-center">
    <!-- Search form -->
    <div class="mr-3">
        <form class="d-flex" action="" method="GET">
            <input class="form-control me-2" type="search" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search data">
            <button class="btn btn-outline-success" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l.099.1 3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>
    <?php if (!isset($_SESSION['user'])): ?>
        <div class="d-flex">
            <a class="nav-link mr-3" href="login.php">Login</a>
            <a class="nav-link mr-3" href="register.php">Register</a>
        </div>
    <?php else: ?>
        <span class=" mr-3 welcome-text" class="nav-link">Welcome, <?php echo $_SESSION['user']['name']; ?></span>
        <a class="nav-link" href="logout.php">Log Out</a>
    <?php endif; ?>
    </div>

    </div>
</nav>




<div class="container">
    <?php
    // Check if the search parameter is set
    if(isset($_GET['search'])) {
        // Connect to the database
        $con = mysqli_connect("localhost","root","","services");

        // Sanitize the search input
        $filtervalues = mysqli_real_escape_string($con, $_GET['search']);

        // Perform the search query
        $query = "SELECT * FROM providers WHERE CONCAT( name,photo,descr,profession) LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($con, $query);

        // Check if there are any results
        if(mysqli_num_rows($query_run) > 0) {
            // Display the table if there are results
            ?>

            <div class="card1 mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Description</th>
                            
                            <th>Profession</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($query_run as $items) : ?>
                            <tr>
                                <td><?= $items['name']; ?></td>
                                <td><img style='height:150px' src='images/<?= $items['photo']; ?>' /></td>
                                <td><?= $items['descr']; ?></td>
                                <td><?= $items['profession']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            
            <?php
        } else {
            // Display a message if no results are found
            ?>
            <div class="alert alert-warning mt-4" role="alert">
                No records found.
            </div>
            <?php
        }
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
