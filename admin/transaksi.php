<?php
$halaman = "Transaksi";
require 'config.php';
require 'layout-header.php';
$query1 = "SELECT transaksi.*,member.nama_member ,transaksi.diskon , detail_transaksi.total_harga , outlet.nama_outlet , user.nama_user FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN outlet ON outlet.id_outlet = transaksi.outlet_id INNER JOIN user ON user.id_user = transaksi.user_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi ";
$data = ambildata($conn,$query1);
?> 
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $halaman ?></h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                            <a href="transaksi_cari_member.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                            <a href="transaksi_konfirmasi.php" class="btn btn-primary box-title"><i class="fa fa-check fa-fw"></i> Konfirmasi Pembayaran</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <!-- modal picu -->
                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapustransaksi">
                        <i class="fa fa-minus fa-fw"></i> Hapus Seluruh Transaksi
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapustransaksi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- header-->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                            </div>
                            <!--body-->
                            <div class="modal-body">
                                <strong>PERINGATAN JIKA ANDA INGIN MENGHAPUS DATA TRANSAKSI KONFIRMASI TERLEBIH DAHULU KE OUTLET MASING MASING!!</strong>
                            </div>
                            <!--footer-->
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                    <a href="transaksi_hapus.php" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" width="3%">No</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Status</th>
                                <th>Pemabayaran</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                                <th>Waktu</th>
                                <th>Outlet</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($data as $transaksi): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $transaksi['kode_invoice'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['status_bayar'] ?></td>
                                    <td><?= $transaksi['diskon'] ?></td>
                                    <td><?= buatRupiah($transaksi['total_harga']) ?></td>
                                    <td>
                                        <form action="">
                                            <table class="">
                                                <tr>
                                                    <td>Tanggal Dibuat</td>
                                                    <td>:</td>
                                                    <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['tgl'] ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Batas Waktu</td>
                                                    <td>:</td>
                                                    <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['batas_waktu'] ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>:</td>
                                                    <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['tgl_pembayaran'] ?>"></td>
                                                </tr>
                                            </table>
                                        </form>
                                    </td>
                                    <td>
                                        <?= $transaksi['nama_outlet'] ?><br>
                                        Dibuat Oleh : <b><?= $transaksi['nama_user'] ?></b>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="transaksi_detail.php?id=<?= base64_encode($transaksi['id_transaksi']) ?>" class="btn btn-warning">Detail</a>
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
