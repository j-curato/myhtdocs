  <div id="wrapper">
  
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
               <a class="navbar-brand" href="{{ url('/') }}">
                    <i>Pro Medical Solutions</i>
                </a> 
            </div>

            <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"> Logged-in user : {{ Auth::user()->name }} &nbsp; <a href="{{ url('/logout') }}" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                

            </div>


        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
            <li class="text-center">
                        <img src="{{ asset('promed_admin/assets/img/pms.jpg') }}" class="user-image img-responsive"/>
            </li>
                    <li>
                        <a  class="<?php echo ( Request::segment(1) == "home" ? "active-menu" : ""); ?>" href="{{ url('home') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($products) ? "active-menu" : ""); ?>" href="{{ url('products') }}"><i class="fa fa-bars fa-3x"></i> Products</a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($purchaseOrders) ? "active-menu" : ""); ?>" href="{{ url('purchaseorders') }}"><i class="fa fa-edit fa-3x"></i> Purchase Orders </a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($allPurchases) ? "active-menu" : ""); ?>" href="{{ url('purchases') }}"><i class="glyphicon glyphicon-shopping-cart fa-3x"></i> Purchases </a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($inventory) ? "active-menu" : ""); ?>" href="{{ url('inventory') }}"><i class="glyphicon glyphicon-search fa-3x"></i> Inventory </a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($invoices) ? "active-menu" : ""); ?>" href="{{ url('invoices') }}"><i class="glyphicon glyphicon-list fa-3x"></i> Sales Invoice </a>
                    </li>

                    <li >
                        <a  class="<?php echo (isset($sales) ? "active-menu" : ""); ?>" href="{{ url('sales') }}"><i class="glyphicon glyphicon-usd fa-3x"></i> Sales </a>
                    </li>

                    <li>
                        <a  class="<?php echo (isset($clients) ? "active-menu" : ""); ?>" href="{{ url('clients') }}"><i class="fa fa-user fa-3x"></i> Clients</a>
                    </li>

                     <li>
                        <a  class="<?php echo (isset($suppliers) ? "active-menu" : ""); ?>" href="{{ url('supplier') }}"><i class="fa fa-user fa-3x"></i> Suppliers</a>
                    </li>

                    <li>
                        <a  class="<?php echo (isset($agents) ? "active-menu" : ""); ?>" href="{{ url('agents') }}"><i class="fa fa-user fa-3x"></i> Agents</a>
                    </li>

                    <li >
                        <a  class="" href="{{ '#' }}"><i class="fa fa-user fa-3x"></i>  Users</a>
                    </li>  
                    
                </ul>
            </div>
        </nav>    
    