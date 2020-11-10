<?php

/**
 */
namespace App\Repositories;

use App\Models\Model;
use App\Providers\QueryBuilder;

//class UserRepository implements Repository
//{
//    private $model;
//    public function __construct(QueryBuilder $db)
//    {
//        $this->model = $db;
//        return $this;
//    }
//
//    public function all()
//    {
//        return $this->model->all();
//    }
//
//    public function create(array $data)
//    {
//        return $this->model->create();
//    }
//
//    public function show($id)
//    {
//        return $this->model->find();
//    }
//
//    public function update(array $data, $id)
//    {
//        return $this->model->update();
//    }
//
//    public function destroy($id)
//    {
//        return $this->model->destroy();
//    }
//}
//$model = new Model();
//$user = new UserRepository($model);
//$user = new UserRepository(new Model);