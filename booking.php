<?php include_once "./scripts/DB.php"; ?>

<?php
if (!isset($_GET['provider'])) {
    header('Location: index.php');
    exit();
}

$provider = DB::query("SELECT * FROM providers WHERE id=?", [$_GET['provider']])->fetch(PDO::FETCH_OBJ);
$providerName = $provider->name;

include_once "msg/booking.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Booking</title>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content2 {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
    </style>
</head>
<body>
<?php include_once "include/header.php"; ?>
<br>
<div class="row">
    <div class="col-md-12 text-center">
        <h1>Booking</h1>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5 p-3">
                <div class="card-body">
                    <h5 class="card-title">Provider Name: <?= htmlspecialchars($provider->name); ?></h5>
                    <h6 class="card-text">Profession: <?= htmlspecialchars($provider->profession); ?></h6>
                    <p class="card-text">Address: <?= htmlspecialchars($provider->adder1); ?></p>
                    <p class="card-text">City: <?= htmlspecialchars($provider->city); ?></p>
                    <p class="card-text">Experience: <?= htmlspecialchars($provider->experience); ?></p>
                    <p class="card-text">Salary: <?= htmlspecialchars($provider->salary); ?> DT/H</p>
                    <p class="card-text">Description: <?= htmlspecialchars($provider->descr); ?></p>
                    <!-- HTML code for the button and modal -->
                    <button class="btn btn-primary" type="button" name="book" id="book">Contact</button>

                    <div id="contactModal" class="modal">
                        <div class="modal-content2">
                            <span class="close">×</span>
                            <h3><?= $provider->name; ?> phone number :</h3>
                            <p><?= $provider->contact; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<!-- JavaScript code to handle the button click event and show the modal -->
<script>
    // Get the button element
    var btn = document.getElementById("book");

    // Get the modal element
    var modal = document.getElementById("contactModal");

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</html>

<?php include_once "include/footer.php"; ?>
