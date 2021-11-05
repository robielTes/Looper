<?php
namespace App\Models;

require_once __DIR__ .'/DB.php';

class State
{

    public $id;
    public $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    static public function make($fields) :State
    {
        if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `states` order by id desc limit 1", []);
            return new State($res[0]->id,$fields['name']);
        }
        return new State($fields->id,$fields->name);
    }

    public function create() :bool
    {
        try {
            if (isset($this->name)) {
                DB::insert('INSERT INTO `states` (name) VALUES (:name)',
                    ["name" => $this->name]);
                return true;
            }
        } catch (PDOException $e){
            //echo $e->getMessage();
            return false;
        }

    }

    static public function find($id): null|State
    {
        $select = DB::selectOne("SELECT * FROM `states` where id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }

    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `states`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `states` SET ";
                if($this->name != null){
                    $sql .= " `name` = :name,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute( $sql,
                    ["id" => $this->id, "name" => $this->name]);
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
            DB::execute(' DELETE FROM `states` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }
}