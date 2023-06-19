<?php 
$halaman = "Dashboard";
require 'config.php';
require 'layout-header.php';
$outlet_id = $_SESSION['outlet_id'];
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi WHERE outlet_id='.$outlet_id);
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$juser = ambilsatubaris($conn, 'SELECT COUNT(id_user) as jumlahuser FROM user');
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi WHERE outlet_id = ".$outlet_id."  ORDER BY transaksi.id_transaksi DESC";
$data = ambildata($conn,$query);
?>


        <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h4 class="page-title"><?php echo $halaman; ?></h4>
                  </div>
              </div>
              <!-- /.row -->
              <!-- ============================================================== -->
              <!-- Different data widgets -->
              <!-- ============================================================== -->
              <!-- .row -->
              <div class="row">
              <div>
                  </div>
                  <div class="col-lg-6">
                      <div class="white-box box-analis analytics-info">
                          <h3 class="box-title">Member</h3>
                          <ul class="list-inline two-part">
                              <li>
                                  <a href="member.php"><img src="../assets/images/member.png" width="50"></a>
                              </li>
                              <li class="text-right"> <span class="counter text-purple"><?= $jPelanggan['jumlahmember'] ?></span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="white-box box-analis analytics-info">
                          <h3 class="box-title">Transaksi</h3>
                          <ul class="list-inline two-part">
                          <li>
                              <a href="pengguna.php"><img src="../assets/images/transaksi.png" width="50"></a>
                          </li>
                          <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?= $jTransaksi['jumlahtransaksi'] ?></span>
                          </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                      <div class="white-box box-analis">
                          <h3 class="box-title ">Transaksi Terbaru</h3>
                          <div class="table-responsive">
                              <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Invoice</th>
                                          <th>Member</th>
                                          <th>Status</th>
                                          <th>Pemabayaran</th>
                                          <th>Total Harga</th>
                                          <th width="15%">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no=1; foreach($data as $transaksi): ?>
                                          <tr>
                                              <td><?= $no++ ?></td>
                                              <td><?= $transaksi['kode_invoice'] ?></td>
                                              <td><?= $transaksi['nama_member'] ?></td>
                                              <td><?= $transaksi['status'] ?></td>
                                              <td><?= $transaksi['status_bayar'] ?></td>
                                              <td><?= buatRupiah($transaksi['total_harga']) ?></td>
                                              <td align="center">
                                                    <a href="transaksi_detail.php?id=<?= base64_encode($transaksi['id_transaksi']) ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success btn-block">Detail</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

<?php 
require'layout-footer.php';
 ?>