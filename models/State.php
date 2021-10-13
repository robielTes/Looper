<?php

require 'Model.php';

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
        return $res = DB::selectMany("SELECT * FROM `states`", []);
    }

    static public function create(array $fields):State
    {
        $state = new State($fields['name']);
        $state->store();
        return $state;
    }

    public function store(): bool
    {
        if(isset($this->name )){
            $res = DB::insert('INSERT INTO `states` (name) VALUES (:name )',
                ["name" => $this->name]);
            return true;
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::create(DB::selectOne("SELECT * FROM `states` where id = :id", ["id" => $id]));
    }

    static public function edit( $id,array $fields)
    {
        self::$id = $id;
        return new State($fields['title'],$fields['states_id']);
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE `states` SET name = : name WHERE id :id',
            ["name" => $this->name,"id" => $this->id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM `states` WHERE id :id', ["id" => $id]);
    }
}