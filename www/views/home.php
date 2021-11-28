<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UABC Posgrados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        .hero.is-info.is-bold {
            background-image: linear-gradient(141deg, #00723F 0, #3e8ed0 71%, #4d83db 100%);
        }
    </style>
</head>
<body>
<section class="hero  is-small is-info is-bold">
    <div class="hero-body">
        <div class="conta iner has-text-centered">
            <h1 class="title">
                UABC Posgrados
            </h1>
        </div>
    </div>
</section>
<?php echo $_SESSION['x'] ?>
<section class="section">
    <div class='container has-text-centered'>
        <div class='columns is-mobile is-centered'>
            <table class='table'>
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone No.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>vilod565</td>
                    <td>vilod565@gmail.com</td>
                    <td>Male</td>
                    <td>Kolkata, West Bengal</td>
                    <td>9856435632</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>