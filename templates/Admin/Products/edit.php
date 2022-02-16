<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa sản phẩm: <small><?= $name?></small></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($product,['type'=>'file', 'id'=>'frmEdit'])?>
            <div class="form-group">
                <?php echo $this->Form->label('Tên sản phẩm'); ?>
                <?php echo $this->Form->text('p_name',['class'=>'form-control','required'=>false]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Mô tả của sản phẩm'); ?>
                <?php echo $this->Form->textarea('p_detail', ['class'=>'form-control','required'=>false]); ?>
                
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Giá sản phẩm'); ?>
                <?php echo $this->Form->text('p_price', ['class'=>'form-control','required'=>false]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Thể loại'); ?>
                <select name="category_id" id="category_id">
                    <option value="" disabled>Chọn thể loại</option>
                    <?php foreach($categories as $cate):?>
                        <option value="<?=$cate->id?>" <?php echo ($cate->id == $product->category_id?'selected':'')?> ><?= $cate->name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Trạng thái'); ?>
                <?php echo $this->Form->select('p_status', [1=>"Hiện", 0=>'Ẩn'], [
                    'empty' => '(Chọn trạng thái)',
                    'required'=>false             
                    ]); ?>
            </div>
            <div class="form-group" style="margin: 15px 0">
                <h3><strong>Ảnh hiện tại</strong></h3>
                <?= $this->Html->image('upload/products/'.$product->p_image, ['alt' => 'CakePHP','width'=>'150']);?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->label('Thêm ảnh'); ?>
                <?php echo $this->Form->file('file',['class'=>'form-control']); ?>
            </div>
                <div class="pull-right">
                    <?php echo $this->Form->Button('Cập nhật sản phẩm',['class'=>'btn btn-primary']); ?>
                    <?php echo $this->Html->link('Quay lại', array('controller' => 'products', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
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
                    required: "Vui lòng viết mô tả sản phẩm",
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