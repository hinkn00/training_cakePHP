<div class="row">
    <div class="col-md-4 offset-md-4">
        <?=$this->Flash->render()?>
        <div class="card">
            <div class="card-header text-center"><h1>Đăng nhập</h1></div>
            <div class="card-body">
            <?php
                echo $this->Form->create(null,['id'=>'frmLogin', 'onsubmit'=>'return false']);
            ?>
            <div class="form-group">
                <?php 
                    echo $this->Form->control('Email', ['name'=>'u_email', 'id'=>'yEmail', 'class'=>'form-control'])
                ?>
            </div>
            <div class="form-group">
                <?php 
                    echo $this->Form->control('Mật khẩu', ['name'=>'u_password', 'type' => 'password', 'id'=>'yPassword', 'class'=>'form-control'])
                ?>
            </div>
            <?php
                echo $this->Form->Button('Đăng nhập',['class'=>'btn btn-primary mr-3']);
                // echo $this->Html->link("Đăng ký ngay", ['action'=>'add'],['class'=>'btn btn-success']);
                // echo $this->Html->link("Lấy lại mật khẩu", ['action'=>'forgotPass'],['class'=>'btn btn-info ml-3']);
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
        $('#frmLogin').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "u_email" : {
                    required: true,
                    email: true,
                    maxlength: 50,
                },
                "u_password" : {
                    required: true,
                },
            },

            messages: {
                "u_email" : {
                    required: "Vui lòng nhập email",
                    email: 'Định dạng email không hợp lệ',
                },
                "u_password" : {
                    required: "Vui lòng nhập mật khẩu",
                },
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