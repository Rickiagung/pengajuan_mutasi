<div class="container-fluid page-body-wrapper">
    <div class="main-panel" style="background-image: url(http://localhost/pengajuan/assets/img/1.jpg)">
        <div class="content-wrapper">
            <div class="card" style="min-height:300px">
                <div class="card-body">
                    <div class="row">
                        <?php if($mutasi) : 
                                if($mutasi->status == 1): ?>
                                    <div class="col-12">
                                        <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN MUTASI TELAH DITERIMA</h1>


                                        <!-- <p>Cetak berkas mutasi</p> -->




                                    </div>
                                <?php elseif($mutasi->status == 2) : ?>
                                    <div class="col-12">
                                        <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN MUTASI DITOLAK, ULANGI PENGAJUAN!</h1>
                                        <a href="<?= base_url() ?>/mutasi">Form Mutasi</a>
                                    </div>
                                <?php else : ?>
                                    <?php if($mutasi->status == 0) : 
                                        // proses pengajuan
                                        // redirect('/mutasi');
                                        ?>
                                        
                                        <div class="col-12">
                                            <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN MUTASI MASIH DALAM PROSES PENILAIAN</h1>
                                        </div>
                                    <?php endif ?>
                                <?php endif; ?>

                        <?php else : ?>

                        <div class="col-12">
                            <h1 class="h3 text-gray-800 mb-4">BELUM MELAKUKAN PENGAJUAN MUTASI</h1>
                            <hr>

                           
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>