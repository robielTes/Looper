<?php
namespace App\Models;

require_once __DIR__ .'/DB.php';

class Line
{

    public $id;
    public $kind;

    public function __construct($id = null, $kind = null)
    {
        $this->id = $id;
        $this->kind = $kind;
    }

    static public function make($fields) :Line
    {
        if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `lines` order by id desc limit 1", []);
            return new Line($res[0]->id,$fields['kind']);
        }
        return new Line($fields->id,$fields->kind);
    }

    public function create() :bool
    {
        try {
            if (isset($this->kind)) {
                DB::insert('INSERT INTO `lines` (kind) VALUES (:kind)',
                    ["kind" => $this->kind]);
                return true;
            }
        } catch (PDOException $e){
            //echo $e->getMessage();
            return false;
        }

    }

    static public function find($id): null|Line
    {
        $select = DB::selectOne("SELECT * FROM `lines` where id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }

    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `lines`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `lines` SET ";
                if($this->kind != null){
                    $sql .= " `kind` = :kind,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute( $sql,
                    ["id" => $this->id, "kind" => $this->kind]);
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
            DB::execute(' DELETE FROM `lines` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }
}