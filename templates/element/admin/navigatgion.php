<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
   <li class="header">Menu</li>
   <li class="active">
      <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
   </li>
   <li>
      <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'index'])?>">
      <i class="fa fa-th"></i> <span>Quản lý danh mục</span>
      </a>
   </li>
   <li>
      <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'index'])?>">
      <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
      </a>
   </li>
   <li>
      <a href="<?=$this->Url->build(['controller'=>'Users','action'=>'index'])?>">
      <i class="fa fa-users"></i> <span>Quản lý người dùng</span>
      </a>
   </li>
   <li>
      <a href="<?=$this->Url->build(['controller'=>'Orders','action'=>'index'])?>">
      <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
      </a>
   </li>
   <li class="treeview">
      <a href="#">
      <i class="fa fa-laptop"></i>
      <span>UI Elements</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
         <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
         <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
         <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
         <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
         <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
         <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
      </ul>
   </li>
</ul>