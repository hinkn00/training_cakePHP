<div class="row">
    <div class="col-md-3">
        <h3>Quản lý người dùng</h3>
    </div>
    <div class="col-md-6">
        <form action="<?php echo $this->Url->build(['action'=>'search',])?>" method="get">
            <div class="input-group">
                <input type="text" name="q" id="q" class="form-control" placeholder="Nhập tên người dùng ..."/>
                <div class="iput-group-prepend">
                    <button class="btn btn-primary input-group-text" type="submit">
                        Tìm kiếm
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right">
        <a href=<?= $this->Url->build(array('controller'=>'Users','action' => 'add'))?> class="btn btn-primary">Thêm người dùng</a>
    </div>
</div>


<table class="table table-bordered table-stripped mt-2">
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
<ul class="pagination">
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