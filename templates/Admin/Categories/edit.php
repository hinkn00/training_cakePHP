<script>    
    $().ready(function(){   
        $('#frmEdit').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            ignore: [],
            rules:{
                "name" : {
                    required: true,
                },
                "slug" : {
                    required: true,
                },
                "description" : {
                    required: true,
                },
            },

            messages: {
                "name" : {
                    required: "Vui lòng nhập tên danh mục",
                },
                "slug" : {
                    required: "Vui lòng viết tên không dấu",
                },
                "description" : {
                    required: "Vui lòng nhập mô tả",
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
        })
    })
</script>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa sản phẩm: <large style="color:blue"><?= $category->name?></large></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Form->create($category,['type'=>'file', 'id'=>'frmEdit'])?>
            <?php
                     echo $this->Form->control('name',array(
                        'label'=>"Tên danh mục",
                        'id'=>'cate_name',
                        "class" => 'form-control',
                        "onkeyup" => 'ChangeToSlug()'
                    ));
                    echo $this->Form->control('slug',array(
                        'label'=>'Tên không dấu',
                        'class'=>"form-control",
                        'id' => "cate_slug"
                    ));
                    echo $this->Form->control('description', array(
                        "label" => 'Mô tả',
                        "type"=>'textarea',
                        'class'=>'form-control',
                    ));
                ?>
                <div style="margin: 15px 5px 0">
                    <div class="pull-right">
                        <?php echo $this->Form->Button('Cập nhật danh mục',['class'=>'btn btn-primary']); ?>
                        <?php echo $this->Html->link('Quay lại', array('controller' => 'categories', 'action' => 'index'),['class'=>'btn btn-warning']); ?>
                    </div>
                </div>
            <?= $this->Form->end()?>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<style>
    .error{
        margin-left:5px;
        color: red;
        font-size: 12px;
    }
</style>
<script>
    $(function () {
        CKEDITOR.replace('description')
    })
    function ChangeToSlug()
{
    var title, slug;

    //Lấy text từ thẻ input title 
    title = document.getElementById("cate_name").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('cate_slug').value = slug;
}
</script>