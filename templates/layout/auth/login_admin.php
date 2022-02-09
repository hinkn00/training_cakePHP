<?=$this->element('admin/header')?>
<style type="text/css">
    body{
        background-color: #b2bec3 !important
    }
    .row{
        display:flex;
        position: relative;
        justify-content: center;
        top:30%;
        transform: translateY(-30%);
    }
    .card{
        padding: 10px;
        background-color: #dfe6e9 !important;
    }
</style>
<body>
    <?php
    echo $this->fetch('content');
    ?> 
</body>
<?= $this->Html->script(['jquery.validate.min','additional-methods.min'])?>
</html>

