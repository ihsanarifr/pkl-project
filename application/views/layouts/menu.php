<?php
if (!$this->ion_auth->logged_in())
{
?>
<ul class="nav navbar-nav">
<li class="active"><a href="<?php echo base_url();?>">Beranda</a></li>
<li><a href="#about">Tentang</a></li>
<li><a href="#contact">Kontak</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url() ?>auth/register"><i class="glyphicon glyphicon-user"></i> Mendaftar</a></li>
    <li><a href="<?php echo base_url() ?>auth/login"><i class="glyphicon glyphicon-log-out"></i> Masuk</a></li>
</ul>
<?php  
}
else
{
    if($this->ion_auth->is_admin())
    {
    ?>
    <!--Administrator-->
        <ul class="nav navbar-nav">
        <li <?php if($menu == 0){ echo 'class="active"'; }?> ><a href="<?php echo site_url('/')?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Data Siswa <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('data_siswa')?>">Biodata Siswa</a></li>
                <li><a href="<?php echo site_url('data_siswa/kegiatan_siswa')?>">Kegiatan PKL</a></li>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Referensi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('grup_user')?>">Group Users</a></li>
            <li><a href="<?php echo site_url('unit')?>">Unit</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('status_kehadiran')?>">Status Kehadiran</a></li>
            <li><a href="<?php echo site_url('kategori_penilaian')?>">Kategori Penilaian</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('program_keahlian')?>">Program Keahlian</a></li>
            <li><a href="<?php echo site_url('sekolah')?>">Sekolah</a></li>
            <li><a href="<?php echo site_url('kelas')?>">Kelas</a></li>
          </ul>
        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url() ?>profile"><i class="glyphicon glyphicon-user"></i> <?php echo $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name ?></a></li>
            <li><a href="<?php echo base_url() ?>auth/logout"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
        </ul>

    <?php
    }
    else if($this->ion_auth->in_group(2))
    {
    ?>
    <!--Members-->
    <ul class="nav navbar-nav">
        <li <?php if($menu == 0){ echo 'class="active"'; }?>><a href="<?php echo site_url('/')?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Input Kegiatan <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('rencana_kegiatan')?>"><i class="glyphicon glyphicon-pencil"></i> Rencana Kegiatan</a></li>
            <li><a href="<?php echo site_url('absensi')?>"><i class="glyphicon glyphicon-pencil"></i> Absensi</a></li>
            <li><a href="<?php echo site_url('log_kegiatan')?>"><i class="glyphicon glyphicon-pencil"></i> Log Kegiatan</a></li>
            <li><a href="<?php echo site_url('permasalahan_kerja')?>"><i class="glyphicon glyphicon-pencil"></i> Permasalahan Kerja</a></li>
            </ul>
        </li>
        <li <?php if($menu == 1){ echo 'class="active"'; }?>><a href="<?php echo site_url('penilaian')?>"><i class="glyphicon glyphicon-thumbs-up"></i>  Penilaian</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>profile/<?php echo $this->ion_auth->user()->row()->id ?>"><i class="glyphicon glyphicon-user"></i> <?php echo $this->ion_auth->user()->row()->first_name ?></a></li>
        <li><a href="<?php echo base_url() ?>auth/logout"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
    </ul>
    <?php
    }
    else if($this->ion_auth->in_group(3))
    {
    ?>
    <!--Pembimbing-->
    <ul class="nav navbar-nav">
        <li <?php if($menu == 0){ echo 'class="active"'; }?>><a href="<?php echo site_url('/')?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
        <li <?php if($menu == 1){ echo 'class="active"'; }?>><a href="<?php echo site_url('data_siswa')?>"><i class="glyphicon glyphicon-thumbs-up"></i>  Data Siswa</a></li>
        <li <?php if($menu == 2){ echo 'class="active"'; }?>><a href="<?php echo site_url('penilaian')?>"><i class="glyphicon glyphicon-thumbs-up"></i>  Penilaian</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>profile/<?php echo $this->ion_auth->user()->row()->id ?>"><i class="glyphicon glyphicon-user"></i> <?php echo $this->ion_auth->user()->row()->first_name ?></a></li>
        <li><a href="<?php echo base_url() ?>auth/logout"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
    </ul>
    <?php
    }
    else
    {
    ?>
    <!--Guru/Dari Pihak Sekolah-->
    <?php
    }
}
?>