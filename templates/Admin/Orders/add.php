<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm đơn hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($order,['id'=>'frmEdit', 'type'=>'file'])?>
                <div class="form-group">
                    <?php echo $this->Form->label('Sản phẩm'); ?>
                    <select name="id_product" id="id_product" style = "fone-size: 20px">
                        <?php foreach($products as $product):?>
                            <option value="<?= $product->id?>"><?= "Tên: ".$product->p_name . " - Giá:" . $product->p_price ." VND"?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Người đặt'); ?>
                    <select name="id_user" id="id_user" style = "fone-size: 20px">
                        <?php foreach($users as $user):?>
                            <option value="<?= $user->id?>"><?= "Tên: ".$user->u_name . " -- Email: " . $user->u_email?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Số lượng'); ?>
                    <?php echo $this->Form->number('quantity',['class'=>'form-control','min'=>1, 'value'=>'1','style'=>'font-size:20px; width:50px']); ?>
                </div>
                <div style="float-right">
                    <?php echo $this->Form->Button('Thêm đơn hàng',['class'=>'btn btn-primary']); ?>
                    <?php echo $this->Html->link('Quay lại', array('controller' => 'Orders', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                </div>
            <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>