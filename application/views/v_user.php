 <!-- USER - Controller User & M_user - ADMIN -->

<!-- Tampilan Isi Dari Menu Atas Samping Kiri --> 
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> Add</button>
                </div> <!-- /.card-tools -->
              </div>

              <!-- Isi Card Data User -->
              <div class="card-body">
                <!-- Tampilan Notifikasi  -->
                <?php
                  if ($this->session->flashdata('pesan'))
                  {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                  }
                ?>
                <!-- Tampilan atas tabel  -->
                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- Tampilan isi dari tabel  -->
                  <tbody>
                    <?php $no = 1; 
                    foreach ($user as $key => $value) { ?>
                    <tr class="text-center">
                      <td><?= $no++; ?></td>
                      <td><?= $value->nama_user ?></td>
                      <td><?= $value->username ?></td>
                      <td><?= $value->password ?></td>
                       <td><?php
                          if ($value->level_user == 1) {
                            echo '<span class="badge bg-dark">Admin</span>';
                          } else {
                            echo '<span class="badge bg-primary">User</span>';
                          }
                       ?></td>
                      <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>

      <!-- Card Add/Tambah User -->
      <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <?php
            echo form_open('user/add');
            ?>
            <div class="form-group">
             <label>Nama User</label>
             <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
            </div>

            <div class="form-group">
             <label>Email/Username</label>
             <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
             <label>Password</label>
             <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
             <label>Level User</label>
             <select name="level_user" class="form-control" >
               <option value="1" selected>Admin</option>
               <option value="2">User</option>
             </select>
            </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
             <?php
             echo form_close(''); 
             ?>

          </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
      </div>

      <!-- Card Edit User -->
      <?php foreach ($user as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <?php
            echo form_open('user/edit/' . $value->id_user);
            ?>
            <div class="form-group">
             <label>Nama User</label>
             <input type="text" name="nama_user" value="<?= $value->nama_user ?>" class="form-control" placeholder="Nama User" required>
            </div>

            <div class="form-group">
             <label>Email/Username</label>
             <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
             <label>Password</label>
             <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
             <label>Level User</label>
             <select name="level_user" class="form-control" >
               <option value="1" <?php if($value->level_user==1) {
                echo "selected";
              }?>>Admin</option>
               <option value="2" <?php if($value->level_user==2) {
                echo "selected";
              }?>>User</option>
             </select>
            </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
            </div>
            <?php
            echo form_close('');
            ?>

          </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
      </div>
      <?php } ?>

      <!-- Card Hapus/Delete Data User -->
      <?php foreach ($user as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Menampilkan nama user -->
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->nama_user ?></h4>
              <!-- Tombol Close <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <!-- Menampilkan text di tengah -->
            <div class="modal-body">
              <h6>Apakah Anda Ingin Menghapus Data Ini ?</h6>
            </div>
            <!-- Menampilkan Menu Tidak & Hapus -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <a href="<?= base_url('user/delete/'. $value->id_user) ?>" class="btn btn-dark">Hapus</a>
            </div>
          </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
      </div>
    <?php } ?>
     