<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UABC Ver consulta</title>
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
        <div class="container has-text-centered">
            <h1 class="title">
                UABC Prueba de Consulta
            </h1>
        </div>
    </div>
</section>
<section class="section">
    <?php include_once 'table.php'; ?>
</section>
</body>
</html>