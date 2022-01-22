<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($product,['type'=>'file', 'id'=>'frmCreate'])?>
            <div class="form-group">
                <?php echo $this->Form->label('Tên sản phẩm'); ?>
                <?php echo $this->Form->text('p_name',['class'=>'form-control','required'=>false]);?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('p_detail', ['type'=>'textarea','class'=>'form-control','required'=>false,'label' => 'Mô tả của sản phẩm']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Giá sản phẩm'); ?>
                <?php echo $this->Form->text('p_price', ['class'=>'form-control','required'=>false]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Trạng thái'); ?>
                <?php echo $this->Form->select('p_status', [1=>"Hiện", 0=>'Ẩn'], [
                    'empty' => '(Chọn trạng thái)',
                    'required'=>false             
                    ]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Thêm ảnh'); ?>
                <?php echo $this->Form->file('file',['class'=>'form-control']); ?>
            </div>
                <div class="pull-right">
                    <?php echo $this->Form->Button('Thêm sản phẩm',['class'=>'btn btn-primary']); ?>
                    <?php echo $this->Html->link('Quay lại', array('controller' => 'products', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                </div>
            <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>

<script>
    $().ready(function(){
        $('#frmCreate').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            ignore: [],
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
                    required: "Vui lòng viết mô tả",
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
<script>
  $(function () {
    CKEDITOR.replace('p_detail')
  })
</script>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>