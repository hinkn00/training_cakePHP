<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?= $this->Html->css("admin/bootstrap.min.css")?>
  <!-- Font Awesome -->
  <?= $this->Html->css("admin/font-awesome/css/font-awesome.min.css")?>
  <!-- Ionicons -->
  <?php //echo $this->Html->css("admin/bower_components/Ionicons/css/ionicons.min.css")?>
  <!-- Theme style -->
  <?=$this->Html->css("admin/AdminLTE.min.css")?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?=$this->Html->css("admin/_all-skins.min.css")?>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
    <?= $this->Html->script("admin/jquery.min.js")?>
</head>