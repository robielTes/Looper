<?php
namespace App\Models;
use App\Models;
use filu\maw_orm\Model;

class State extends Model
{
    static protected string $table = "states";
    protected string $primaryKey = "id";
    public int $name;
}

