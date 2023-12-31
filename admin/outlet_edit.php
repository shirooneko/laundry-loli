<?php
$halaman = "Outlet";
require 'config.php';
$query = 'SELECT outlet.*, user.nama_user,user.id_user FROM outlet LEFT JOIN user ON user.outlet_id = outlet.id_outlet WHERE id_outlet = ' . base64_decode($_GET['id']);
$data = ambilsatubaris($conn,$query);

$query2 = 'SELECT user.*,outlet.nama_outlet FROM outlet RIGHT JOIN user ON user.outlet_id = outlet.id_outlet WHERE user.role = "owner" order by user.outlet_id asc';
$data2 = ambildata($conn,$query2);
if(isset($_POST['btn-simpan'])){
    $nama   = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $telp   = $_POST['telp_outlet'];

    // untuk mengupdate nama, outlet, dan no telp
    $query = "UPDATE outlet SET nama_outlet = '$nama' , alamat_outlet = '$alamat' , telp_outlet='$telp' WHERE id_outlet = " . base64_decode($_GET['id']);
    
    // untuk mengedit memasukan id user
    if($_POST['owner_id_new']){
        $query2 = "UPDATE user SET outlet_id = '" . base64_decode($_GET['id']) . "' WHERE id_user = " . $_POST['owner_id_new'];
        $query3 = "UPDATE user SET outlet_id = NULL WHERE id_user = " . $data['id_user'];
        $execute3 = bisa($conn,$query3);
    } else {
        $query2 = "UPDATE user SET outlet_id = '" . base64_decode($_GET['id']) . "' WHERE id_user = " . $_POST['owner_id'];
    }

    $execute = bisa($conn,$query);
    $execute2 = bisa($conn,$query2);

    if($execute == 1 && $execute2 == 1){
        header('location: outlet.php');
    }else{
        echo "Gagal Tambah Data";
    }
}


require'layout-header.php';
?> 
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Outlet</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="outlet.php">Outlet</a></li>
                <li><a href="#">Edit Outlet</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                          <a href="outlet.php" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mb-5">
            <div class="white-box box-analis">
                <form method="post" action="">
                <div class="form-group">
                    <label>Nama Outlet</label>
                    <input type="text" value="<?= $data['nama_outlet']; ?>" name="nama_outlet" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Outlet</label>
                    <textarea name="alamat_outlet" class="form-control"><?= $data['alamat_outlet']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" value="<?= $data['telp_outlet']; ?>" name="telp_outlet" class="form-control">
                </div>
                <?php if($data['nama_user']  == null): ?>
                    <div class="form-group">
                        <label>Belum Ada Owner (silahkan pilih owner)</label>
                        <select name="owner_id" class="form-control">
                            <?php foreach ($data2 as $owner): ?>
                                <option value="<?= $owner['id_user'] ?>"><?= $owner['nama_user'] ?> 
                                    <?php if ($owner['outlet_id'] == null): ?>
                                        ( Belum memiliki outlet )
                                    <?php else: ?>
                                        ( Owner di <?= $owner['nama_outlet'] ?> )
                                    <?php endif ?>                                    
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label>Owner Sekarang : <?= $data['nama_user']; ?></label>
                        <select name="owner_id_new" class="form-control">
                            <option class="">Pilih Untuk Mengganti owner</option>
                            <?php foreach ($data2 as $owner): ?>
                                <option value="<?= $owner['id_user'] ?>"><?= $owner['nama_user'] ?> 
                                    <?php if ($owner['outlet_id'] == null): ?>
                                        ( Belum memiliki outlet )
                                    <?php else: ?>
                                        ( Owner di <?= $owner['nama_outlet'] ?> )
                                    <?php endif ?>                                    
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif; ?>
                <div class="text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
require'layout-footer.php';
?> 