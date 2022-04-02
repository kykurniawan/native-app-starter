<?php

use App\App;

require_once("./vendor/autoload.php");

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    App::user()->createUser($name, $email, $age);

    header('location:index.php');
}
