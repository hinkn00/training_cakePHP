<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thông tin của: <small><?= $name?></small></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($user,['id'=>'frmEdit', 'type'=>'file'])?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->label('Tên người dùng'); ?>
                        <?php echo $this->Form->text('u_name',['class'=>'form-control','value'=>$name, 'required'=>false]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->label('Địa chỉ Email'); ?>
                        <?php echo $this->Form->text('u_email', ['class'=>'form-control','value'=>$email, 'required'=>false]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->label('Tình trạng'); ?>
                        <?php echo $this->Form->select('verified', [1=>"Đã xác nhận", 0=>'chưa xác nhận'], [
                            'empty' => '(Chọn trạng thái)'
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->label('Quyền hạn'); ?>
                        <?php echo $this->Form->select('role', [1=>"Admin", 0=>'Guest'], [
                            'empty' => '(Chọn trạng thái)'
                        ]); ?>
                    </div>
                </div>
                <div class="pull-right">
                    <?php echo $this->Form->Button('Cập nhật thông tin',['class'=>'btn btn-primary']); ?>
                    <?php echo $this->Html->link('Quay lại', array('controller' => 'Users', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                </div>
            <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<script>
    $().ready(function(){
        $('#frmEdit').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "u_name" : {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                "u_email" : {
                    required: true,
                    email: true,
                    maxlength: 50,
                },
                "verified" : {
                    required: true,
                },
                "role": {
                    required: true,
                }
            },

            messages: {
                "u_name" : {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Tên có độ dài tối thiểu 2 ký tự",
                    maxlength: "Tên có độ dài nhiều nhất 50 ký tự"
                },
                "u_email" : {
                    required: "Vui lòng nhập email",
                    email: 'Định dạng email không hợp lệ',
                    maxlength: "Email có độ dài nhiều nhất 50 ký tự"
                },
                "verified" : {
                    required: "Vui lòng chọn trạng thái",
                },
                "role": {
                    required: "Vui lòng phân quyền cho tài khoản",
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
        })
    })
</script>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>