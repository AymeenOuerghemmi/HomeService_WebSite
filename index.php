<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        section{}
        nav a.nav-link {
            color: #fff !important;
        }
        .services-dropdown {
            position: relative;
        }
        .services-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
        }
        .services-dropdown:hover .services-dropdown-content {
            display: block;
        }
        .services-dropdown-content a {
            color: black;
            padding: 5px 10px;
            text-decoration: none;
            display: block;
        }
        .services-dropdown-content a:hover {
            background-color: #ddd;
        }

        .centered-div {
            display: inline-block; /* Make the div inline to center horizontally */
            background-color: #ffffff;
            padding: 20px;
        }

        .card{
            transition: all 0.3s;
        }
        .card:hover{
            transform: scale(1.15);
        }
        .card-title:hover{
            color: orange ;
        }


    </style>
    <title>Home Services</title>
</head>

<section></section>
<body>
<?php include_once "./include/header.php"; ?>
<?php include_once "scripts/DB.php"; ?>

<?php
// Fetch services from the database
$services = DB::getServices();

// Fetch cities from the database
$cities = DB::getCities();


?>

<br><br>
<div class="container" style="margin-top:20px; margin-bottom: 60px;">
    <div class="row">
        <div class="form-group col-5">
            <label for="">City</label>
            <select class="form-control" name="city" id="city">
                <option value="none">-- Select City --</option>
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-5">
            <label for="">Who's Required</label>
            <select class="form-control" name="profession" id="profession">
                <option value="none">Select Profession</option>
                <?php foreach ($services as $service) : ?>
                    <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-2">
            <label for="">Action</label>
            <button id="search" class="form-control btn btn-success" type="button" onclick="openPopup()">Search</button>
        </div>
    </div>
                </br></br>
    <!-- Popup container -->
<div id="popup" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <!-- Table content -->
    <div class="table-responsive">
      <table id="providers" class="table">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Profession</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan='6'>Select city and profession..</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- CSS for the popup -->
<style>
/* Popup Styling */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Popup Content Styling */
.modal-content {
  background-color: #fefefe;
  margin: 10% auto; /* 10% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Adjust width as needed */
}

/* Close Button Styling */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
}
</style>

<!-- JavaScript to control the popup -->
<script>
// Function to open the popup
function openPopup() {
  document.getElementById("popup").style.display = "block";
}

// Function to close the popup
function closePopup() {
  document.getElementById("popup").style.display = "none";
}
</script>
</div>



<div class="container">
    <h2 style="text-align: center;">Most requested services</h2>
    <br><br>
    <div class="row gy-3">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/electrician.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Electrical</h5>
                    <p class="card-text">Expert electrical services available on demand, providing swift solutions for your home's needs</p>
                    <a href="services.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/plumbing.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Plumbing</h5>
                    <p class="card-text">Seamless plumbing solutions at your service: Professional plumbers ready to tackle any issue</p>
                    <a href="services.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/cleaning.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cleaning</h5>
                    <p class="card-text">Effortless home cleaning with our service: Professional cleaners at your fingertips, ensuring a spotless space</p>
                    <a href="services.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>






<script src="js/jquery.js"></script>
<script>
    $(function() {
        $("#search").click(function() {
            var city = $("#city").val();
            var profession = $("#profession").val();

            if (city == "none" || profession == "none") {
                alert("Don't leave fields empty!");
                tbody = "<tr><td colspan='5'>please </td></tr>";
            } else {
                $.post('scripts/searchproviders.php', {
                    city: city,
                    profession: profession
                }, function(res) {
                    var providers = JSON.parse(res);
                    var tbody = "";

                    if (providers.failed == true) {
                        tbody = "<tr><td colspan='5'>No Service Providers found...</td></tr>";
                    } else {
                        providers.forEach(function(provider, i) {
                            tbody += "<tr>" +
                                "<td><img style='height:150px' src='images/" + provider.photo + "'/></td>" +
                                "<td>" + provider.name + "</td>" +
                                "<td>" + provider.adder1 +  ",<br>" + provider.city_name + "</td>" +
                                "<td>" + provider.salary + "</td>" +
                                "<td>" + provider.profession_name + "</td>" +
                                "<td><a href='booking.php?provider=" + provider.id + "' class='btn btn-primary btn-block'>Book</a></td>";
                        });
                    }

                    $("#providers tbody").html(tbody);
                });
            }
        });
    });
</script>

<?php include_once "./include/footer.php"; ?>
</body>
</html>
