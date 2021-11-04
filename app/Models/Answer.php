<?php
namespace App\Models;

require_once __DIR__ .'/DB.php';

class Answer
{

    public $id;
    public $take;
    private $answer;
    public $fields_id;

    public function __construct($id = null, $take = null, $answer = null, $fields_id = null)
    {
        $this->id = $id;
        $this->take = $take;
        $this->answer = $answer;
        $this->fields_id = $fields_id;
    }

    static public function make($fields) : Answer
    {
       if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `answers` order by id desc limit 1", []);
           return new Answer($res[0]->id,$fields['take'], $fields['answer'], $fields['fields_id']);
        }

        return new Answer($fields->id,$fields->take, $fields->answer, $fields->fields_id);
    }

    public function create() :bool
    {
        try {
            if (isset($this->take) && isset($this->answer) && isset($this->fields_id)) {
                DB::insert('INSERT INTO `answers` (take,answer,fields_id) VALUES (:take,:answer,:fields_id )', ["take" => $this->take, "answer" => $this->answer, "fields_id" => $this->fields_id]);
                return true;
            }
        } catch (PDOException $e){
           // echo $e->getMessage();
            return false;
        }
    }

    static public function find($id): null|Answer
    {
        $select = DB::selectOne("SELECT * FROM `answers` WHERE id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }


    static public function where($key, $value):array
    {
        $sql = "SELECT * FROM `answers` WHERE $key = :value;";
        return DB::selectMany($sql, ["value" => $value]);
    }


    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `answers`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `answers` SET ";
                if($this->take != null){
                    $sql .= " `take` = :take,";
                }
                if($this->answer!= null){
                    $sql .= " `answer` = :answer,";
                }
                if($this->fields_id  != null){
                    $sql .= " `fields_id` = :fields_id,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                 $res = DB::execute( $sql,
                    ["id" => $this->id, "take" => $this->take, "answer" => $this->answer, "fields_id" => $this->fields_id]);
                return true;
            }
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete(): bool
    {

        return self::destroy($this->id);
    }

    static public function destroy($id): bool
    {
        try {
             DB::execute(' DELETE FROM `answers` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }

    }

    public function teams()
    {

    }


}