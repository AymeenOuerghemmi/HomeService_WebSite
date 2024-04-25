<?php

include_once "./include/header.php";
include_once "scripts/DB.php";
include_once "msg/register.php";

// Fetch services from the database
$services = DB::getServices();

// Fetch cities from the database
$cities = DB::getCities();
?>

<div class="container" style="margin-top: 30px; max-width: 800px;margin-bottom: 60px;">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">Register</h3>
            </div>
            <hr>

            <form action="scripts/register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input id="mail" name="mail" type="text" class="form-control" placeholder="E_mail" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input id="contact" name="contact" type="text" class="form-control" placeholder="Contact" minlength="8"
                           maxlength="12" required>
                </div>

                <div class="form-group">
                    <label for="adder1">Address</label>
                    <input id="adder1" name="adder1" type="text" class="form-control" placeholder="Enter Address line"
                           required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input id="age" name="age" type="text" class="form-control" placeholder="Enter your age"
                           required>
                </div>


                <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city" id="city">
                        <option value="none">-- Select City --</option>
                        <?php foreach ($cities as $city) : ?>
                            <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control"
                           placeholder="Enter 6 Character Password" minlength="6" required>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="service_provider" name="service_provider">
                    <label class="form-check-label" for="service_provider">
                        Register as Service Provider
                    </label>
                </div>

                <div id="service_provider_fields" style="display: none;">
                    <div class="form-group">
                        <label for="photo">Photo(Square Size)</label>
                        <input id="photo" name="photo[]" type="file" class="form-control-file"
                               accept="image/*" multiple >
                        <small class="form-text text-muted">Select 1 to 10 images. Allowed formats: JPG, JPEG, PNG, GIF, SVG.</small>
                    </div>

                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <select class="form-control" name="profession" id="profession">
                            <option value="none">Select Service</option>
                            <?php foreach ($services as $service) : ?>
                                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="salary">Salary/h</label>
                        <input name="salary" id="salary" class="form-control" cols="30" rows="5"
                                  placeholder="salary/h" ></input>
                    </div>

                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <input name="experience" id="experience" class="form-control" cols="30" rows="5"
                                  placeholder=" Your experience" ></input>
                    </div>



                    <div class="form-group">
                        <label for="descr">Add Description</label>
                        <textarea name="descr" id="descr" class="form-control" cols="30" rows="5"
                                  placeholder="Tell something about you..." ></textarea>
                    </div>
                </div>

                <button style="margin-top: 30px;" class="btn btn-block btn-primary" type="submit" name="register"
                        id="register">Register</button>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('service_provider').addEventListener('change', function () {
        var fields = document.getElementById('service_provider_fields');
        if (this.checked) {
            fields.style.display = 'block';
        } else {
            fields.style.display = 'none';
        }
    });
</script>

<?php include_once "./include/footer.php"; ?>
