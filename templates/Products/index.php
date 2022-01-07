<div class="row">
    <div class="col-md-3">
        <h3>Quản lý sản phẩm</h3>
    </div>
    <div class="col-md-6">
        <form action="<?php echo $this->URL->build(['action'=>'search',])?>" method="get">
            <div class="input-group">
                <input type="text" name="q" id="q" class="form-control" placeholder="Nhập tên sản phẩm ..."/>
                <div class="iput-group-prepend">
                    <button class="btn btn-primary input-group-text" type="submit">
                        Tìm kiếm
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right">
        <a href=<?= $this->URL->build(array('controller'=>'Products','action' => 'add'))?> class="btn btn-primary">Thêm sản phẩm</a>
    </div>
</div>

<table class="table table-bordered table-stripped mt-2">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id')?></th>
            <th><?= $this->Paginator->sort('Tên sản phẩm')?></th>
            <th><?=$this->Paginator->sort('Chi tiết')?></th>
            <th><?=$this->Paginator->sort('Giá sản phẩm')?></th>
            <th><?=$this->Paginator->sort('Trạng thái')?></th>
            <th><?=$this->Paginator->sort('Ngày tạo')?></th>
            <th width="160">Khác</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($products as $product):
        ?>
        <tr>
            <td><?= $product->id?></td>
            <td><?= $product->p_name?></td>
            <td><?= $product->p_detail?></td>
            <td><?= $product->p_price?></td>
            <?php if($product->p_status == 1):?>
                <td><p>Hiện</p></td>
            <?php elseif($product->p_status == 0):?>
                <td><p>Ẩn</p></td>
            <?php endif?>
            <?php if($product->created_at == null):?>
                <td></td>
            <?php else:?>
                <td><?= $product->created_at->format('Y-m-d') ?></td>
            <?php endif?>
            <td>
                <a href=<?= $this->URL->build(array('controller'=>'Products','action' => 'edit', $product->id))?> class="btn btn-warning">Sửa</a>
                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $product->id], ['confirm' => __('Bạn có muốn xóa sản phẩm "{0}" không?', $product->id), 'class' => 'btn btn-danger']) ?>
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
