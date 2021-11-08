<?php

namespace App\Models;
use App\Models;
use filu\maw_orm\Model;


class Exercise extends Model
{
    static protected string $table = "exercises";
    protected string $primaryKey = "id";
    public string $title;
    public int $states_id;
}