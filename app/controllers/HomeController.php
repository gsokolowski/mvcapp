<?php


class HomeController extends Controller
{
    // default method index that we call
    public function index($name = '', $nationality = '', $age = '') {

        echo '<br /><br />HOME COTROLLER<br /><br />';

        var_dump('Name <br />', $name);


        echo 'Home/index';
        echo $name.'<br />';
        echo $nationality.'<br />';
        echo $age.'<br />';



        // home/index in view is a path to view/home/index

//        $dupa = $this->model('Dupa');
//        $dupa->type = 'czarna';
//        $decision = $dupa->decision();
//
//        $this->view('home/index', [
//            'name' => $user->name,
//            'type' => $dupa->type,
//            'decision' => $decision,
//
//        ]);

    }


}