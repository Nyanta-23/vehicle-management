<?php

class User extends Controller
{

  private
    $model = "Auth_Model";

  public function index()
  {

    $data['user'] = $this->model($this->model)->getAccountById($_SESSION['user']);

    $this->template('/User/index', $data);
  }
}
