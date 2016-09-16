<?php



class Controller
{
    //protected $db;

    public function __construct() {

        //$this->db = $db;
        //var_dump('in base controller', $this->db);

    }

    public function model($model) {

        echo $model;
        // so UserController is calling model User so file models/User.php and class User will be loaded
        require_once '../app/models/' . $model . '.php';
        // and return object of requested model to controller which was calling it (UserController) at the first place e.g. UserController.php
        // return new $model($this->db);
        // object model User is created and returned to calling controller
        return new $model();

    }

    public function view($view, $data = []) {

        echo '<br />View is here: '.$view; //home/index
        require_once '../app/views/' . $view . '.php';
        // $data is automatically available in requested view because me passed it through to this view() method
    }
}