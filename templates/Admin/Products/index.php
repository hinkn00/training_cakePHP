<section class="content-header">
<h1>
    Quản lý
    <small>Phần điều khiển</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Quản lý sản phẩm</li>
</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Quản lý sản phẩm</h3>
                <div class="box-tools" style=" width:100%; display:flex; justify-content: center">
                    <form action="<?php echo $this->Url->build(['action'=>'search',])?>" method="get">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="q" class="form-control pull-right" id="q" placeholder="Nhập tên sản phẩm...">
                            <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?= $this->Html->link('Thêm sản phẩm',['controller'=>'Products','action'=>'add'],['class'=>'btn btn-info pull-right'])?>
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
                            <th><?= $this->Paginator->sort('Ảnh sản phẩm')?></th>
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
                            <td><input type="checkbox" class="selectbox" name="ids[]" value="<?= $product->id ?>" id=""></td>
                            <td style="width:200px"><?= $this->Html->image('upload/products/'.$product->p_image, ['alt' => 'CakePHP','width'=>'150']);?></td>
                            <td><?= $product->p_name?></td>
                            <td><?= $product->p_detail?></td>
                            <td><?= $product->p_price?></td>
                            <?php if($product->p_status == 1):?>
                            <td>
                            <p>Hiện</p>
                            </td>
                            <?php elseif($product->p_status == 0):?>
                            <td>
                            <p>Ẩn</p>
                            </td>
                            <?php endif?>
                            <?php if($product->created_at == null):?>
                            <td></td>
                            <?php else:?>
                            <td><?= $product->created_at->format('Y-m-d') ?></td>
                            <?php endif?>
                            <td>
                            <a href=<?= $this->URL->build(array('controller'=>'Products','action' => 'edit', $product->id))?> class="btn btn-warning">Sửa</a>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $product->id], ['confirm' => __('Bạn có muốn xóa sản phẩm "{0}" không?', $product->p_name), 'class' => 'btn btn-danger']) ?>
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

<script type="text/javascript">
    $(".selectall").click(function(){
        $('.selectbox').prop('checked',$(this).prop('checked'));
    })
    $('.selectbox').click(function() {
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if(total == number){
            $('.selectall').prop('checked',true);
        }else{
            $('.selectall').prop('checked',false);
        }
    })

    $('#deleteAll button').click(function() {
        let count = $('.selectbox:checked').length;
        let ids = [];
        $('.selectbox:checked').each(function(){
            ids.push($(this).val())
        })
        if(count == 0){
            $('.message').removeClass('hidden');
            $('.message').addClass('error').html("Hãy chọn ít nhất 1 sản phẩm");

            setTimeout(() => {
                $('.message').removeClass('error').html("");
                $('.message').addClass('hidden');
            }, 3000);
        } else{
            if(confirm("Bạn có muốn xóa các sản phẩm này không?"))
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrfToken"]').attr('content')
                    },
                    url: 'admin/products/delete-selected',
                    type:'DELETE',
                    data: { "ids": ids },
                    success: function(data) {
                        $('.message').removeClass('hidden');
                        $('.message').addClass('success').html('Xóa các sản phẩm thành công');
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                });
            }
        }
    })
</script>
