<?php

use model\Graduate;
use support\Route;
use function support\view;

Route::get("/", function () {
    view("home", [
        'fields' => Graduate::columns(),
        'data' => Graduate::all()
    ]);
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});

Route::get("/test_db_pdo", function () {
    view("test_db_pdo");
});

Route::get("/test", function () {
    view("test");
});