<div class="row">
    <div class="col-md-3">
        <h3>Danh sách đã đặt</h3>
    </div>
    <div class="col-md-6">
        <form action="<?php echo $this->Url->build(['action'=>'search',])?>" method="get">
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
        <a href=<?= $this->Url->build(array('controller'=>'Files','action' => 'index'))?> class="btn btn-primary">Xem thêm sản phẩm</a>
    </div>
</div>