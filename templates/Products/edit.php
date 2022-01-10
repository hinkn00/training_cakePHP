<div class="row">
    <div class="col-md-6 offset-md-4">
    <div class="card">
            <div class="card-header">
                <h1>Sửa sản phẩm <?= $name ?></h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create($product,['id'=>'frmEdit', 'type'=>'file'])?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <?php echo $this->Form->label('Name'); ?>
                    <?php echo $this->Form->text('p_name',['class'=>'form-control','value'=>$name]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Chi tiết sản phẩm'); ?>
                    <?php echo $this->Form->textarea('p_detail', ['class'=>'form-control','value'=>$detail]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Giá sản phẩm'); ?>
                    <?php echo $this->Form->text('p_price', ['class'=>'form-control', 'value'=> $price]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Trạng thái'); ?>
                    <?php echo $this->Form->select('p_status', [1=>"Hiện", 0=>'Ẩn'], [
                        'empty' => '(Chọn trạng thái)'              
                    ]); ?>
                </div>

                <div class="form-group" style="margin: 15px 0">
                    <h3><strong>Ảnh hiện tại</strong></h3>
                    <img src="../../upload/products/<?= $image?>" width="350">
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Thêm ảnh'); ?>
                    <?php echo $this->Form->file('file',['class'=>'form-control']); ?>
                </div>
                <?php echo $this->Form->Button('Cập nhật sản phẩm',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'products', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function(){
        var img = document.getElementById('img');

        img.src = URL.createObjectURL("upload/products/".<?= $image ?>);

        $('#frmEdit').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,

            rules:{
                "p_name" : {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                "p_detail" : {
                    required: true,
                },
                "p_price" : {
                    required: true,
                    number: true,
                },
                "p_status": {
                    required: true,
                },
                "file" : {
                    required: true,
                    extension: "png|jpg|jpeg"
                },
            },

            messages: {
                "p_name" : {
                    required: "Vui lòng nhập tên sản phẩm",
                    minlength: "Tên có độ dài tối thiểu 2 ký tự",
                    maxlength: "Tên có độ dài nhiều nhất 50 ký tự"
                },
                "p_detail" : {
                    required: "Vui lòng viết chi tiết sản phẩm",
                },
                "p_price" : {
                    required: "Vui lòng nhập giá",
                    number: "Giá chỉ có dạng số"
                },
                "p_status": {
                    required: "Vui lòng chọn trạng thái hiển thị",
                },
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