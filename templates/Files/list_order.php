<div class="row">
    <div class="col-md-3">
        <h3>Danh sách đã đặt</h3>
    </div>
    <div class="col-md-6">
        <input type="text" name="q" id="q" class="form-control" placeholder="Nhập sản phẩm đã đặt ..."/>
    </div>
    <div class="col-md-3 text-right">
        <a href=<?= $this->Url->build(array('controller'=>'Files','action' => 'index'))?> class="btn btn-primary">Xem thêm sản phẩm</a>
    </div>
    <table class="table table-bordered table-stripped mt-2" id="myTable">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Ảnh sản phẩm')?></th>
            <th><?= $this->Paginator->sort('Tên sản phẩm')?></th>
            <th><?=$this->Paginator->sort('Giá sản phẩm')?></th>
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
                    <td><img src="../upload/products/<?= $product->p_image?>" width="150" alt=""></td>
                    <td><?= $product->p_name ?></td>
                    <td><?= $product->p_price ?></td>
                <?php endif?>
            <?php endforeach?>
            <?php if($_SESSION['Auth']['User']['id'] == $order->id_user):?>
                <td><?= $_SESSION['Auth']['User']['u_name'] ?></td>
            <?php endif?>
            <?php if($order->create_at == null):?>
                <td></td>
            <?php else:?>
                <td><?= $order->create_at->format('Y-m-d') ?></td>
            <?php endif?>
            <td>
                <!-- <a href=<?php //echo $this->URL->build(array('controller'=>'Files','action' => 'edit', $order->id))?> class="btn btn-warning">Sửa</a> -->
                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $order->id], ['confirm' => __('Bạn có muốn xóa sản phẩm "{0}" không?', $order->id), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
</div>

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
