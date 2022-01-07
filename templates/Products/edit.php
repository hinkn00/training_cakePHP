<div class="row">
    <div class="col-md-6 offset-md-4">
    <div class="card">
            <div class="card-header">
                <h1>Sửa sản phẩm <?= $name ?></h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create($product)?>
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
                <div class="form-group">
                    <?= $this->Form->date('created_at',[
                        'value' => $created_at
                    ])?>
                </div>
                <?php echo $this->Form->Button('Cập nhật sản phẩm',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'products', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>