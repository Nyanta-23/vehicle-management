<?php
$i = 1;
?>

<div class="page-heading">
  <h3>Vehicle</h3>

  <div class="d-flex justify-content-end">
    <a href="<?= BASE_URL ?>/Vehicle/add" type="button" class="btn btn-primary w-25">
      <span>Add</span>
    </a>
  </div>

</div>
<div class="page-content">
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-lg">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Owned By</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($data['vehicles'] > 0) :
                foreach ($data["vehicles"] as $vehicle) :
              ?>
                  <tr>
                    <td class="text-bold-500"><?= $i++; ?></td>
                    <td class="text-capitalize"><?= $vehicle['name']; ?></td>
                    <td class="text-bold-500 text-capitalize"><?= $vehicle['type']; ?></td>
                    <td class="text-bold-500 text-capitalize"><?= $vehicle['owned_by']; ?></td>
                    <td class="d-flex justify-content-center gap-2">
                      <a href="<?= BASE_URL; ?>/Vehicle/edit/<?= $vehicle['id']; ?>" class="btn btn-success w-50">
                        <span>Edit</span>
                      </a>
                      <a href="<?= BASE_URL; ?>/Vehicle/delete/<?= $vehicle['id']; ?>" class="btn btn-danger w-50" onclick="return confirm('Yakin untuk menghapus data?')">
                        <span>Delete</span>
                      </a>
                    </td>
                  </tr>
              <?php
                endforeach;
              endif;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>