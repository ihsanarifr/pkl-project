<div class="col-md-4">
    <?php if(empty($siswa->foto)){ ?>
        <img class="thumbnail" src="<?php echo base_url()?>assets/images/sample.svg" alt="...">
    <?php }else{ ?>
        <img class="thumbnail" src="<?php echo base_url()?>assets/images/users/<?php echo $siswa->foto ?>" width="250">
    <?php } ?>
    <a href="<?php echo site_url('data_siswa/change_password')?>/<?php echo $siswa->id ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
    <a href="<?php echo site_url('data_siswa/change_photo_profile')?>/<?php echo $siswa->id ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-user"></i> Ganti Foto</a>
</div>
<div class="col-md-8">
    <table class="table table-striped">
        <tr>
            <td width="200">Nomor Induk Siswa</td>
            <td width="30">:</td>
            <td><?php echo $siswa->nomor_induk?></td>
        </tr>
        <tr>
            <td width="100">Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $siswa->nama?></td>
        </tr>
        <tr>
            <td width="100">Tempat, tanggal lahir</td>
            <td>:</td>
            <td><?php echo $siswa->tempat_lahir?>, <?php echo $siswa->tanggal_lahir ?></td>
        </tr>
        <tr>
            <td width="100">Ayah/Ibu</td>
            <td>:</td>
            <td><?php echo $siswa->ayah?>/<?php echo $siswa->ibu ?></td>
        </tr>
        <tr>
            <td width="100">Golongan Darah</td>
            <td>:</td>
            <td><?php echo $siswa->nama_golongan_darah?></td>
        </tr>
        <tr>
            <td width="100">Alamat</td>
            <td>:</td>
            <td><?php echo $siswa->alamat?></td>
        </tr>
        <tr>
            <td width="100">Kota/Kabupaten</td>
            <td>:</td>
            <td><?php echo $siswa->kabkot?></td>
        </tr>
        <tr>
            <td width="100">Nama Sekolah</td>
            <td>:</td>
            <td><?php echo $siswa->nama_sekolah?></td>
        </tr>
        <tr>
            <td width="100">Program Keahlian</td>
            <td>:</td>
            <td><?php echo $siswa->nama_program_keahlian?></td>
        </tr>
    </table>                            
</div>