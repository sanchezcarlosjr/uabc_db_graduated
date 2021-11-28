<?php

use support\Route;
use model\Graduate;
use function support\view;

Route::get("/", function () {
    view("home", Graduate::list());
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});