<?php
include_once "../support/Route.php";
include_once "../infraestructure/Database.php";

Route::get("/", function () {
    views("home");
});

Route::get("/phpinfo", function () {
    views("phpinfo");
});