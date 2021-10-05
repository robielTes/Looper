<?php

require 'models/Model.php';
require 'models/DB.php';

class State extends Model
{

    public static $id;
    public $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    static public function index(): array
    {
        return $res = DB::selectMany("SELECT * FROM states", []);
    }

    static public function create(array $fields):State
    {
        return new State($fields['name']);
    }

    public function store(): bool
    {
        if(isset($this->name )){
            $res = DB::insert('INSERT INTO states (name) VALUES (:name )',
                ["name" => $this->name]);
            self::$id = $res;
            return isset(self::$id);
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::make(DB::selectOne("SELECT * FROM states where id = :id", ["id" => $id]));
    }

    static public function edit(array $fields, $id)
    {
        self::$id = $id;
        return new State($fields['title'],$fields['states_id']);
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE states SET name = : name WHERE id :id',
            ["name" => $this->name,"id" => $this->id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM states WHERE id :id', ["id" => $id]);
    }
}