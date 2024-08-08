<?php

class Request extends Controller
{

  private
    $request_model = 'Request_Model',
    $vehicle_model = 'Vehicle_Model',
    $auth_model = 'Auth_Model',
    $approval_model = 'Approval_Model';

  public function index()
  {
    $data['reservations'] = $this->model($this->request_model)->getAllByUser($_SESSION['user']);
    $data['approval'] = $this->model($this->approval_model)->getAll();

    $this->template('Request/index', $data);
  }

  public function add($id)
  {
    $data['vehicle'] = $this->model($this->vehicle_model)->getById($id);
    $data['user'] = $this->model($this->auth_model)->getAccountById($_SESSION['user']);
    $data['id'] = $id;

    if (isset($_POST['submit'])) {

      $post = array(
        'user_id' => $_SESSION['user'],
        'vehicle_id' => $id,
        'driver' => isset($_POST['self-driving']) ? $data['user']['name'] : $_POST['driver'],
      );

      if ($this->model($this->request_model)->add($post) > 0) {
        Flasher::setFlash('Data Kendaraan sukses ditambahkan', 'Sukses Membuat Data', 'success');
        Redirect::to('/Vehicle/list_vehicle');
        exit;
      } else {
        Flasher::setFlash('Data Kendaraan gagal ditambahkan', 'Gagal Membuat Data', 'danger');
        Redirect::to('/Vehicle/list_vehicle');
        exit;
      }
    }

    $this->template('Request/add', $data);
  }


  public function send($id)
  {
    if (isset($_POST['submit'])) {

      $post = array(
        'id' => $id,
        ...$_POST
      );
      
      if($this->model($this->request_model)->sendRequest($post) > 0){
        Flasher::setFlash('Pengajuan permintaan telah di kirim', 'Sukses Mengirim Permintaan', 'success');
        Redirect::to('/Request');
        exit;
      } else {
        Flasher::setFlash('Pengajuan permintaan gagal di kirim', 'Gagal Mengirim Permintaan', 'danger');
        Redirect::to('/Request');
        exit;
      }
      
    }
  }
}
