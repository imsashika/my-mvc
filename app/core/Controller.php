<?php

class Controller {


  protected function model($model){

    require_once '../app/models/' . $model . '.php';

    return new $model();

  }

  public function view($view, $data = []){
    $hello = 'helloo thiyanw uda machan';
    require_once '../app/views/' . $view . '.php';
    //var_dump($data);

  }

}
