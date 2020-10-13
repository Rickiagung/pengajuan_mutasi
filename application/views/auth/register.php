<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Aplikasi pengajuan  mutasi</title>

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/horizontal-layout/style.css">
  <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logoprovjateng.png" />

  <!-- Custom styles for this page -->
  <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css">

</head>

<body>
  <div class="container-scroller">
    
    <!-- Menu -->
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo text-white" href="<?= base_url('') ?>"><strong><img class="mb-2" src="<?= base_url('assets/img/logoprovjateng.png') ?>" alt=""> APLIKASI PENGAJUAN  MUTASI PEGAWAI</strong></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown mr-0 mr-sm-3">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>" >
                        <span class="nav-profile-name mr-2">Dashboard</span>  
                        </a>
                    </li>
                    <li class="nav-item nav-profile dropdown mr-0 mr-sm-3">
                        <a class="nav-link" href="<?= base_url('auth') ?>">
                        <span class="nav-profile-name mr-2">Login</span>  
                        </a>
                    </li>
                    <li class="nav-item nav-profile dropdown mr-0 mr-sm-3">
                        <a class="nav-link" href="<?= base_url('auth/register') ?>">
                        <span class="nav-profile-name mr-2">Registrasi</span>  
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
                </button>
            </div>
            </div>
        </nav>
    </div>

    <!-- Isi konten -->
    <div class="page-body-wrapper">
        <div class="main-panel" style="background-image: url(http://localhost/pengajuan/assets/img/1.jpg)">
        <div class="content-wrapper d-flex" style="margin-left: 350px;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="h3 text-gray-800 mb-4">Registrasi Data </h1>
                            
                            <div class="card">
                                <div class="card-header">
                                    Form Data 
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                     
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" autocomplete="off" value="<?= set_value('nip'); ?>">
                                            <?= form_error('nip','<small class="text-danger">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autocomplete="off" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <select name="jabatan" class="form-control" id="jabatan">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach($jabatan as $j) : ?>
                                                    <?php if(set_value('jabatan') == $j->id) : ?>
                                                        <option value="<?= $j->id ?>" selected><?= $j->nama ?> / <?= $j->pangkat ?> / <?= $j->gol_ruang ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $j->id ?>"><?= $j->nama ?> / <?= $j->pangkat ?> / <?= $j->gol_ruang ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="form-text text-danger"><?= form_error('jabatan') ?></small>
                                        </div>
                                      
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="password1">Password</label>
                                                <input type="password" class="form-control" id="password1" placeholder="Password" name="password1" autocomplete="off">
                                                <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="password2">Ulangi Password</label>
                                                <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2" autocomplete="off">
                                            </div>
                                        </div>
                                        <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                                        <a href="<?= base_url('admin/') ?>" class="btn btn-secondary">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <footer class="footer">
      <div class="w-100 clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="#" target="_blank">BKD</a>. All rights reserved.</span>
      </div>
    </footer>
    
  </div>

  <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- <script src="<?= base_url(); ?>assets/js/data-table.js"></script> -->

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?= base_url(); ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
    $(function(){
    $(".datepicker").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
    });
    });
    </script>


</body>
</html>
