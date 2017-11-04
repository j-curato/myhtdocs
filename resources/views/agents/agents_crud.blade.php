@extends('layouts.admin_template')

@section('content')

<!-- Modal prod Adding Form -->
@include('partials.agent_modal')
@include('partials.edit_agent_modal')


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
                <h2 style="color:#000;">Agent Dashboard</h2>      
             </div>
         </div>

       <!-- /. ROW  -->
        <hr />
               <div class="prod_crud_menu">

                <!--<a href="{{-- url('add_product') --}}" class="btn btn-primary add-prod-btn"><i class="glyphicon glyphicon-plus"></i> Add Product</a>-->
        
                <a href="{{-- url('add_client') --}}" id="add-agent-btn" class="btn btn-default add-agent-btn active"><i class="glyphicon glyphicon-plus"></i> Add Agent</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default edit-agent-btn active"><i class="glyphicon glyphicon-edit"></i> Edit Agent</a>
                <a href="{{-- url('add_product') --}}" class="btn btn-default delete-supp-btn active"><i class="glyphicon glyphicon-trash"></i> Delete Agent</a>
                <a href="{{ url('exportAgents') }}" id="export-agent-id" class="btn btn-success active"><i class="glyphicon glyphicon-download"></i> Export to Excel</a>
               
               </div>

 <hr>
        
 <table id="table-agents-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th style="display:none;">Agent ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Agent Address</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
                <th style="display:none;">Date Created</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($agents as $val)
          
           <tr class="tbl-agents-row">
             <td><input type='checkbox'style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='prod-id-checkbox' value="{{ $val->id }}"></td>
             <td style="display:none;">{{ $val->id }}</td>
             <td>{{ $val->fname }}</td>
             <td>{{ $val->lname }}</td>
             <td>{{ $val->sex }}</td>
             <td>{{ $val->age }}</td>
             <td>{{ $val->address }}</td>
             <td>{{ $val->contact_num }}</td>
             <td>{{ $val->date_of_birth }}</td>
             <td style="display:none;">{{ $val->created_at }}</td>
           </tr>

        @endforeach
            
        </tbody>

    </table>




    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection