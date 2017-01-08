<?php

/**
 * The App Class
 *
 * This will split the url &
 *
 * Will look for the specific controller and method
 *
 * @author Sashika Chandrasena
 *
 */



class App{

  /**
   * Store the contoller part form the splited url @var string
   *
   */
  protected $controller = 'home';

  /**
   * Store the method part form the splited url @var string
   *
   */
  protected $method = 'index';

  /**
   * Store the parameter part form the splited url @var array
   *
   */

  protected $parameters = [];



  public function __construct(){

    $url = $this -> parseUrl();


    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      $this -> controller = $url[0];
      unset($url[0]);
    }

    require_once('../app/controllers/' . $this -> controller . '.php');

    $this -> controller = new $this -> controller;


    if (isset($url[1])){
      if (method_exists( $this -> controller , $url[1] ) ){
        $this -> method  = $url[1];
      }
    }

    $this -> parameters = $url ? array_values($url) : [] ;

    call_user_func_array([$this -> controller, $this -> method] , $this -> parameters );

    //var_dump($this -> controller);

  }



  public function parseUrl(){

    // Look for the existance of the url reqest

    if(isset($_GET['url'])){

      return $url = explode('/', filter_var(rtrim($_GET['url'] , '/'), FILTER_SANITIZE_URL));

    }

    // if the url does not exist any  can call for somethings 404 page or something, I'm just killig the page here . Do AF later.
    die();

  }

}
