@extends('layouts.admin_template')

@section('content')

<!-- Modal prod Adding Form -->
@include('partials.addprodpharma_modal')
@include('partials.editProdPharma_modal')
@include('partials.po_modal')
        
<div id="page-wrapper" >
    <div id="page-inner">

    @if(session()->has('message'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 style="color:#000;"><span style="font-weight:bold;">Message: </span>{{ session()->get('message') }}</h4>
        </div>
    @endif
    
        <div class="row">
             <div class="col-md-12">
                <h2 style="color:#000;">Product Registration Page - Pharma</h2>     
                <span style="display:none;" id="pageTxt">Pharma</span>  
             </div>
         </div>

       <!-- /. ROW  -->
        <hr />
               <div class="prod_crud_menu">

                <?php $pendingpo_counter = App\PurchaseOrder\PurchaseOrder::where('add_toInventory_status', 0)->count(); ?>

                <a style="font-weight:normal;" href="{{-- url('add_product') --}}" class="btn btn-default add-prodpharma-btn active"><i class="glyphicon glyphicon-plus"></i> Add Product</a>
                <a style="font-weight:normal;" href="{{-- url('add_product') --}}" class="btn btn-default edit-prod-btn active"><i class="glyphicon glyphicon-edit"></i> Edit Product</a>
                <button style="font-weight:normal;" id="create-po" class="btn btn-default active"><i class="glyphicon glyphicon-plus"></i> Create Purchase Order</button>
                <a style="font-weight:normal;" href="{{ url('purchaseorders') }}"  class="btn btn-default btn-view_po active" ><i class="glyphicon glyphicon-eye-open"></i> View Purchase Orders <span style="background:#fff;color:red;" class="badge">{{$pendingpo_counter}}</span></a>
                <a style="font-weight:normal;" href="{{ url('inventory') }}"  class="btn btn-default btn-load_updates active" ><i class="glyphicon glyphicon-eye-open"></i> View Inventory</a>
                <a style="font-weight:normal;" href="{{ url('exportProductPharma') }}" class="btn btn-success btn-export-prod active" id="export-prodPharma-id"><i class="glyphicon glyphicon-download"></i> Export to Excel</a>
               
              
                <div style="float:right;">
                  <a href="{{url('pharma')}}" class="btn btn-success btn-xs disabled">Pharma</a>    
                  <a href="{{url('products')}}" class="btn btn-success btn-xs active">Medical & Lab. Supplies</a>
                </div>  
                
               </div>

 <hr>
 
 <table id="table-prodpharma-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th style="display:none;"></th>
                <th style="display:none;"></th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Date Added</th>
                <th>Purchase Order Indicator</th>
            </tr>
        </thead>
       
        <tbody>
  
        @foreach($products as $val)

        <?php //$quantity[$i++] = $val->id; ?>

           <tr class="tbl-prod-row">
             <td><input type='checkbox' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='radio_check_all prod-id-checkbox' value="{{ $val->id }}"></td>
             <td style="display:none;">{{ $val->id }}</td>
             <td style="display:none;">{{ $val->category }}</td>
             <td>{{ $val->pharmaceutical }}</td>
             <td>{{ $val->description }}</td>
             <td>{{ $val->type }}</td>
             <td>{{ $val->unit }}</td>
             <td>{{ $val->price }}</td>
             <td>{{ $val->created_at }}</td>
             <td>
             <?php 
                for($i = 0; $i < count($val->inventory); $i++){  
                if($val->inventory[$i]->total_qty <= 50)  { ?>
                    <span style="color:#C00"><?php echo $val->inventory[$i]->total_qty.' -'; ?></span>
              <?php  }else{ ?>
                    <span style="color:#25A602"><?php echo $val->inventory[$i]->total_qty.' -'; ?></span>
               <?php } } ?>
                 
             </td> 
            

            </tr>

        @endforeach
            
        </tbody>

    </table>
  </div>            <!-- /. PAGE INNER  -->
 </div>
        
@endsection