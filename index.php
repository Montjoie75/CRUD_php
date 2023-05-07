<?php

use App\Autoloader;
use App\PDO\Connexion;


require_once 'Autoloader.php';
Autoloader::register();

$sql = Connexion::connect();
var_dump($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<body>

    <div class="container mt-5">
        <div>
            <nav class="navbar sticky-top navbar-light bg-light">

                <div class="container-fluid ">
                    <div class="align-center">
                        <h5>Search for applications</h5>
                    </div>
                    <button class="btn btn-secondary dropdown-toggle m-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        Any Status
                    </button>
                    <input type="text" class="form-control col" placeholder="Enter address e.g. street, city and state or zip">

                    <button class="btn btn-secondary btn-block ms-2">Search</button>

                </div>
            </nav>
        </div>

        <table id="app-table" data-toggle="table" data-search=true data-pagination=true class="table-borderless text-center table-sm table-striped">
            <thead class='shadow' id='table-header'>
                <tr>
                    <th data-sortable=true>App ID</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Partner</th>
                    <th>Activated</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {

                    $avatar = rand(1, 22)
                ?>
                    <tr>
                        <td><?= $result['id'] ?></td>
                        <td>
                            <img src=" https://mdbootstrap.com/img/new/avatars/<?= $avatar ?>.jpg" alt="" style="width:45px; height:45px" class="rounded-circle" />
                        <td><span><?= $result['name'] ?></span></td>
                        <td><span id='partner'><?= $result['partner'] === 1 ? "yes" : "no" ?></span></td>
                        <td><?= $result['is_active'] === 1 ? "yes" : "no" ?></td>
                        <td><?= $result['creation_date'] ?></td>
                        <td><i class="bi-alarm"></i>
                    </tr>
                <?php } ?>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>
<script src=" https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
</body>

</html>

<script>
    let header = document.querySelector('#table-header');
    header.style.backgroundColor = "primary";

    let isPartner = document.querySelectorAll('#partner')
    console.log(isPartner)
    isPartner.forEach((item) => {
        console.log(item)
        item.textContent == "no" ? item.className = "is-not-partner" : item.className = "is-partner"

    })
</script>