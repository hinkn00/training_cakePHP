<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Copyright &copy;</b> 2022
    </div>
      <strong>Website created by TungNT</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<?= $this->Html->script("admin/jquery-ui.min.js")?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<?= $this->Html->script("admin/bootstrap.min.js")?>

<!-- AdminLTE App -->
<?= $this->Html->script("admin/adminlte.min.js")?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php //echo $this->Html->script("admin/dashboard.js")?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('admin/ckeditor/ckeditor.js');?>
<?= $this->Html->script("admin/demo.js")?>
<?= $this->Html->script(['jquery.validate.min','additional-methods.min'])?>
</body>
</html>