<div class="row">
    <div class="col-md-6 offset-md-4">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Đăng ký tài khoản</h3>
            <div class="card-body">
                <?php
                    echo $this->Form->create(null, ['id'=>'frmRegister', 'onsubmit' => 'return false']);
                ?>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Họ tên người dùng', ['name'=>'name', 'id'=>'yName','class'=>'form-control','autofocus']);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Email', ['name'=>'email', 'id'=>'yEmail', 'class'=>'form-control'])
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                        echo $this->Form->control('Password', ['name'=>'password', 'type' => 'password', 'id'=>'yPassword', 'class'=>'form-control'])
                    ?>
                </div>
                <?php
                    echo $this->Form->Button('Đăng ký');
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>