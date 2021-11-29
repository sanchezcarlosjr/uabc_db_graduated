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
            margin: 0 0 1em 0;
        }
    </style>
</head>
<body>
<section class="hero  is-small is-info is-bold">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                UABC Posgrados
            </h1>
        </div>
    </div>
</section>
<section class="section">
    <div class="container toolbox">
        <a href="/" class="button is-light">Regresar</a>
    </div>
    <form method="post">
        <?php $canBeUpdate = isset($_SESSION['values']); ?>
        <?php foreach ($_SESSION['fields'] as $field): ?>
            <div class="field">
                <label class="label"><?= $field; ?></label>
                <div class="control">
                    <input
                            name="<?= $field; ?>"
                            class="input"
                            value="<?= $canBeUpdate ? $_SESSION['values'][$field] : "1"; ?>"
                            type="text">
                </div>
            </div>
        <?php endforeach; ?>
        <div class="control">
            <button
                    class="button is-primary"
                    name="<?= $canBeUpdate ? "UPDATE" : "CREATE"; ?>">
                <?= $canBeUpdate ? "Actualizar" : "Crear"; ?>
            </button>
        </div>
    </form>
</section>
</body>
</html>