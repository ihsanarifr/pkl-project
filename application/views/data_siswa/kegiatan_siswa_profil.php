<div class="col-md-12">
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
    </table>                            
</div>