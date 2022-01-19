<div class="row">
    <div class="col-md-6 offset-md-4">
    <div class="card">
            <div class="card-header">
                <h1>Thêm đơn hàng</h1>
            </div>
            <div class="card-body">
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
                    <?php echo $this->Form->label('Sản phẩm'); ?>
                    <select name="id_user" id="id_user" style = "fone-size: 20px">
                        <?php foreach($users as $user):?>
                            <option value="<?= $user->id?>"><?= "Tên: ".$user->u_name . " -- Email: " . $user->u_email?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Số lượng'); ?>
                    <?php echo $this->Form->number('quantity',['class'=>'form-control','min'=>1, 'value'=>'1','style'=>'font-size:20px']); ?>
                </div>
                <?php echo $this->Form->Button('Thêm đơn hàng',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'Orders', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>