<?php
namespace App\Models;

require_once __DIR__ .'/DB.php';

class Exercise
{

    public $id;
    public $title;
    public $states_id;

    public function __construct($id = null, $title = null, $states_id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->states_id = $states_id;
    }

    static public function make($fields) :Exercise
    {
        if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `exercises` order by id desc limit 1", []);
            return new Exercise($res[0]->id,$fields['title'], $fields['states_id']);
        }
        return new Exercise($fields->id,$fields->title, $fields->states_id);
    }

    public function create() :bool
    {
        try {
            if (isset($this->title) && isset($this->states_id)) {
                DB::insert('INSERT INTO `exercises` (title,states_id) VALUES (:title,:states_id)',
                    ["title" => $this->title, "states_id" => $this->states_id]);
                return true;
            }
        } catch (PDOException $e){
             //echo $e->getMessage();
            return false;
        }

    }

    static public function find($id): null|Exercise
    {
        $select = DB::selectOne("SELECT * FROM `exercises` where id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }

    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `exercises`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `exercises` SET ";
                if($this->title != null){
                    $sql .= " `title` = :title,";
                }
                if($this->states_id != null){
                    $sql .= " `states_id` = :states_id,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute( $sql,
                    ["id" => $this->id, "title" => $this->title, "states_id" => $this->states_id]);
                return true;
            }
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete():bool
    {
        return self::destroy($this->id);
    }

    static public function destroy($id):bool
    {
        try {
            DB::execute(' DELETE FROM `exercises` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }
}