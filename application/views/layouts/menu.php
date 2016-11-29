<?php
if (!$this->ion_auth->logged_in())
{
?>
<ul class="nav navbar-nav">
<li class="active"><a href="#">Beranda</a></li>
<li><a href="#about">Tentang</a></li>
<li><a href="#contact">Kontak</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url() ?>auth/register">Mendaftar ?</a></li>
    <li><a href="<?php echo base_url() ?>auth/login">Masuk</a></li>
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
        <li class="active"><a href="#">Beranda</a></li>
        <li><a href="#about">Data Siswa</a></li>
        <li><a href="#contact">Data Nilai</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url() ?>profile"><?php echo $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name ?></a></li>
            <li><a href="<?php echo base_url() ?>auth/logout">Keluar</a></li>
        </ul>
    <?php
    }
    else if($this->ion_auth->in_group('2'))
    {
    ?>
    <!--Members-->
    <?php
    }
    else if($this->ion_auth->in_group('3'))
    {
    ?>
    <!--Pembimbing-->
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