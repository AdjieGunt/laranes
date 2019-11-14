<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel hide">
        <div class="pull-left image">
          <img src="{{ asset("bower_components/admin-lte/dist/img/user2-160x160.jpg") }}"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form hide">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="/customers"><i class="fa fa-user"></i> <span>Customer</span></a></li>
        <li ><a href="/products"><i class="fa fa-bars"></i> <span>Product Master</span></a></li>
        
        
        
        <li class="treeview menu-open">
          <a href="#"><i class="fa fa-cart-plus"></i> <span>Sell In</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li {{{ Request::is('sell_in') ? 'class=active' : '' }}} ><a href="{{ url("/sell_in") }}"><i class="fa fa-save"></i><span>Sell In</span></a></li>
            <li {{{ Request::is('sell_in_list') ? 'class=active' : '' }}} ><a href="{{ url("/sell_in_list") }}"><i class="fa fa-list"></i><span>Sell In List</span></a></li>
            <!-- <li><a href="/sell_in_list"><i class="fa fa-list"></i><span>Sell In List Detail</span></a></li>             -->
          </ul>
        </li>

        <li class="treeview menu-open">
          <a href="#"><i class="fa fa-cart-arrow-down"></i> <span>Sell Out</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li {{{ Request::is('sell_out') ? 'class=active' : '' }}} ><a href="{{ url("/sell_out") }}"><i class="fa fa-external-link"></i><span>Sell Out</span></a></li>
            <li {{{ Request::is('sell_out_list') ? 'class=active' : '' }}} ><a href="{{ url("/sell_out_list") }}"><i class="fa fa-list"></i><span>Sell Out List</span></a></li>
            <!-- <li><a href="/sell_in_list"><i class="fa fa-list"></i><span>Sell In List Detail</span></a></li>             -->
          </ul>
        </li>

        <li {{{ Request::is('stock') ? 'class=active' : '' }}}><a href="{{ url("/stock") }}"><i class="fa fa-database"></i> <span>Info Stock</span></a></li>
        <li ><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  