<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
            <?= $this->Form->create(null,[
                    'id'=>'frmUploads',
                    'type' => 'file',
                    'onsubmit' => 'return false'
                ])?>
            <div class="form-group">
                <?= $this->Form->file('file', ['class'=>'form-control'])?>
            </div>
            <?= $this->Form->Button('Tải ảnh',['class'=>'btn btn-primary'])?>
            <?= $this->Html->Link('Quay lại',['action'=>'index'],['class'=>'btn btn-success'])?>
            <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function(){
        $('#frmUploads').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "file" : {
                    required: true,
                    extension: "png|jpg|jpeg"
                },
            },

            messages: {
                "file" : {
                    required: "Vui lòng chọn file png hoặc jpg hay jpeg",
                    extension: "Chỉ nhập file có dạng jpg/jpeg/png"
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