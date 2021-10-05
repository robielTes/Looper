<?php

abstract class Model
{
    abstract static public function index():array; //all
    abstract static public function create(array $fields); //make
    abstract public function store():bool; //create
    abstract static public function show($id); //find
    abstract static public function edit(array $fields, $id); //~make
    abstract public function update():bool; //save
    abstract static public function destroy($id):bool; //destroy

}

