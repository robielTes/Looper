<?php
namespace App\Models;
use App\Models;
use filu\maw_orm\Model;

class Line extends Model
{
    static protected string $table = "`lines`";
    protected string $primaryKey = "id";
    public int $id;
    public string $kind;
}