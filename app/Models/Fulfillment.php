<?php
namespace App\Models;
use App\Models;
use filu\maw_orm\Model;

class Fulfillment extends Model
{
    static protected string $table = "fulfillments";
    protected string $primaryKey = "id";
    public int $id;
    public string $take;
}