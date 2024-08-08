<?php

class Approval extends Controller
{

  private
    $approval_model = 'Approval_Model';

  public function index()
  {
    $data['approval'] = $this->model($this->approval_model)->getAll();

    $this->template("Approval/index", $data);
  }

  public function acceptRequestBy($id)
  {
    $level = $this->model($this->approval_model)->getById($id)['level'];

    $post = array(
      'user' => (string) $_SESSION['user'],
      'id' =>  $id,
      'level' => $level + 1
    );

    if ($this->model($this->approval_model)->acceptRequestBy($post) > 0) {
      Flasher::setFlash('Permintaan sukses di setujui', 'Sukses Mensetujui', 'success');
      Redirect::to('/Approval');
      exit;
    } else {
      Flasher::setFlash('Permintaan gagal di setujui', 'Gagal Mensetujui', 'danger');
      Redirect::to('/Approval');
      exit;
    }
  }

  public function rejectRequestBy($id)
  {
    $post = array(
      'user' => (string) $_SESSION['user'],
      'id' =>  $id,
      'is_rejected' => 1
    );

    if ($this->model($this->approval_model)->rejectRequestBy($post) > 0) {
      Flasher::setFlash('Permintaan sukses di setujui', 'Sukses Mensetujui', 'success');
      Redirect::to('/Approval');
      exit;
    } else {
      Flasher::setFlash('Permintaan gagal di setujui', 'Gagal Mensetujui', 'danger');
      Redirect::to('/Approval');
      exit;
    }
  }
}
