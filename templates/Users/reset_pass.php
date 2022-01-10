<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header"><h1>Đặt lại mật khẩu</h1></div>
            <div class="card-body">
            <div class="card-body">
                <?= $this->Form->create(null,[
                    'id'=>'frmReset',
                    'onsubmit' => 'return false'
                ])?>
                <?= $this->Form->control('Mật khẩu mới',['type'=>'password','id'=>'password','class'=>'form-control', 'name'=>'password', 'autofocus'])?>
                <?= $this->Form->control('Nhập lại mật khẩu',['type'=>'password','class'=>'form-control mb-2', 'name'=>'re_pass', 'autofocus'])?>
                <?= $this->Form->Button('Đặt mật khẩu',['class'=>'btn btn-primary mr-2'])?>
                <?= $this->Form->end()?>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
     $().ready(function(){
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $('#frmReset').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "password" : {
                    required: true,
                    validatePassword: true,
                },
                "re_pass": {
                    required: true,
                    equalTo: "#password"
                }
            },

            messages: {
                "password" : {
                    required: "Vui lòng nhập mật khẩu",
                },
                "re_pass": {
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