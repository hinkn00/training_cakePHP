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
                            <input type="text" name="q" id="q" class="form-control" placeholder="Nhập sản phẩm đã đặt ..."/>
                        </div>
                    </form>
                </div>
                <?= $this->Html->link('Thêm đơn hàng',['controller'=>'Users','action'=>'add'],['class'=>'btn btn-info pull-right'])?>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th><?= $this->Paginator->sort('Ảnh sản phẩm')?></th>
                        <th><?= $this->Paginator->sort('Tên sản phẩm')?></th>
                        <th><?=$this->Paginator->sort('Giá sản phẩm')?></th>
                        <th><?=$this->Paginator->sort('Số lượng')?></th>
                        <th><?=$this->Paginator->sort('Tình trạng')?></th>
                        <th><?= $this->Paginator->sort('Người đặt')?></th>
                        <th><?=$this->Paginator->sort('Ngày tạo')?></th>
                        <th width="160">Khác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($orders as $order):
                        ?>
                        <tr>
                        <?php foreach($products as $product):?>
                        <?php if($product->id == $order->id_product):?>
                        <td><?= $this->Html->image('upload/products/'.$product->p_image, ['alt' => 'CakePHP','width'=>'150']);?></td>
                        <td><?= $product->p_name ?></td>
                        <td><?= $product->p_price ?></td>
                        <?php endif?>
                        <?php endforeach?>
                        <td><?= $order->quantity ?></td>
                        <td>
                            <?php switch($order->o_status){
                                case 0:
                                    echo "Chưa xử lý";
                                    break;
                                case 1:
                                    echo "Đang giao";
                                    break;
                                case 2:
                                    echo "Đã giao";
                                    break;
                                case 3:
                                    echo "Đã hủy";
                                    break;
                                default: 
                                    echo "Chưa xử lý";
                                    break;
                                ?>
                            <?php }?>
                        </td>
                        <?php foreach($users as $user):?>
                        <?php if($user->id == $order->id_user):?>
                        <td><?= $user->u_name ?></td>
                        <?php endif?>
                        <?php endforeach?>
                        <?php if($order->create_at == null):?>
                        <td></td>
                        <?php else:?>
                        <td><?= $order->create_at->format('Y-m-d') ?></td>
                        <?php endif?>
                        <td>
                            <a href=<?php echo $this->URL->build(array('controller'=>'Orders','action' => 'edit', $order->id))?> class="btn btn-warning">Sửa</a>
                            <?= $this->Form->postLink(__('Xóa'), ['controller'=>'Orders','action' => 'delete', $order->id], ['confirm' => __('Bạn có muốn hủy đơn hàng này không?'), 'class' => 'btn btn-danger']) ?>
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

<script>
    $(document).ready(function() {
        $('#q').on('keyup', function(event) {
            event.preventDefault();
            /* Act on the event */
            var tukhoa = $(this).val().toLowerCase();
            $('#myTable tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
            });
        });
    });
</script>
