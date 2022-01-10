<div class="row">
    <div class="col-md-6 offset-md-4">
        <?= $this->Flash->render() ?>
        <div id="message"></div>
        <div class="card">
            <h3 class="card-header">Đăng ký tài khoản</h3>
            <div class="card-body">
                <?php
                    echo $this->Form->create(null, ['id'=>'frmRegister', 'onsubmit'=>'return false']);
                ?>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Họ tên người dùng', ['name'=>'name', 'id'=>'yName','class'=>'form-control','autofocus']);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Email', ['name'=>'email', 'id'=>'yEmail', 'class'=>'form-control'])
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Mật khẩu', ['name'=>'password', 'type' => 'password', 'id'=>'yPassword', 'class'=>'form-control'])
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Nhập lại mật khẩu', ['name'=>'re-password', 'type' => 'password', 'id'=>'yRePassword', 'class'=>'form-control'])
                    ?>
                </div>
                <div class="text-center">
                    <?php
                        echo $this->Form->Button('Đăng ký',['class'=>'btn btn-primary']);
                        echo $this->HTML->link("Đăng nhập", ['action'=>'login'],['class'=>'btn btn-success ml-3']);
                    ?>
                </div>
                <?php
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>

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
                "name" : {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                "email" : {
                    required: true,
                    email: true,
                    maxlength: 50,
                },
                "password" : {
                    required: true,
                    validatePassword: true,
                },
                "re-password": {
                    required: true,
                    equalTo: "#yPassword"
                }
            },

            messages: {
                "name" : {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Tên có độ dài tối thiểu 2 ký tự",
                    maxlength: "Tên có độ dài nhiều nhất 50 ký tự"
                },
                "email" : {
                    required: "Vui lòng nhập email",
                    email: 'Định dạng email không hợp lệ',
                    maxlength: "Email có độ dài nhiều nhất 50 ký tự"
                },
                "password" : {
                    required: "Vui lòng nhập mật khẩu",
                },
                "re-password": {
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