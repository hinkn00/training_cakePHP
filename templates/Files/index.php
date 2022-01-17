<p>
<?php
    // echo $this->Html->Link('Tải ảnh',['action'=>'upload'], ['class'=>'btn btn-primary']);
?>
</p>
<h1>Danh sách sản phẩm</h1>
<br>
<div class="row">
    <?php foreach($products as $product):?>
  <div class="col-sm-3">
    <div class="card" style="margin-bottom: 15px;">
        <img class="card-img-top" height="150px" width="150px" src="./upload/products/<?= $product->p_image?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?=$product->p_name?></h5>
        <p class="card-text"><?=$product->p_detail?></p>
        <?php if(!isset($_SESSION['Auth']['user'])):?>
          <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'login'])?>" class="btn btn-primary">Đặt hàng</a>
        <?php else:?>
          <a href="<?= $this->Url->build(['controller'=>'Files','action'=>'upload', $product->id])?>" class="btn btn-primary">Đặt hàng</a>
        <?php endif?>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
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
</div>