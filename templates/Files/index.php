<p>
<?php
    echo $this->Html->Link('Tải ảnh',['action'=>'upload'], ['class'=>'btn btn-primary']);
?>
</p>

<div class="row">
    <?php
        foreach($files as $file){
    ?>
    <div class="col-md-3 offset-md-3">
        <div class="card">
            <img src="<?= $file->path;?>" alt="" class="card-img-top">
            <div class="card-body">    
                <h4 class="card-title"><?= $file->name?></h4>

                <?php
                    echo $this->Html->link('Download',['action'=>'download', $file->id],['class'=>'btn btn-primary']);
                    echo $this->Html->link('Xóa',['action'=>'delete', $file->id],['class'=>'btn btn-danger ml-2']);
                ?>
            </div>

        </div>
    </div>
    <?php }?>
</div>