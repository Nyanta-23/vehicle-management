<?php
$i = 1;
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
                <th>Name</th>
                <th>Id</th>
                <th>Type</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($data['reservations'] > 0) :
                foreach ($data["reservations"] as $reservation) :
              ?>
                  <tr>
                    <td class="text-bold-500"><?= $i++; ?></td>
                    <td class="text-capitalize"><?= $reservation['vehicle_name']; ?></td>
                    <td class="text-capitalize"><?= $reservation['id']; ?></td>
                    <td class="text-bold-500 text-capitalize"><?= $reservation['vehicle_type']; ?></td>
                    <td class="text-bold-500"><?= $reservation['email']; ?></td>
                    <td class="d-flex justify-content-center gap-2">
                      <?php
                      $statusButton = '<form action="' . BASE_URL . '/Request/send/' . $reservation['id'] . '" method="post">
                                        <input type="hidden" name="reserver_by" value="'. $reservation['user_name'] .'"/>
                                        <input type="hidden" name="email" value="'. $reservation['email'] .'"/>
                                        <input type="hidden" name="name_vehicle" value="'. $reservation['vehicle_name'] .'"/>
                                        <input type="hidden" name="type_vehicle" value="'. $reservation['vehicle_type'] .'"/>
                                        <input type="hidden" name="vehicle_owned_by" value="'. $reservation['owned_by'] .'"/>
                                        <button type="submit" name="submit" class="btn btn-primary">
                                          <span>Send Request</span>
                                        </button>
                                      </form>';

                      if ($data['approval'] > 0) :

                        foreach ($data['approval'] as $approval) {
                          if ($approval['reservation_id'] == $reservation['id']) {
                            if ($approval['level'] > 1) {
                              $statusButton = '<button class="btn btn-success">Request Approved</button>';
                            } elseif ($approval['is_rejected']) {
                              $statusButton = '<button class="btn btn-danger">Request Rejected</button>';
                            } else {
                              $statusButton = '<button class="btn btn-info" style="cursor: progress;">Pending</button>';
                            }
                            break;
                          }
                        }

                        echo $statusButton;
                      else :
                        echo $statusButton;
                      ?>
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