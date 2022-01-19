<!DOCTYPE html>
<html lang="en">
<head>
<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title><?= $title?></title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <?= $this->Html->script(['jquery.min'])?>
    <?= $this->Html->css(['bootstrap.min','client/main'])?>
    <?= $this->fetch('meta') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" style="padding-left:15px" href="#">CakePHP<a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Files','action'=>'index'])?>">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Files','action'=>'listOrder'])?>">Sản phẩm đã đặt</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['Auth']['User'])):?>
                <div class="dropdown">
                    <a class="dropdown-toggle mr-sm-3 mt-sm-2" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['Auth']['User']['u_name'];?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <hr>
                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout'])?>">Đăng xuất</a>
                    </div>
                </div>
            <?php else:?>
                <div>
                    <?= $this->Html->link('Đăng nhập',['controller'=>'Users','action'=>'login'],['style'=>'color: rgba(0,0,0,.9);  text-decoration: none;'])?>
                    <?= $this->Html->link('Đăng ký',['controller'=>'Users','action'=>'register'],['style'=>'color: rgba(0,0,0,.9);  text-decoration: none; margin:0 10px'])?>
                </div>
            <?php endif?>
        </div>
    </nav>
    <main>
        <div class="container-fluid">
            <?= $this->Flash->render()?>
            <?= $this->fetch('content')?>
        </div>
    </main>
    <footer>
    </footer>
   <?= $this->Html->script(['client/bootstrap.min','client/popper.min','client/jquery-3.2.1.slim.min.js','jquery.validate.min','additional-methods.min'])?>
</body>
</html>