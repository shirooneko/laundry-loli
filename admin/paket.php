<?php
$halaman = "Paket";
require 'config.php';
require 'layout-header.php';
$query = 'SELECT outlet.nama_outlet ,paket.* FROM paket INNER JOIN outlet ON paket.outlet_id = outlet.id_outlet';
$data = ambildata($conn,$query);
?> 

    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $halaman ?></h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Paket</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="paket_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" width="3%" >No</th>
                                <th>Nama Paket</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Outlet</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($data as $paket): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $paket['nama_paket'] ?></td>
                                    <td><?= $paket['jenis_paket'] ?></td>
                                    <td><?= buatRupiah($paket['harga']) ?></td>
                                    <td><?= $paket['nama_outlet'] ?></td>
                                    <td align="center">
                                        <div>
                                          <a href="paket_edit.php?id=<?= base64_encode($paket['id_paket']) ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <!-- tombol pemicu -->
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $paket['id_paket'] ?>">
                                            <i class="fa fa-trash"> Hapus</i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?php echo $paket['id_paket'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- header-->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                                </div>
                                                <!--body-->
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus paket : <b><?= $paket['nama_paket'] ?></b>
                                                </div>
                                                <!--footer-->
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                    <a href="paket_hapus.php?id=<?= $paket['id_paket']; ?>" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
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
