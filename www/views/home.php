<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UABC Posgrados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero.is-info.is-bold {
            background-image: linear-gradient(141deg, #00723F 0, #3e8ed0 71%, #4d83db 100%);
        }
        .toolbox {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-self: center;
            height: 3em;
        }
    </style>
</head>
<body>
<?php include_once 'navbar.php'; ?>
<section class="section">
    <div class="container toolbox">
        <a href="/crear" class="button is-light">Nuevo</a>
    </div>
    <?php include_once 'table.php'; ?>
</section>
</body>
</html>