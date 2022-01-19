<div class="row">
    <div class="col-md-6 offset-md-4">
    <div class="card">
            <div class="card-header">
                <h1>Sửa đơn hàng có mã <?= $order->id ?></h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create($order,['id'=>'frmEdit', 'type'=>'file'])?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <?php echo $this->Form->label('Số lượng'); ?>
                    <?php echo $this->Form->number('quantity',['class'=>'form-control','value'=>$quantity]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Trạng thái'); ?>
                    <?php echo $this->Form->select('o_status', [3=>"Đã hủy",2=>"Đã giao",1=>"Đang giao", 0=>'Chưa xử lý'], [
                        'empty' => '(Chọn trạng thái)'              
                    ]); ?>
                </div>
                <?php echo $this->Form->Button('Cập nhật sản phẩm',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'Orders', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>