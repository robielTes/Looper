<?php

require 'Model.php';

class Line extends Model
{
    public static $id;
    public $kind;

    /**
     * @param $kind
     */
    public function __construct($kind)
    {
        $this->kind = $kind;
    }

    static public function index(): array
    {
        return $res = DB::selectMany("SELECT * FROM `lines`", []);
    }

    static public function create(array $fields):Line
    {
        $line = new Line($fields['kind']);
        $line->store();
        return $line;
    }

    public function store(): bool
    {
        if(isset($this->kind )){
            $res = DB::insert('INSERT INTO `lines` (kind) VALUES (:kind)',
                ["kind" => $this->kind]);
            return true;
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::create(DB::selectOne("SELECT * FROM `lines` where id = :id", ["id" => $id]));
    }

    static public function edit( $id,array $fields)
    {
        //TODO VERIFICATION IF THERE IS CHANGE AND WHICH COLUMNS
        self::$id = $id;
        $line = new Line($fields['kind']);
        $line->update();
        return $line;
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE `lines` SET kind = : kind WHERE id =:id',
            ["kind" => $this->kind,"id" => self::$id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM `lines` WHERE id = :id', ["id" => $id]);
    }
}