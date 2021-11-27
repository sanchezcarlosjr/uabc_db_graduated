<?php
namespace support;

function view(string $path)
{
    return Route::getInstance()->redirect_to_views($path);
}
