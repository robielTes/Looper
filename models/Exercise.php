<?php

require 'Model.php';


class Exercise extends Model
{
    public $id;
    public $title;
    public $states_id;

    public function __construct($id, $title, $states_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->states_id = $states_id;
    }


    static public function index(): array
    {
        return $res = DB::selectMany("SELECT * FROM `exercises`", []);
    }

    static public function create(array $fields):Exercise
    {
        if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `exercises` order by id desc limit 1", []);
            new Member($res[0]->id,$fields['title'], $fields['title'], $fields['states_id']);
            return true;
        }

        return new Member($fields->id,$fields->title, $fields->title, $fields->states_id);
    }

    public function store(): bool
    {
        if(isset($this->title )&& isset($this->states_id)){
            $res = DB::insert('INSERT INTO `exercises` (title,states_id) VALUES (:title,:states_id )',
                ["title" => $this->title, "states_id" => $this->states_id]);
            return true;
        }
        return false;

    }

    static public function show($id)
    {
        $select = DB::selectOne("SELECT * FROM `exercises` where id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }

    static public function edit($id,array $fields):Exercise
    {
        //TODO VERIFICATION IF THERE IS CHANGE AND WHICH COLUMNS
        self::$id = $id;
        $exercise = new Exercise($fields['title'],$fields['states_id']);
        $exercise->update();
        return $exercise;

    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE `exercises` SET title = :title ,states_id = :states_id WHERE id = :id',
            ["title" => $this->title, "states_id" => $this->states_id,"id" => self::$id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM `exercises` WHERE id = :id', ["id" => $id]);
    }
}