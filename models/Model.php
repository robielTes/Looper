<?php

abstract class Model
{
    abstract public function index();
    abstract public function create($title);
    abstract public function store();
    abstract public function show($id);
    abstract public function edit($state, $id);
    abstract public function update();
    abstract public function destroy($id);

}