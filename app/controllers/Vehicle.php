<?php

class Vehicle extends Controller
{

  private
    $vehicle_model = "Vehicle_Model";

  public function index()
  {

    $data["vehicles"] = $this->model($this->vehicle_model)->getAll();

    $this->template('Vehicle/index', $data);
  }

  public function add()
  {

    if (isset($_POST['submit'])) {

      Redirect::to("/Vehicle/add");

      $post = array(
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'amount' => $_POST['amount'],
        'owned_by' => $_POST['owned_by'],
      );

      if ($this->model($this->vehicle_model)->add($post) > 0) {
        Flasher::setFlash('Data Kendaraan sukses ditambahkan', 'Sukses Membuat Data', 'success');
        Redirect::to('/Vehicle');
        exit;
      } else {
        Flasher::setFlash('Data Kendaraan gagal ditambahkan', 'Gagal Membuat Data', 'danger');
        Redirect::to('/Vehicle');
        exit;
      }
    }

    $this->template('Vehicle/add');
  }

  public function edit($id)
  {

    $data['vehicle'] = $this->model($this->vehicle_model)->getById($id);

    $this->template('Vehicle/index', $data);

    if (isset($_POST['submit'])) {

      $post = array(
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'amount' => $_POST['amount'],
        'owned_by' => $_POST['owned_by'],
      );

      if ($this->model($this->vehicle_model)->add($post) > 0) {
        Flasher::setFlash('Data Kendaraan sukses diubah', 'Sukses Mengubah Data', 'success');
        Redirect::to('/Vehicle');
        exit;
      } else {
        Flasher::setFlash('Data Kendaraan gagal diubah', 'Gagal Mengubah Data', 'danger');
        Redirect::to('/Vehicle');
        exit;
      }
    }
  }

  public function delete($id)
  {
    if (isset($id)) {
      Redirect::to('/Vehicle');
      if ($this->model($this->vehicle_model)->delete($id) > 0) {
        Flasher::setFlash('Data Kendaraan sukses dihapus', 'Sukses Menghapus Data', 'success');
        exit;
      } else {
        Flasher::setFlash('Data Kendaraan gagal dihapus', 'Gagal Menghapus Data', 'danger');
        exit;
      }
    }
  }

  public function list_vehicle()
  {
    $data["vehicles"] = $this->model($this->vehicle_model)->getAll();
    $this->template("Vehicle/listVehicle", $data);
  }
}
