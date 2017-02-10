
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/navbar-fixed-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url()?>assets/js/jquery-1.12.3.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    
    <?php if(isset($css))
    {
        for($i=0;$i<count($css);$i++)
        {
            echo '<link href="'.base_url().'assets/'.$css[$i].'.css" rel="stylesheet" />';
        }
    }
    ?>

    <?php if(isset($js)){
    for($i=0;$i<count($js);$i++){
      echo '<script type="text/javascript" src="'.base_url().'assets/'.$js[$i].'.js"></script>';
    } 
    }
    ?>
   

    <?php 
      if (isset($razorview)) {
          $this->load->view($razorview);
      }
    ?>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PKL Project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php $this->load->view('layouts/menu')?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="content">
        <?php $this->load->view($main) ?>
    </div>
  </body>
  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
      $('.datepicker').datepicker({
          format: "yyyy-mm-dd",
          language: "id",
          todayHighlight: true,
      });

      $('.timepicker').timepicker({
          defaultTime: 'value',
          minuteStep: 1,
          disableFocus: true,
          template: 'dropdown',
          showMeridian:false,
          use24hours: true
      });
  });
  </script>
</html>