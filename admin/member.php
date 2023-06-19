<?php
$halaman = "Member";
require 'config.php';
require 'layout-header.php';
$query = 'SELECT * FROM member';
$data = ambildata($conn,$query);
?> 
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Member</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Member</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="member_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th width="3%" class="text-center">No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>Telepon</th>
                                <th>No KTP</th>
                                <th width="15%" class="text-center">Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($data as $member): ?>
                                <tr>
                                    <td class="text-center" ><?= $no++ ?></td>
                                    <td><?= $member['nama_member'] ?></td>
                                    <td><?= $member['alamat_member'] ?></td>
                                    <td><?= $member['jenis_kelamin'] ?></td>
                                    <td><?= $member['telp_member'] ?></td>
                                    <td><?= $member['no_ktp'] ?></td>
                                    <td align="center">
                                        <div>
                                          <a href="member_edit.php?id=<?= base64_encode($member['id_member']) ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>

                                        <!-- modal picu -->
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $member['id_member'] ?>">
                                            <i class="fa fa-trash"> Hapus</i>
                                        </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?php echo $member['id_member'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- header-->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                                </div>
                                                <!--body-->
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus member : <b><?= $member['nama_member'] ?></b>
                                                </div>
                                                <!--footer-->
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                    <a href="member_hapus.php?id=<?= $member['id_member'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                </div>
                                                </div>
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
