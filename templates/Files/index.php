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
                <div class="card-title">
                    <h4><?= $file->name?></h4>
                </div>
            </div>

        </div>
    </div>
    <?php }?>
</div>