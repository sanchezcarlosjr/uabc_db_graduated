<?php

use infrastructure\Database as DB;
use model\Graduate;
use support\Route;
use function support\view;

Route::get("/", function () {
    $_SESSION['crud'] = true;
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

function where(string $key) {
    return isset($_GET[$key]) ? "WHERE $key = ".$_GET[$key] : "";
}
Route::get("/posgrados-por-campus", function () {
    $_SESSION['select'] = array(
        "/posgrados-por-campus/" => "Todos",
        "/posgrados-por-campus?campus=1" => "Ensenada",
        "/posgrados-por-campus?campus=2" => "Tijuana",
        "/posgrados-por-campus?campus=3" => "Mexicali",
    );
    $campus = where("campus");
    $sql = "SELECT Y.* FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado $campus;";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/posgrados-por-unidad-academica", function () {
    $_SESSION['select'] = array(
        "/posgrados-por-unidad-academica" => "Todos",
        "/posgrados-por-unidad-academica?id_unidad_academica=1" => "A",
        "/posgrados-por-unidad-academica?id_unidad_academica=2" => "B",
        "/posgrados-por-unidad-academica?id_unidad_academica=3" => "C",
    );
    $nunidad = where("id_unidad_academica");
    $sql = "SELECT id_unidad_academica,Y.* FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado $nunidad";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/materias-por-posgrado", function () {
    $_SESSION['select'] = array(
        "/materias-por-posgrado" => "Todos",
        "/materias-por-posgrado?id_posgrado=12040" => "MAESTRIA EN FISIOTERAPIA DEPORTIVA",
        "/materias-por-posgrado?id_posgrado=12050" => "MAESTRIA EN ADMINISTRACION DE NEGOCIOS",
        "/materias-por-posgrado?id_posgrado=12058" => "ESPECIALIDAD EN SEGURIDAD E HIGIENE INDUSTRIAL",
        "/materias-por-posgrado?id_posgrado=12098" => "MAESTRIA EN CALIDAD",
    );
    $where_id_posgrado = isset($_GET["id_posgrado"]) ? "WHERE id_posgrado = ".$_GET['id_posgrado'] : "";
    $sql = "SELECT Y.* FROM materias_posgrado X INNER JOIN materias Y ON Y.id_materia = X.id_materia $where_id_posgrado";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/alumnos-por-posgrado", function () {
    $_SESSION['select'] = array(
        "/alumnos-por-posgrado" => "Todos",
        "/alumnos-por-posgrado?id_posgrado=12040" => "MAESTRIA EN FISIOTERAPIA DEPORTIVA",
        "/alumnos-por-posgrado?id_posgrado=12050" => "MAESTRIA EN ADMINISTRACION DE NEGOCIOS",
        "/alumnos-por-posgrado?id_posgrado=12058" => "ESPECIALIDAD EN SEGURIDAD E HIGIENE INDUSTRIAL",
        "/alumnos-por-posgrado?id_posgrado=12098" => "MAESTRIA EN CALIDAD",
    );
    $where_id_posgrado = isset($_GET["id_posgrado"]) ? "WHERE Y.id_posgrado = ".$_GET['id_posgrado'] : "";
    $sql = "SELECT X.* FROM alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = Y.id_linea_de_investigacion $where_id_posgrado";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/genero-por-posgrado", function () {
    $_SESSION['select'] = array(
        "/genero-por-posgrado" => "Todos",
        "/genero-por-posgrado?id_posgrado=12040" => "MAESTRIA EN FISIOTERAPIA DEPORTIVA",
        "/genero-por-posgrado?id_posgrado=12050" => "MAESTRIA EN ADMINISTRACION DE NEGOCIOS",
        "/genero-por-posgrado?id_posgrado=12058" => "ESPECIALIDAD EN SEGURIDAD E HIGIENE INDUSTRIAL",
        "/genero-por-posgrado?id_posgrado=12098" => "MAESTRIA EN CALIDAD",
    );
    $where_id_posgrado = isset($_GET["id_posgrado"]) ? "WHERE Y.id_posgrado = ".$_GET['id_posgrado'] : "";
    $sql = "SELECT genero as Genero, count(*) as Cantidad FROM alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = Y.id_linea_de_investigacion $where_id_posgrado GROUP BY genero";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/posgrado-por-area-del-conocimiento", function () {
    $_SESSION['select'] = array(
        "/posgrado-por-area-del-conocimiento" => "Todos",
        "/posgrado-por-area-del-conocimiento?narea=1" => "D",
        "/posgrado-por-area-del-conocimiento?narea=2" => "CIENCIAS NATURALES Y EXACTAS",
        "/posgrado-por-area-del-conocimiento?narea=3" => "M",
        "/posgrado-por-area-del-conocimiento?narea=4" => "O",
        "/posgrado-por-area-del-conocimiento?narea=5" => "B"
    );
    $where_narea = isset($_GET["narea"]) ? "WHERE id_area_del_conocimiento = ".$_GET['narea'] : "";
    $sql = "SELECT * FROM posgrados $where_narea";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/alumnos_por_linea_de_investigacion", function () {
    $_SESSION['select'] = array(
        "/alumnos_por_linea_de_investigacion" => "Todos",
        "/alumnos_por_linea_de_investigacion?linea=10" => "Electricidad",
        "/alumnos_por_linea_de_investigacion?linea=11" => "Fisioterapia",
        "/alumnos_por_linea_de_investigacion?linea=12" => "Desarrollo de negocios",
    );
    $where_linea = isset($_GET["linea"]) ? "WHERE id_linea_de_investigacion = ".$_GET['linea'] : "";
    $sql = "SELECT CONCAT(a.nombre, \" \", a.apaterno, \" \", a.amaterno) AS Nombre FROM alumnos a $where_linea";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/alumnos_de_ciencias_naturales_y_exactas", function () {
    $sql = "SELECT area as Area,CONCAT(X.nombre, \" \", X.apaterno, \" \", X.amaterno) AS Nombre FROM  alumnos X INNER JOIN lineas_de_investigacion Y ON Y.id_linea_de_investigacion = X.id_linea_de_investigacion INNER JOIN posgrados P ON P.id_posgrado = Y.id_posgrado INNER JOIN areas_del_conocimiento A ON P.id_area_del_conocimiento = A.id_area_del_conocimiento WHERE A.area='CIENCIAS NATURALES Y EXACTAS'";
    view("test", DB::raw($sql)->getWithColumns());
});

Route::get("/test", function () {
    $sql = "SELECT Y.id_posgrado FROM programas_de_posgrado X INNER JOIN posgrados Y ON Y.id_posgrado = X.id_posgrado WHERE campus = :campus";
    view("test", DB::raw($sql)->getWithColumns(array(':campus' => 150)));
});