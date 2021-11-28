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
<section class="section">
    <div class='container has-text-centered'>
        <div class='columns is-mobile is-centered'>
            <table class='table'>
                <thead>
                <tr>
                    <?php foreach ($_SESSION['fields'] as $row_key): ?>
                        <th><?= $row_key; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['data'] as $row_key => $row): ?>
                        <tr>
                            <?php foreach ($row as $column_key => $cell): ?>
                                <td><?= $cell; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>