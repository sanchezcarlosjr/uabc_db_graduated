<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UABC Posgrados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        .hero.is-info.is-bold {
            background-image: linear-gradient(141deg, #BC4D20 0,#3e8ed0 71%,#4d83db 100%);
        }
    </style>
</head>
<body>
<section class="hero is-medium is-info is-bold">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                UABC Posgrados
            </h1>
            <h2 class="subtitle">
                Your local development environment
            </h2>
        </div>
    </div>
</section>
<section class="section">
    <div class="box">
        I'm in a box.
    </div>
    <div class="container">
        <div class="columns">
            <div class="column">
                <h3 class="title is-3 has-text-centered">Environment</h3>
                <hr>
                <div class="content">
                    <ul>
                        <li>
                            <?php
                            $link = mysqli_connect("database", "root", $_ENV['MYSQL_ROOT_PASSWORD'], null);

                            /* check connection */
                            if (mysqli_connect_errno()) {
                                printf("MySQL connecttion failed: %s", mysqli_connect_error());
                            } else {
                                /* print server version */
                                printf("MySQL Server %s", mysqli_get_server_info($link));
                            }
                            /* close connection */
                            mysqli_close($link);
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column">
                <h3 class="title is-3 has-text-centered">Quick Links</h3>
                <hr>
                <div class="content">
                    <ul>
                        <li><a href="phpinfo.php">phpinfo()</a></li>
                        <li><a href="http://localhost:<? print $_ENV['PMA_PORT']; ?>">phpMyAdmin</a></li>
                        <li><a href="test_db.php">Test DB Connection with mysqli</a></li>
                        <li><a href="test_db_pdo.php">Test DB Connection with PDO</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>