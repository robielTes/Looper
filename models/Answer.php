<?php

require 'models/Model.php';
require 'models/DB.php';

class Answer extends Model
{
    public static $id;
    public $take;
    public $answer;
    public $fields_id;

    /**
     * @param $take
     * @param $answer
     * @param $fields_id
     */
    public function __construct($take, $answer, $fields_id)
    {
        $this->take = $take;
        $this->answer = $answer;
        $this->fields_id = $fields_id;
    }


    static public function index(): array
    {
        return $res = DB::selectMany("SELECT * FROM answers", []);
    }

    static public function create(array $fields):Answer
    {
        return new Answer($fields['take'],$fields['answer'],$fields['fields_id']);
    }

    public function store(): bool
    {
        if(isset($this->take )&& isset($this->answer) && isset($this->fields_id)){
            $res = DB::insert('INSERT INTO answers (take,answer,fields_id) VALUES (:take,:answer,:fields_id )',
                ["take" => $this->take, "answer" => $this->answer,"fields_id" =>$this->fields_id]);
            self::$id = $res;
            return isset(self::$id);
        }
        return false;
    }

    static public function show($id)
    {
        return  $res = self::make(DB::selectOne("SELECT * FROM answers where id = :id", ["id" => $id]));
    }

    static public function edit(array $fields, $id)
    {
        self::$id = $id;
        return new Answer($fields['title'],$fields['states_id']);
    }

    public function update(): bool
    {
        return  $res = DB::execute(' UPDATE answers SET take = : take ,answer = :answer, fields_id = :fields_id WHERE id :id',
            ["take" => $this->take, "answer" => $this->answer,"fields_id" =>$this->fields_id,"id" =>self::$id]);
    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM answers WHERE id :id', ["id" => $id]);
    }
}