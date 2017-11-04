@extends('layouts.admin_template')

@section('content')

<!-- Modal prod Adding Form -->
@include('partials.clients_modal')
@include('partials.edit_client_modal')


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
                <h2 style="color:#000;">Client Dashboard</h2>      
             </div>
         </div>

       <!-- /. ROW  -->
        <hr />
               <div class="prod_crud_menu">

                <!--<a href="{{-- url('add_product') --}}" class="btn btn-primary add-prod-btn"><i class="glyphicon glyphicon-plus"></i> Add Product</a>-->
        
                <a href="{{-- url('add_client') --}}" id="create-client-details" class="btn btn-default add-supp-btn active"><i class="glyphicon glyphicon-plus"></i> Add Client</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default edit-client-btn active"><i class="glyphicon glyphicon-edit"></i> Edit Client</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default delete-supp-btn active"><i class="glyphicon glyphicon-trash"></i> Delete Client</a>
                <a href="{{ url('exportClient') }}" id="export-client-id" class="btn btn-success btn-export-client active"><i class="glyphicon glyphicon-download"></i> Export to Excel</a>
               
               </div>

              

 <hr>
        
 <table id="table-clients-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Client Name</th>
                <th>TIN</th>
                <th>Client Address</th>
                <th>Business style</th>
                <th>Terms/P.O</th>
                <th>OSCA/PWD ID No.</th>
                <th style="display:none;">Date Created</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($clients as $val)
          
           <tr class="tbl-clients-row">
             <td><input type='checkbox' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='prod-id-checkbox' value="{{ $val->id }}"></td>
             <td>{{ $val->client_name }}</td>
             <td>{{ $val->TIN }}</td>
             <td>{{ $val->client_address }}</td>
             <td>{{ $val->business_style }}</td>
             <td>{{ $val->terms }}</td>
             <td>{{ $val->osca_pwd_id }}</td>
             <td style="display:none;">{{ $val->created_at }}</td>
           </tr>

        @endforeach
            
        </tbody>

    </table>




    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection