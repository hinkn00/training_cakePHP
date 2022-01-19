<div class="row">
    <div class="col-md-6 offset-md-4">
    <div class="card">
            <div class="card-header">
                <h1>Thông tin của <?= $name ?></h1>
            </div>
            <div class="card-body">
                <?= $this->Form->create($user,['id'=>'frmEdit', 'type'=>'file'])?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <?php echo $this->Form->label('Tên người dùng'); ?>
                    <?php echo $this->Form->text('u_name',['class'=>'form-control','value'=>$name]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Địa chỉ Email'); ?>
                    <?php echo $this->Form->text('u_email', ['class'=>'form-control','value'=>$email]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Tình trạng'); ?>
                    <?php echo $this->Form->select('verified', [1=>"Đã xác nhận", 0=>'chưa xác nhận'], [
                        'empty' => '(Chọn trạng thái)'              
                    ]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->label('Quyền hạn'); ?>
                    <?php echo $this->Form->select('role', [1=>"Admin", 0=>'Guest'], [
                        'empty' => '(Chọn trạng thái)'              
                    ]); ?>
                </div>
                <?php echo $this->Form->Button('Cập nhật thông tin',['class'=>'btn btn-primary']); ?>
                <?php echo $this->Html->link('Quay lại', array('controller' => 'Users', 'action' => 'index', 'class'=>'btn btn-success')); ?>
                <?= $this->Form->end()?>
            </div>
        </div>
    </div>
</div>