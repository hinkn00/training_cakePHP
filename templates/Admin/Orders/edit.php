<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa đơn hàng có mã <?= $order->id ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($order,['id'=>'frmEdit', 'type'=>'file'])?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <?php echo $this->Form->label('Số lượng'); ?>
                    <?php echo $this->Form->number('quantity',['class'=>'form-control','value'=>$quantity,'style'=>'width:60px']); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Trạng thái'); ?>
                    <?php echo $this->Form->select('o_status', [3=>"Đã hủy",2=>"Đã giao",1=>"Đang giao", 0=>'Chưa xử lý'], [
                        'empty' => '(Chọn trạng thái)'              
                    ]); ?>
                </div>
                <?php echo $this->Form->Button('Cập nhật sản phẩm',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'Orders', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>