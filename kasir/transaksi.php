<?php
$halaman = "Transaksi";
require 'config.php';
require 'layout-header.php';
$outlet_id   = $_SESSION['outlet_id'];
$query1 = "SELECT transaksi.*,member.nama_member ,transaksi.diskon , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi WHERE outlet_id =".$outlet_id;
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
                        <a href="transaksi_hapus.php" class="btn btn-danger box-title"><i class="fa fa-minus fa-fw"></i> Hapus Seluruh Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box ">
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
                                <th width="25%">Waktu</th>
                                <th width="10%">Aksi</th>
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
                                                <td>Tanggal Dibuat :</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['tgl'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Batas Waktu :</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['batas_waktu'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Pembayaran :</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" readonly="" class="form-control-plaintext" value="<?= $transaksi['tgl_pembayaran'] ?>"></td>
                                            </tr>
                                        </table>
                                    </form>
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
