<?php
namespace model;

class Graduate extends Model
{
    protected string $table = "posgrados";
    protected array $fillables = ['*'];
    protected string $primary_key = "id_posgrado";
}