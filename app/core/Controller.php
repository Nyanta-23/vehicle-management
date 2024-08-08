<?php

class Controller
{

  private
    $model = "Auth_Model";

  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }

  public function template($view, $data = [])
  {

    // if(!isset($_SESSION['user'])){
    //   Redirect::to("/Auth/signin");
    // }

    $this->header();
    $this->view($view, $data);
    $this->view('templates/footer');
  }

  public function header(){
    $data['role'] = isset($_SESSION['user']) ? $this->model($this->model)->getRoleById($_SESSION['user']) : "";

    $this->view('templates/header', $data);
  }
}
