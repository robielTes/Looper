<?php

namespace App\Models;

use filu\maw_orm\Model;

class State extends Model
{
    protected static string $table = "states";
    protected string $primaryKey = "id";
    public int $id;
    public int $name;
}
