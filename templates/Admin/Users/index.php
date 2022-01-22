<section class="content-header">
<h1>
    Quản lý
    <small>Phần điều khiển</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Quản lý người dùng</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Quản lý người dùng</h3>
                <div class="box-tools" style=" width:100%; display:flex; justify-content: center">
                    <form action="<?php echo $this->Url->build(['action'=>'search'])?>" method="get">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="q" class="form-control pull-right" id="q" placeholder="Nhập tên sản phẩm...">
                            <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?= $this->Html->link('Thêm người dùng',['controller'=>'Users','action'=>'add'],['class'=>'btn btn-info pull-right'])?>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('Họ và tên')?></th>
                            <th><?= $this->Paginator->sort('Email')?></th>
                            <th><?=$this->Paginator->sort('Token')?></th>
                            <th><?=$this->Paginator->sort('Trạng thái')?></th>
                            <th><?=$this->Paginator->sort('Level')?></th>
                            <th><?=$this->Paginator->sort('Ngày tạo')?></th>
                            <th width="160">Khác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($users as $user):
                        ?>
                        <tr>
                            <td><?= $user->u_name?></td>
                            <td><?= $user->u_email?></td>
                            <td><?= $user->u_token?></td>
                            <?php if($user->verified == 1):?>
                                <td>Đã xác nhận</td>
                            <?php else:?>
                                <td>Chưa xác nhận</td>
                            <?php endif?>
                            <?php if($user->role == 1):?>
                                <td>Admin</td>
                            <?php else:?>
                                <td>Thường</td>
                            <?php endif?>
                            <?php if($user->created_at == null):?>
                                <td></td>
                            <?php else:?>
                                <td><?= $user->created_at->format('Y-m-d') ?></td>
                            <?php endif?>
                            <td>
                                <a href=<?= $this->URL->build(array('controller'=>'Users','action' => 'edit', $user->id))?> class="btn btn-warning">Sửa</a>
                                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $user->id], ['confirm' => __('Bạn có muốn xóa sản phẩm "{0}" không?', $user->u_name), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <?php
                    $paginator = $this->Paginator->setTemplates([
                        'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</li>',
                        'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</li>',
                        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
                        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
                        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
                        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt;</a></li>',
                        'nextDisabled' => '<li class="page-item"><a></a></li>'
                    ]);
                    ?>
                <ul class="pagination" style="width:100%; display:flex; justify-content: flex-end">
                    <?php
                        echo $paginator->first();
                        if($paginator->hasPrev()){
                            echo $paginator->prev();
                        }
                        echo $paginator->numbers();
                        if(!empty($paginator->next())){
                            echo $paginator->next();
                        }
                        echo $paginator->last();
                        ?>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>