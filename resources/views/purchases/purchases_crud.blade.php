
@extends('layouts.admin_template')
@section('content')

<!-- Modal prod Adding Form -->
       
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
             <div class="col-md-12">
                <h2 style="color:#000;">Purchases Page</h2>
             </div>
         </div>

        <hr/>

         <div class="po-menu">
          <a style="font-weight:normal;" href="{{ url('purchaseorders') }}"  class="btn btn-default btn-view_po active"><i class="glyphicon glyphicon-eye-open"></i> Back to Purchase Order Page</a>
         </div>

        <hr/>
        
    <table id="table-purchases-contents" class="display" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>#</th>
                <th>P.O. #</th>
                <th>Date Created</th>
                <th></th>
            </tr>
        </thead>
       
        <tbody>
       

        @foreach($allPurchases as $val)

           <tr class="tbl-prod-row">
             <td>{{ $val->purchase_orders->id }}</td>
             <td>{{ $val->purchase_orders->po_code }}</td>
             <td>{{ $val->purchase_orders->created_at }}</td>
             <td>    
                    <a href="{{ url('validatedpurchase').'/'.$val->purchase_orders->id }}" class="btn btn-success square-btn-adjust active"> 
                          Validated
                    </a>    
             </td>
           </tr>

        @endforeach
            
        </tbody>

    </table>

    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection

