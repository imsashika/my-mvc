<?php

class User extends Controller{

  public function index($name = '', $work =''){

    $user = $this ->  model('User');
    $user -> name = $name . 'Darshana Chandrasena';
    $user -> work = $work . 'of the YAKA network';

    $this->view ('home/index' , []);
    
  }


}
