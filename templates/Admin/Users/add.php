<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm người dùng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create(null,['type'=>'file', 'id'=>'frmRegister'])?>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php 
                            echo $this->Form->control('u_name', [
                                'type'=>'text',
                                'class'=>'form-control',
                                'autofocus',
                                'required'=>false,
                                'label'=>'Họ và tên'
                            ]);
                        ?>
                        <?php 
                            echo $this->Form->control('u_email', [
                                'type'=>'text',
                                'class'=>'form-control',
                                'required'=>false,
                                'label'=>'Email'
                            ]);
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php 
                            echo $this->Form->control('u_password', [
                                'type'=>'password',
                                'class'=>'form-control',
                                'required'=>false,
                                'label' => 'Mật khẩu'
                            ]); 
                        ?>
                        <?php 
                            echo $this->Form->control('re_password', [
                                'type'=>'password',
                                'class'=>'form-control',
                                'required'=>false,
                                'label' => 'Nhập lại mật khẩu'
                            ]); 
                        ?>
                    </div>
                </div>
                <div class="pull-right">
                    <?php echo $this->Form->Button('Thêm sản phẩm',['class'=>'btn btn-primary']); ?>
                    <?php echo $this->Html->link('Quay lại', array('controller' => 'users', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                </div>
            <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<script>
    $().ready(function(){
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $('#frmRegister').validate({
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
                "u_password" : {
                    required: true,
                    validatePassword: true,
                },
                "re_password": {
                    required: true,
                    equalTo: "#u-password"
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
                "u_password" : {
                    required: "Vui lòng nhập mật khẩu",
                },
                "re_password": {
                    required: "Vui lòng nhập lại mật khẩu",
                    equalTo: "Mật khẩu nhập lại không trùng khớp"
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