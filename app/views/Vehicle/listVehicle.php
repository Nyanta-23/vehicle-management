<?php
$i = 1;
?>

<div class="page-heading">
  <h3>List Vehicle</h3>

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
                    <td class="d-flex justify-content-center gap-2">
                      <a href="<?= BASE_URL; ?>/Request/add/<?= $vehicle['id']; ?>" class="btn btn-success">
                        <span>Request</span>
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