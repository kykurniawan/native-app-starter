<?php

use App\App;

require_once("./vendor/autoload.php");

$user = App::user()->getUserById($_GET['id']);

if (!empty($_POST)) {
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->age = $_POST['age'];

    App::user()->updateUser($user);

    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Edit User</h4>
    <form method="post">
        <input type="text" name="name" id="name" value="<?= $user->name ?>">
        <input type="email" name="email" id="email" value="<?= $user->email ?>">
        <input type="number" min="1" name="age" id="age" value="<?= $user->age ?>">
        <button type="submit">Simpan</button>
    </form>
</body>

</html>