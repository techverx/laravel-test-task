<?php


namespace App\Repositories;

interface IRepo{

    public function index();
    public function create();
    public function store($object);
    public function edit($id);
    public function update($id, $object);
    public function destroy($id);
}