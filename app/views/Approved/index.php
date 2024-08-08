<?php
$i = 1;

// var_dump($data);
?>

<div class="page-heading">
  <h3>List Reservation</h3>

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
                <th>Reserver By</th>
                <th>Email</th>
                <th>Name Vehicle</th>
                <th>Type Vehicle</th>
                <th>Vehicle Owned By</th>
                <th>Id Vehicle</th>
                <th>Driver</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($data['approval'] > 0) :
                foreach ($data["approval"] as $approval) :

              ?>
                  <tr>
                    <td class="text-bold-500"><?= $i++; ?></td>
                    <td class="text-capitalize"><?= $approval['reserver_by']; ?></td>
                    <td class="text-bold-500"><?= $approval['email']; ?></td>
                    <td class="text-bold-500"><?= $approval['name_vehicle']; ?></td>
                    <td class="text-bold-500"><?= $approval['type_vehicle']; ?></td>
                    <td class="text-bold-500"><?= $approval['vehicle_owned_by']; ?></td>
                    <td class="text-bold-500"><?= $approval['vehicle_id']; ?></td>
                    <td class="text-bold-500"><?= $approval['driver']; ?></td>
                    <td class="d-flex justify-content-center gap-2">
                      <?php
                      if ($approval['level'] > 0 || $approval['is_rejected'] == 1) :
                        if ($approval['is_rejected'] == 1) :
                      ?>
                          <button class="btn btn-danger">Permintaan Ditolak</button>
                        <?php
                        else :
                        ?>
                          <button class="btn btn-success">Permintaan Diterima</button>
                      <?php
                        endif;
                      endif;
                      ?>

                      <?php
                      if ($approval['level'] < 1 && $approval['is_rejected'] == 0) :
                      ?>
                        <a href="<?= BASE_URL; ?>/Approved/acceptRequestBy/<?= $approval['id']; ?>" class="btn btn-primary" onclick="return confirm('Anda yakin untuk mensetujuinya?')">Accept</a>
                        <a href="<?= BASE_URL; ?>/Approved/rejectRequestBy/<?= $approval['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menolaknya?')">Reject</a>
                    </td>
                  </tr>
            <?php
                      endif;

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


<!-- <a href="<?= BASE_URL; ?>/Approval/acceptRequestBy/<?= $approval['id']; ?>" class="btn btn-primary" onclick="return confirm('Anda yakin untuk mensetujuinya?')">Accept</a>
<a href="<?= BASE_URL; ?>/Approval/rejectRequestBy/<?= $approval['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menolaknya?')">Reject</a> -->

<!-- <button class="btn btn-<?= $isApproved ? 'success' : 'danger'; ?>">Permintaan <?= $isApproved ? 'Disetujui' : 'Ditolak'; ?></button> -->