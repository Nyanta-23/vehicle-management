<?php
$user = $data['user'];
?>

<div class="page-heading">
  <h3>User</h3>
</div>

<div class="page-content">
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <form class="form form-horizontal" action="<?= BASE_URL; ?>/Vehicle/add" method="post">
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-4">
                      <label for="first-name-horizontal">Nama</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <span><?= $user['name']; ?></span>
                    </div>
                    
                    <div class="col-md-4">
                      <label for="contact-info-horizontal">Email</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <span><?= $user['email']; ?></span>
                    </div>
                    
                    <div class="col-md-4">
                      <label for="contact-info-horizontal">Role</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <span><?= $user['role']; ?></span>
                    </div>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>