<div class="row">
    <div class="col-md-6 offset-md-4">
        <div class="card">
            <div class="card-header">
                <h1>Thêm sản phẩm</h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create($product)?>
                <div class="form-group">
                    <?php echo $this->Form->label('Tên sản phẩm'); ?>
                    <?php echo $this->Form->text('p_name',['class'=>'form-control','required'=>false]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Chi tiết sản phẩm'); ?>
                    <?php echo $this->Form->textarea('p_detail', ['class'=>'form-control','required'=>false]); ?>
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
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Trạng thái');?>
                    <input type="date" name="created_at" id="created_at">
                </div>

                <?php echo $this->Form->Button('Thêm sản phẩm',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'products', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>