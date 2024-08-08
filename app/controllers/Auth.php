<?php

class Auth extends Controller
{
  private
    $auth_model = "Auth_Model";

  public function index()
  {
    Redirect::to("/Auth/signin");
  }

  public function signin()
  {
    $this->view("Auth/signin");

    if (isset($_POST['submit'])) {

      Redirect::to("/Auth/signin");

      if (empty($_POST['email']) || empty($_POST['password'])) {
        Flasher::setFlash('Email atau Password anda masih kosong!', 'Gagal Masuk!', 'danger');
        exit;
      } else {
        $account = $this->model($this->auth_model)->signIn($_POST);
        if ($account) {
          $_SESSION['user'] = $account['id'];

          if (isset($_POST['rememmber'])) {
            $cookie = $account['email'] . $account['id'];

            setcookie('number', $account['id'], time() + 60, '/');
            setcookie('key', hash('sha256', $cookie), time() + 60, '/');
          }
          Redirect::to('/User');
          exit;
        } else {
          Flasher::setFlash('Email atau Password kamu salah!', 'Gagal Masuk!', 'danger');
          exit;
        }
      }
    }
  }

  public function signup()
  {
    $this->view("Auth/signup");


    if (isset($_POST["submit"])) {

      Redirect::to('/Auth/signup');

      if ($this->model($this->auth_model)->getAccountByEmail($_POST['email'])) {
        Flasher::setFlash('Email telah terpakai!, gunakan email yang baru.', 'Gagal Membuat Akun!', 'danger');
        exit;
      } else {
        if ($_POST['password'] != $_POST['confirm_password']) {
          Flasher::setFlash('Password tidak sama!', 'Gagal Membuat Akun!', 'danger');
          exit;
        } else if (!isset($_POST['password'])) {
          Flasher::setFlash('Password Harus Di isi!', 'Gagal Membuat Akun!', 'danger');
          exit;
        } else {
          $post = array(
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "name" => $_POST['name']
          );

          if ($this->model($this->auth_model)->signUp($post) > 0) {
            Flasher::setFlash('Selamat akun telah dibuat', 'Sukses Memabuat Akun!', 'success');
            exit;
          }
        }
      }
      exit;
    }
  }

  public function signout()
  {
    Session::stopSession();
    Redirect::to('/Auth/Sigin');
  }
}
