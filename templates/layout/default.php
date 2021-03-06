<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>
        <?php //$cakeDescription ?>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->script(['jquery.min'])?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake','bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/admin') ?>"><span>Admin</span></a>
        </div>
        <div class="top-nav-links">
        <?php 
            if(!empty($_SESSION['Auth']['User'])):
        ?>
        <?= $this->HTML->Link('Quản lý sản phẩm',['controller'=>'Products','action'=>'index'])?>
        <?= $this->HTML->Link('Quản lý đơn hàng',['controller'=>'Orders','action'=>'index'])?>
        <?= $this->HTML->Link('Quản lý Users',['controller'=>'Users','action'=>'index'])?>
        <?= $this->HTML->Link('Đăng xuất',['controller'=>'Users','action'=>'logout'])?>
        <?php //else:?>
            <?php //echo $this->HTML->Link('Đăng ký',['controller'=>'Users','action'=>'register'])?>
            <?php //echo $this->HTML->Link('Đăng nhập',['controller'=>'Users','action'=>'login'])?>
        <?php endif;?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <div class="message hidden"></div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    
    <?= $this->Html->script(['jquery.validate.min','additional-methods.min'])?>
</body>
</html>
