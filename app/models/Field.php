<?php

namespace App\Models;
use filu\maw_orm\Model;

class Field extends Model
{
    static protected string $table = "fields";
    protected string $primaryKey = "id";
    public string $label;
    public int $lines_id;
    public int $exercises_id;
}