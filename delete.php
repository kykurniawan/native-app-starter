<?php

use App\App;

require_once("./vendor/autoload.php");

if (!empty($_POST)) {

    App::user()->deleteUser($_POST['id']);

    header('location:index.php');
}
