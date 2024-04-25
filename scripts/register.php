<?php
require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['register'])) {
    $input = clean($_POST);

    $name = $input['name'];
    $last_name = $input['last_name'];
    $mail = $input['mail'];
    $contact = $input['contact'];
    $age = $input['age'];
    $salary = $input['salary'];
    $experience = $input['experience'];
    $adder1 = $input['adder1'];
    $age = $input['age'];
    $city = $input['city'];
    $password = $input['password'];

    // Check if the user is registering as a service provider
    $isServiceProvider = isset($input['service_provider']) && $input['service_provider'] === 'on';

    if ($isServiceProvider) {
        // Handle service provider registration
        $descr = $input['descr'];
        $profession = $input['profession'];
        $photo = $_FILES['photo'];
        $file1 = upload($photo);

        if ($file1 === false) {
            header('Location: ../register.php?msg=file');
            exit();
        }

        $isProviderCreated = DB::query("INSERT INTO providers (name, last_name,mail,contact, descr, adder1, age,salary, experience, city, password, photo, profession) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)", [
            $name, $last_name,$mail,$contact, $descr, $adder1, $age,$salary,$experience, $city, $password, $photo, $profession
        ]);


        if ($isProviderCreated) {
            header('Location: ../login.php'); // Redirect to the login page
            exit();
        } else {
            unlink('../images/' . $file1);
            header('Location: ../register.php?msg=failed');
            exit();
        }
    } else {
        // Handle regular user registration
        $isUserCreated = DB::query("INSERT INTO users VALUES (DEFAULT,?, ?, ?, ?, ?, ?, ?,?)", [
            $name,$last_name,$mail, $contact, $adder1, $age, $city, $password
        ]);

        if ($isUserCreated) {
            header('Location: ../login.php'); // Redirect to the login page
            exit();
        } else {
            header('Location: ../register.php?msg=failed');
            exit();
        }
    }
}
?>
