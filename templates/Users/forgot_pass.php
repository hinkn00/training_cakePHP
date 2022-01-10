<div class="row">
    <div class="col-md-4 offset-md-4">
        <?=$this->Flash->render()?>
        <div class="card">
            <div class="card-header text-center">
                <h1>Lấy lại mật khẩu</h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create(null,[
                    'id'=>'frmForget',
                    'onsubmit'=>'return false'
                ])?>
                <?= $this->Form->control('Email',['class'=>'form-control mb-2', 'name'=>'email', 'autofocus'])?>
                <?= $this->Form->Button('Lấy lại mật khẩu',['class'=>'btn btn-primary mr-2'])?>
                <?php
                    echo $this->HTML->link("Đăng nhập", ['action'=>'login'],['class'=>'btn btn-info mr-1']);
                    echo $this->HTML->link("Đăng ký ngay", ['action'=>'add'],['class'=>'btn btn-success']);
                ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function(){
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $('#frmForget').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "email" : {
                    required: true,
                    email: true,
                    maxlength: 50,
                },
            },

            messages: {
                "email" : {
                    required: "Vui lòng nhập email",
                    email: 'Định dạng email không hợp lệ',
                    maxlength: "Email có độ dài nhiều nhất 50 ký tự"
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