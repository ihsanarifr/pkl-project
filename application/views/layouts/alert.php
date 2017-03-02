<?php 
if($this->session->flashdata('status') and $this->session->flashdata('message') != null){
?>
<div class="alert alert-<?php echo $this->session->flashdata('status') ?>">
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php
}
?>