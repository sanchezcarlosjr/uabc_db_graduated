<?php
include_once "../support/Route.php";

Route::get("/", function () {
    views("home");
});

Route::get("/phpinfo", function () {
    views("phpinfo");
});

Route::get("*", function () {
    views("404");
});