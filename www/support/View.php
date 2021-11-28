<?php

namespace support;

use JetBrains\PhpStorm\ArrayShape;

function view(string $path, array $params = null)
{
    createNewSession($params);
    Route::getInstance()->redirect_to_views($path);
}

/**
 * @param array|null $params
 */
function createNewSession(array $params = null): void
{
    session_destroy();
    if (!isset($params) || empty($params)) {
        return;
    }
    foreach ($params as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

#[ArrayShape(['fields' => "int[]|string[]", 'data' => "array"])] function transformToTable(array $params)
{
    return [
        'fields' => array_keys($params[0]),
        'data' => $params
    ];
}