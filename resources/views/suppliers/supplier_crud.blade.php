@extends('layouts.admin_template')

@section('content')

<!-- Modal prod Adding Form -->
@include('partials.add_supp_modal')
@include('partials.edit_supp_modal')


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
                <h2 style="color:#000;">Suppliers Page</h2>      
             </div>
         </div>


       <!-- /. ROW  -->
        <hr />
               <div class="prod_crud_menu">

                <!--<a href="{{-- url('add_product') --}}" class="btn btn-primary add-prod-btn"><i class="glyphicon glyphicon-plus"></i> Add Product</a>-->
        
                <a href="{{-- url('add_supplier') --}}" class="btn btn-default add-supp-btn active"><i class="glyphicon glyphicon-plus"></i> Add Supplier</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default edit-supp-btn active"><i class="glyphicon glyphicon-edit"></i> Edit Supplier</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default delete-supp-btn active"><i class="glyphicon glyphicon-trash"></i> Delete Supplier</a>
                <a href="{{ url('exportSupplier') }}" id="export-supplier-id" class="btn btn-success active"><i class="glyphicon glyphicon-download"></i> Export to Excel</a>
               
               </div>

        

 <hr>
        
 <table id="table-supp-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Supplier Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>TIN</th>
                <th style="display:none;">Date Created</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($suppliers as $val)
          
           <tr class="tbl-supp-row">
             <td><input type='checkbox'<?php //echo (($user_level == $admin_text) ? "" : 'disabled=disabled'); ?> style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='radio_check_all prod-id-checkbox' value="{{ $val->id }}"></td>
             <td>{{ $val->name }}</td>
             <td>{{ $val->address }}</td>
             <td>{{ $val->contact_number }}</td>
             <td>{{ $val->TIN }}</td>
             <td style="display:none;">{{ $val->created_at }}</td>
           </tr>

        @endforeach
            
        </tbody>

    </table>




    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection