<?php
$halaman = "Outlet";
require 'config.php';
require 'layout-header.php';
$query = 'SELECT outlet.*, user.nama_user FROM outlet LEFT JOIN user ON user.outlet_id = outlet.id_outlet';
$data = ambildata($conn,$query);
?> 
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Outlet</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Outlet</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="outlet_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Owner</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $outlet): ?>
                                <tr>
                                    <td></td>
                                    <td><?= htmlspecialchars($outlet['nama_outlet']); ?></td>
                                    <td>
                                        <?php if($outlet['nama_user'] == null){
                                            echo 'Belum Ada Owner';
                                        }else{
                                            echo htmlspecialchars($outlet['nama_user']);
                                        } ?>
                                    </td>
                                    <td><?= htmlspecialchars($outlet['telp_outlet']); ?></td>
                                    <td><?= htmlspecialchars($outlet['alamat_outlet']); ?></td>
                                    <td align="center">
                                        <div>
                                          <a href="outlet_edit.php?id=<?= base64_encode($outlet['id_outlet']); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-info"><i class="fa fa-edit"> Edit</i></a>
                                          
                                          <!-- modal picu -->
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $outlet['id_outlet'] ?>">
                                            <i class="fa fa-trash"> Hapus</i>
                                        </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?php echo $outlet['id_outlet'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- header-->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                                </div>
                                                <!--body-->
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus outlet : <b><?= $outlet['nama_outlet'] ?></b>
                                                </div>
                                                <!--footer-->
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                    <a href="outlet_hapus.php?id=<?= $outlet['id_outlet']; ?>" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        
    </div>
<?php
require'layout-footer.php';
