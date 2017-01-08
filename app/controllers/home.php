<?php

class Home extends Controller{

  public function index($name = ''){

    $user = $this ->  model('User');
    $user -> name = $name . ' Darshana Chandrasena';

    $this->view ('home/index' , ['name' => $user -> name]);
  }

  public function txt(){
    echo ' test function is fired';
  }

}
