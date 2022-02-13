<section class="content-header">
<h1>
    Quản lý
    <small>danh mục</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Quản lý danh mục</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Danh sách hiện có</h3>
                <div class="box-tools" style=" width:100%; display:flex; justify-content: center">
                    <form action="<?php echo $this->Url->build(['action'=>'search',])?>" method="get">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="q" class="form-control pull-right" id="q" placeholder="Nhập tên danh mục...">
                            <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?= $this->Html->link('Thêm danh mục',['controller'=>'Categories','action'=>'add'],['class'=>'btn btn-info pull-right'])?>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <?= $this->Form->create(null,[
                    'onsubmit'=>'return false',
                    "id"=>"deleteAll",
                    'action' => ''
                    ])?>
                <input type="hidden" name="_method" value="DELETE" />
                <?= $this->Form->Button('Xóa sản phẩm đã chọn',['class'=>'btn btn-danger'])?>
                <?= $this->Form->end()?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="selectall"></th>
                            <th><?= $this->Paginator->sort('ID') ?></th>
                            <th><?= $this->Paginator->sort('Tên danh mục') ?></th>
                            <th><?= $this->Paginator->sort('Tên không dấu') ?></th>
                            <th><?= $this->Paginator->sort('Mô tả') ?></th>
                            <th><?= $this->Paginator->sort('Ngày tạo') ?></th>
                            <th><?= __('Khác') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><input type="checkbox" class="selectbox" name="ids[]" value="<?= $category->id ?>" id=""></td>
                            <td><?= $this->Number->format($category->id) ?></td>
                            <td><?= h($category->name) ?></td>
                            <td><?= h($category->slug) ?></td>
                            <td><?= html_entity_decode(h($category->description)) ?></td>
                            <td><?= isset($category->created_at)?h($category->created_at->format('Y-m-s g:i A') ):''?></td>
                            <td>
                                <a href=<?= $this->URL->build(array('controller'=>'Categories','action' => 'edit', $category->id))?> class="btn btn-warning">Sửa</a>
                                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $category->id], ['confirm' => __('Bạn có muốn xóa sản phẩm "{0}" không?', $category->name), 'class' => 'btn btn-danger']) ?>
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
                        'nextDisabled' => '<li class="page-item"></li>'
                    ]);
                    ?>
                <div style="margin-right:20px">
                    <ul class="pagination" style="width:100%; display:flex; justify-content: flex-end;">
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
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
