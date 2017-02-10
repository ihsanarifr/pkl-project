<div class="col-md-12">
    <table class="table table-striped">
        <tr>
            <td width="200">Pelaksanaan PKL</td>
            <td width="30">:</td>
            <td><?php echo TanggalIndo($prakerin_siswa->tanggal_mulai)?> s.d <?php echo TanggalIndo($prakerin_siswa->tanggal_selesai) ?></td>
        </tr>
        <tr>           
            <td width="100">Unit PKL</td>
            <td>:</td>
            <td><?php echo $prakerin_siswa->nama_unit ?></td>
        </tr>
        <tr>
            <td width="100">Pembimbing Sekolah</td>
            <td>:</td>
            <td><?php echo $prakerin_siswa->nama_pembimbing_sekolah?>/<?php echo $prakerin_siswa->nomor_pembimbing_sekolah ?> (<?php echo $prakerin_siswa->jabatan_pembimbing_sekolah ?>)</td>
        </tr>
        <tr>
            <td width="100">Pembimbing Unit</td>
            <td>:</td>
            <td><?php echo $prakerin_siswa->nama_pembimbing_unit ?>/<?php echo $prakerin_siswa->nip_pembimbing_unit?> (<?php echo $prakerin_siswa->jabatan_pembimbing?>)</td>
        </tr>
    </table>                            
</div>