<p>
<?php
    // echo $this->Html->Link('Tải ảnh',['action'=>'upload'], ['class'=>'btn btn-primary']);
    session_start();
?>
</p>
<hr style="width: 25vw">
<h1 class="title text-center">Sản phẩm thuộc danh mục: <strong><?= $find_category->name?></strong></h1>
<hr style="width: 25vw">
<div class="row">
  <?php foreach($products as $product):?>
      <div class="col-sm-3">
      <?= $this->Form->create(null,[
        'controller'=>'Files',
        'action' => 'order',
        'id' => 'frmOrder'
      ])?>
        <div class="card" style="margin-bottom: 15px;">
          <?= $this->Html->image('upload/products/'.$product->p_image, ['alt' => 'CakePHP','width'=>'150']);?>
          <div class="card-body">
            <input type="hidden" name="id" value="<?=$product->id?>">
            <h5 class="card-title"><?=$product->p_name?></h5>
            <p class="card-text"><?=$product->p_detail?></p>
            <input type="number" name="quantity" min="1" id="quantity" value="1">
            <?php if(!isset($_SESSION['Auth'])):?>
              <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'login'])?>" class="btn btn-primary">Đặt hàng</a>
            <?php else:?>
              <a><button  class="btn btn-primary">Đặt hàng</button></a>
            <?php endif?>
          </div>
        </div>
      <?= $this->Form->end()?>
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
<ul class="pagination" style="justify-content: center;">
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
