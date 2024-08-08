<?php 
$vehicle = $data['vehicle'];

?>

<div class="col-auto">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Permintaan Penggunaan Kendaraan</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" action="<?= BASE_URL; ?>/Request/add/<?= $data['id']; ?>" method="post">
          <div class="form-body">
            <div class="row">

              <div class="col-md-4">
                <label for="name-vehicle">Nama Kendaraan</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="text" id="name-vehicle" class="form-control" name="name" placeholder="Nama Kendaraan" value="<?= $vehicle['name']; ?>" readonly>
              </div>

              <div class="col-md-4">
                <label for="type">Type</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="text" id="type" class="form-control text-capitalize" name="name" placeholder="Nama Kendaraan" value="<?= $vehicle['type']; ?>" readonly>
              </div>

              <div class="col-md-4">
                <label for="contact-info-horizontal">Jumlah Kendaraan</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="number" id="contact-info-horizontal" class="form-control" name="amount" placeholder="Jumlah Kendaraan" value="1" min="1">
              </div>

              <div class="col-md-4">
                <label for="contact-info-horizontal">Pengemudi</label>
              </div>
              <div class="col-md-8 form-group d-flex gap-3">
                <div class="form-check">
                  <div class="checkbox">
                    <input type="checkbox" id="checkbox1" class="form-check-input" name="self-driving" checked>
                    <label for="checkbox1">Mengemudi Sendiri</label>
                  </div>
                </div>
                <input type="text" id="driver" class="form-control" name="driver" placeholder="Nama Kendaraan" required>
              </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-end">
              <a href="<?= BASE_URL; ?>/Request/" class="btn btn-danger me-1 mb-1">Kembali</a>
              <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
</div>