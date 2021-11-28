<?php

use infrastructure\Database as DB;
use model\Graduate;
use support\Route;
use function support\view;

Route::get("/", function () {
    view("home", Graduate::allWithColumns());
});

Route::delete("/", function (string $id) {
    Graduate::destroy($id);
    header('LOCATION: /');
});

Route::get("/crear", function () {
    view('posgrado', [
        'fields' => Graduate::columnsNoPrimaryKey()
    ]);
});

Route::create("/crear", function () {
    unset($_POST['CREATE']);
    Graduate::create($_POST);
    header('LOCATION: /');
});

Route::get("/editar", function () {
    view('posgrado', [
        'fields' => Graduate::allColumns()
    ]);
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});

Route::get("/test_db_pdo", function () {
    view("test_db_pdo");
});

Route::get("/test", function () {
    $sql = "SELECT Y.id_posgrado FROM programas_de_posgrado X " .
        "INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado WHERE campus = :campus";
    view("test", DB::raw($sql)->getWithColumns(array(':campus' => 150)));
});