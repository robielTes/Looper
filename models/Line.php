<?php

require 'models/Model.php';
require 'models/DB.php';

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
        return $res = DB::selectMany("SELECT * FROM lines", []);
    }

    static public function create(array $fields):Line
    {
        return new Line($fields['kind']);
    }

    public function store(): bool
    {
        if(isset($this->kind )){
            $res = DB::insert('INSERT INTO lines (kind) VALUES (:kind)',
                ["kind" => $this->kind]);
            self::$id= $res;
            return isset(self::$id);
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::make(DB::selectOne("SELECT * FROM lines where id = :id", ["id" => $id]));
    }

    static public function edit(array $fields, $id)
    {
        self::$id = $id;
        return new Line($fields['title'],$fields['states_id']);
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE lines SET kind = : kind WHERE id :id',
            ["kind" => $this->kind,"id" => self::$id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM lines WHERE id :id', ["id" => $id]);
    }
}