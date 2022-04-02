<?php

use App\App;

require_once("./vendor/autoload.php");

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
    <h4>Tambah User</h4>
    <form action="./add.php" method="post">
        <input type="text" name="name" id="name">
        <input type="email" name="email" id="email">
        <input type="number" min="1" name="age" id="age">
        <button type="submit">Simpan</button>
    </form>
    <hr>
    <h4>Daftar User</h4>
    <ol>
        <?php foreach (App::user()->getAllUser() as $user) : ?>
            <li>
                <ul>
                    <li>
                        <a href="./edit.php?id=<?= $user->id ?>">Edit</a>
                    </li>
                    <li><?= $user->name ?></li>
                    <li><?= $user->email ?></li>
                    <li><?= $user->age ?></li>
                    <li>
                        <form action="./delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </li>
                </ul>
            </li>
        <?php endforeach ?>
    </ol>
</body>

</html>