<?php
namespace App\Models;
use App\Models;
use filu\maw_orm\Model;
use filu\maw_orm\database\DB;

class Line extends Model
{
    static protected string $table = "`lines`";
    protected string $primaryKey = "id";
    public string $kind;
}