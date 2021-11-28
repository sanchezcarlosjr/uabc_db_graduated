<?php

use model\Graduate;
use support\Route;
use function support\transformToTable;
use function support\view;

Route::get("/", function () {
    view("home", transformToTable(Graduate::all()));
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});

Route::get("/test_db_pdo", function () {
    view("test_db_pdo");
});

Route::get("/test", function () {
    view("test", transformToTable(Graduate::all()));
});