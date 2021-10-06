<?php

class State extends Model
{
    public $id;
    public $name;

    private $db;

    function __construct()
    {

        $pdo = new DB();

        $this->db = $pdo->connection();

        if($this->id === null){
            $this->id = 1;
        }

    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create($title)
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($state, $id)
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}