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
    $graduate = Graduate::find($_GET['id']);
    if (empty($graduate)) {
        header('LOCATION: /');
        die;
    }
    view('posgrado', [
        'fields' => Graduate::allColumns(),
        'values' => $graduate[0]
    ]);
});

Route::update("/editar", function (string $id) {
    unset($_POST['UPDATE']);
    Graduate::update($id, $_POST);
    header('LOCATION: /');
    die;
});

Route::get("/phpinfo", function () {
    view("phpinfo");
});

Route::get("/test_db_pdo", function () {
    view("test_db_pdo");
});


Route::get("/posgrados-por-campus", function () {
    $sql = "SELECT Y.* FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado WHERE campus = :campus";
    view("test", DB::raw($sql)->getWithColumns(array(':campus' => $_GET['campus'] ?? "")));
});

Route::get("/posgrados-por-unidad-academica", function () {
    $sql = "SELECT Y.* FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado WHERE id_unidad_academica = :nunidad";
    view("test", DB::raw($sql)->getWithColumns(array(':nunidad' => $_GET['nunidad'] ?? "")));
});

Route::get("/materias-por-posgrado", function () {
    $sql = "SELECT X.* FROM alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = Y.id_linea_de_investigacion WHERE Y.id_posgrado = :id_posgrado";
    view("test", DB::raw($sql)->getWithColumns(array(':id_posgrado' => $_GET['posgrado'] ?? "")));
});

Route::get("/alumnos-por-posgrado", function () {
    $sql = "SELECT X.* FROM alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = Y.id_linea_de_investigacion WHERE Y.id_posgrado = :id_posgrado";
    view("test", DB::raw($sql)->getWithColumns(array(':id_posgrado' => $_GET['posgrado'] ?? "")));
});

Route::get("/genero-por-posgrado", function () {
    $sql = "SELECT genero, count(*) as cantidad FROM alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = Y.id_linea_de_investigacion WHERE Y.id_posgrado = :id_posgrado GROUP BY genero";
    view("test", DB::raw($sql)->getWithColumns(array(':id_posgrado' => $_GET['posgrado'] ?? "")));
});

Route::get("/posgrado-por-area-del-conocimiento", function () {
    $sql = "SELECT * FROM posgrados WHERE id_area_del_conocimiento = :narea";
    view("test", DB::raw($sql)->getWithColumns(array(':narea' => $_GET['narea'] ?? "")));
});

Route::get("/alumnos_por_linea_de_investigacion", function () {
    $sql = "SELECT CONCAT(a.nombre + ' ' + a.apaterno + ' ' + a.amaterno) AS Nombre FROM alumnos a WHERE id_linea_de_investigacion = :nlinea";
    view("test", DB::raw($sql)->getWithColumns(array(':nlinea' => $_GET['nlinea'] ?? "")));
});

Route::get("/alumnos_de_ciencias_naturales_y_exactas", function () {
    $sql = "SELECT CONCAT(X.nombre + ' ' + X.apaterno + ' ' + X.amaterno) AS Nombre FROM  alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = X.id_linea_de_investigacion INNER JOIN posgrados P ON P.id_posgrado = Y.id_posgrado INNER JOIN areas_del_conocimiento A ON P.id_area_del_conocimiento = A.id_area_del_conocimiento WHERE A.area='CIENCIAS NATURALES Y EXACTAS'";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/test", function () {
    $sql = "SELECT Y.id_posgrado FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado WHERE campus = :campus";
    view("test", DB::raw($sql)->getWithColumns(array(':campus' => 150)));
});