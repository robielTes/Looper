<?php
namespace App\Models;

require_once __DIR__ .'/DB.php';

class Field
{

    public $id;
    public $label;
    private $lines_id;
    public $exercises_id;

    public function __construct($id = null, $label = null, $lines_id = null, $exercises_id = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->lines_id = $lines_id;
        $this->exercises_id = $exercises_id;
    }

    static public function make($fields) : Field
    {
       if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `fields` order by id desc limit 1", []);
           return new Field($res[0]->id,$fields['label'], $fields['lines_id'], $fields['exercises_id']);
        }

        return new Field($fields->id,$fields->label, $fields->lines_id, $fields->exercises_id);
    }

    public function create() :bool
    {
        try {
            if (isset($this->label) && isset($this->lines_id) && isset($this->exercises_id)) {
                DB::insert('INSERT INTO `fields` (label,lines_id,exercises_id) VALUES (:label,:lines_id,:exercises_id )', ["label" => $this->label, "lines_id" => $this->lines_id, "exercises_id" => $this->exercises_id]);
                return true;
            }
        } catch (PDOException $e){
           // echo $e->getMessage();
            return false;
        }
    }

    static public function find($id): null|Field
    {
        $select = DB::selectOne("SELECT * FROM `fields` WHERE id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }


    static public function where($key, $value):array
    {
        $sql = "SELECT * FROM `fields` WHERE $key = :value;";
        return DB::selectMany($sql, ["value" => $value]);
    }


    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `fields`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `fields` SET ";
                if($this->label != null){
                    $sql .= " `label` = :label,";
                }
                if($this->lines_id!= null){
                    $sql .= " `lines_id` = :lines_id,";
                }
                if($this->exercises_id  != null){
                    $sql .= " `exercises_id` = :exercises_id,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                 $res = DB::execute( $sql,
                    ["id" => $this->id, "label" => $this->label, "lines_id" => $this->lines_id, "exercises_id" => $this->exercises_id]);
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
             DB::execute(' DELETE FROM `fields` WHERE id = :id', ["id" => $id]);
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