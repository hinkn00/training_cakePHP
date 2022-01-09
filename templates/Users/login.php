<div class="row">
    <div class="col-md-4 offset-md-4">
        <?=$this->Flash->render()?>
        <div class="card">
            <div class="card-header text-center">Đăng nhập</div>
            <div class="card-body">
            <?php
                echo $this->Form->create();
            ?>
            <div class="form-group">
                <?php 
                    echo $this->Form->control('Email', ['name'=>'email', 'id'=>'yEmail', 'class'=>'form-control'])
                ?>
            </div>
            <div class="form-group">
                <?php 
                    echo $this->Form->control('Mật khẩu', ['name'=>'password', 'type' => 'password', 'id'=>'yPassword', 'class'=>'form-control'])
                ?>
            </div>
            <?php
                echo $this->Form->Button('Đăng nhập',['class'=>'btn btn-primary mr-3']);
                echo $this->HTML->link("Đăng ký ngay", ['action'=>'add'],['class'=>'btn btn-success']);
                echo $this->Form->end();
            ?>
            </div>
        </div>
    </div>
</div>