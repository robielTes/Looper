<?php
require 'DB.php';
class Exercise extends Model
{
    public $id;
    public $title;
    public $state;

    private $db;

    function __construct($db_conn)
    {
        $this->db = $db_conn;

        session_start();
    }


    public function index()
    {
        try {
            $query = $this->db->prepare("SELECT * FROM exercices");
            $query->execute();
            return $query->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function create($title,)
    {
        $this->title = $title;
        $this->store();

        //redirect
    }

    public function store()
    {
        try
        {
            $query = $this->db->prepare("INSERT INTO exercices(id, title, states_id) VALUES(:id, :title, :state)");
            $query->bindParam(":id", $this->id);
            $query->bindParam(":title", $this->title);
            $query->bindParam(":state", $this->state);
            $query->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function show($id)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM exercices WHERE id = :id");
            $query->bindParam(":id", $id);
            $query->execute();
            return $query->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function edit($state,$id)
    {
       $this->state = $state;
       $this->id = $id;
       $this->update();

       //redirect
    }

    public function update()
    {
        try
        {
            $query = $this->db->prepare("UPDATE exercices SET states_id = :state) WHERE (id = :id)");
            $query->bindParam(":id", $this->id);
            $query->bindParam(":state", $this->state);
            $query->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function destroy($id)
    {
        try
        {
            $query = $this->db->prepare("DELETE FROM exercices WHERE (id = :id)");
            $query->bindParam(":id", $this->id);
            $query->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}