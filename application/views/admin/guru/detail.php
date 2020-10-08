<div class="container-fluid page-body-wrapper">
    <div class="main-panel" style="background-image: url(http://localhost/pengajuan/assets/img/1.jpg)">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="h3 text-gray-800 mb-4">Detail Data pegawai</h1>
                            <div class="row">
                            <div class="col-md-7 mt-3">
                                <div class="card" style="width: 30rem;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $pegawai->nama ?></h5>
                                        <p class="card-text">
                                            NIP LAMA : <?= $pegawai->nip_lama ?> <br>
                                            NIP : <?= $pegawai->nip ?> <br>
                                            Nama : <?= $pegawai->nama ?> <br>
                                            TTL : <?= $pegawai->tmp_lahir.', '.$pegawai->tgl_lahir ?> <br>
                                            Jenis Kelamin : <?= $pegawai->jns_klmn ?> <br>
                                            Status : <?= $pegawai->status ?> <br>
                                            
                                            <?php $jabatan = $this->db->get_where('jabatan',['id' => $pegawai->jabatan_id])->row(); ?>
                                            Pangkat : <?= $jabatan->pangkat ?> / <?= $jabatan->gol_ruang ?> <br>
                                            Jabatan : <?= $jabatan->nama ?> <br>
                                            Agama : <?= $pegawai->agama ?> <br>
                                            Telepon : <?= $pegawai->telepon ?> <br>
                                            Alamat : <?= $pegawai->alamat ?> <br>
                                            Unit Kerja : <?= $pegawai->unit_kerja ?> <br>
                                            Pensiun : <?= $pegawai->pensiun ?> <br>
                                            Pendidikan Terakhir : <?= $pegawai->pendidikan_terakhir ?> <br>
                                            Tahun Lulus : <?= $pegawai->th_lulus ?> <br>
                                            Kecamatan : <?= $pegawai->kecamatan ?>
                                        </p>
                                        <a href="<?= base_url('admin/guru') ?>" class="card-link">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    