<?php

use support\Route;
use function support\view;

Route::get("/", function () {
    view("home", ['x' => 'ABC']);
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});