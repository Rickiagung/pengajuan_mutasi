<div class="container-fluid page-body-wrapper">
    <div class="main-panel" style="background-image: url(http://localhost/pengajuan/assets/img/1.jpg)">
        <div class="content-wrapper">
            <div class="card" style="height:300px">
                <div class="card-body">
                    <div class="row">
                        <?php if($pengajuan) : 
                                if($pengajuan->status == 1): ?>
                                    <div class="col-12">
                                        <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN PENSIUN TELAH DITERIMA</h1>


                                        <!-- <p>Cetak berkas pensiun</p> -->




                                    </div>
                                <?php elseif($pengajuan->status == 2) : ?>
                                    <div class="col-12">
                                        <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN PENSIUN DITOLAK, ULANGI PENGAJUAN!</h1>
                                        <a href="<?= base_url() ?>pegawai/pengajuan">Form Pengajuan</a>
                                    </div>
                                <?php else : ?>
                                    <?php if($pengajuan->status == 0 && $pengajuan->pengembalian_inventaris == 0) : ?>
                                        <div class="col-12">
                                            <h1 class="h3 text-gray-800 mb-4">BELUM ADA PROSES PENGAJUAN</h1>
                                        </div>
                                    <?php else : ?>
                                        <div class="col-12">
                                            <h1 class="h3 text-gray-800 mb-4">STATUS PENGAJUAN PENSIUN MASIH DALAM PROSES PENILAIAN</h1>
                                        </div>
                                    <?php endif ?>
                                <?php endif; ?>

                        <?php else : ?>

                        <div class="col-12">
                            <h1 class="h3 text-gray-800 mb-4">BELUM MELAKUKAN PENGAJUAN PENSIUN</h1>
                            <hr>

                            <?php $pegawai = $this->db->get_where('pegawai', ['id' => $this->session->userdata('id')])->row(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item active">Data pegawai</li>
                                        <li class="list-group-item">NAMA : <?= $pegawai->nama ?></li>
                                        <li class="list-group-item">NIP LAMA : <?= $pegawai->nip_lama ?></li>
                                        <li class="list-group-item">NIP BARU : <?= $pegawai->nip ?></li>
                                        <li class="list-group-item">TTL : <?= $pegawai->tmp_lahir ?>, <?= $pegawai->tgl_lahir ?></li>
                                        <li class="list-group-item">JENIS KELAMIN : <?php  if($pegawai->jns_klmn == 'L') echo "LAKI-LAKI"; else echo 'PEREMPUAN' ?></li>
                                        <li class="list-group-item">STATUS : <?= $pegawai->status ?></li>
                                        <li class="list-group-item">AGAMA : <?= $pegawai->agama ?></li>
                                        <li class="list-group-item">TELEPON : <?= $pegawai->telepon ?></li>
                                        <li class="list-group-item">ALAMAT : <?= $pegawai->alamat ?></li>
                                        <li class="list-group-item">PENDIDIKAN TERAKHIR : <?= $pegawai->pendidikan_terakhir ?></li>
                                        <li class="list-group-item">UNIT KERJA : <?= $pegawai->unit_kerja ?></li>
                                        <li class="list-group-item">JABATAN : <?php $jabatan = $this->db->get_where('jabatan', ['id' => $pegawai->jabatan_id])->row();
                                        echo $jabatan->nama.' / '. $jabatan->pangkat.' / '.$jabatan->gol_ruang; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item active">Waktu Pensiun</li>
                                        <li class="list-group-item">TAMAT PANGKAT : <?= $pegawai->tamat_pangkat ?></li>
                                        <li class="list-group-item">TAMAT JABATAN : <?= $pegawai->tamat_jabatan ?></li>
                                        <li class="list-group-item">PENSIUN : <?= $pegawai->pensiun ?></li>
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