<div class="col-auto">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Tambah Kendaraan</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" action="<?= BASE_URL; ?>/Vehicle/add" method="post">
          <div class="form-body">
            <div class="row">

              <div class="col-md-4">
                <label for="first-name-horizontal">Nama Kendaraan</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="text" id="first-name-horizontal" class="form-control" name="name" placeholder="Nama Kendaraan">
              </div>

              <div class="col-md-4">
                <label for="contact-info-horizontal">Jumlah Kendaraan</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="number" id="contact-info-horizontal" class="form-control" name="amount" placeholder="Jumlah Kendaraan" value="0" min="0">
              </div>

              <div class="col-md-4">
                <label for="contact-info-horizontal">Tipe Kendaraan</label>
              </div>
              <div class="col-md-8 form-group d-flex gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="goods" value="goods" checked>
                  <label class="form-check-label" for="goods">Angkutan Barang</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="persons" value="persons">
                  <label class="form-check-label" for="persons">Angkutan Orang</label>
                </div>
              </div>

              <div class="col-md-4">
                <label for="contact-info-horizontal">Pemilik</label>
              </div>
              <div class="col-md-8 form-group d-flex gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="owned_by" id="company" value="company" checked>
                  <label class="form-check-label" for="company">Perusahaan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="owned_by" id="company" value="rented">
                  <label class="form-check-label" for="rented">Sewaan</label>
                </div>
              </div>

              <div class="col-sm-12 d-flex justify-content-end">
                <a href="<?= BASE_URL; ?>/Vehicle" class="btn btn-danger me-1 mb-1">Kembali</a>
                <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

