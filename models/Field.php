<?php

require 'Model.php';

class Field extends Model
{

    public static $id;
    public $label;
    public $lines_id;
    public $exercises_id;

    /**
     * @param $label
     * @param $lines_id
     * @param $exercises_id
     */
    public function __construct($label, $lines_id, $exercises_id)
    {
        $this->label = $label;
        $this->lines_id = $lines_id;
        $this->exercises_id = $exercises_id;
    }


    static public function index(): array
    {
        return $res = DB::selectMany("SELECT * FROM `fields`", []);
    }

    static public function create(array $fields):Field
    {
        $field = new Field($fields['label'],$fields['lines_id'],$fields['exercises_id']);
        $field->store();
        return $field;
    }

    public function store(): bool
    {
        if(isset($this->label )&& isset($this->lines_id) && isset($this->exercises_id)){
            $res = DB::insert('INSERT INTO `fields` (label,lines_id,exercises_id) VALUES (:name,:lines_id,:exercises_id )',
                ["label" => $this->label, "lines_id" => $this->lines_id,"exercises_id" =>$this->exercises_id]);
            return true;
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::create(DB::selectOne("SELECT * FROM `fields` where id = :id", ["id" => $id]));
    }

    static public function edit( $id,array $fields)
    {
        self::$id = $id;
        return new Field($fields['title'],$fields['states_id']);
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE `fields` SET label = : label ,lines_id = :lines_id, exercises_id = :exercises_id WHERE id :id',
            ["label" => $this->label, "lines_id" => $this->lines_id,"exercises_id" =>$this->exercises_id,"id" => self::$id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM `fields` WHERE id :id', ["id" => $id]);
    }
}