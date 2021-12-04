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
<?php include_once 'navbar.php'; ?>
<?php if (isset($_SESSION['select'])): ?>
    <div class="select" style="margin: 0 0 0 10px">
        <select name="page" onchange="window.location=this.value">
            <?php foreach ($_SESSION['select'] as $row_key => $row): ?>
                <option value="<?= $row_key; ?>"><?= $row; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif ?>
<section class="section">
    <?php include_once 'table.php'; ?>
</section>
</body>
</html>