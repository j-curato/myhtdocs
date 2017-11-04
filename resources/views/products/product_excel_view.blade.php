<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
        
 <table id="table-prod-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
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
             <td>{{ $val->pharmaceutical }}</td>
             <td>{{ $val->description }}</td>
             <td>{{ $val->type }}</td>
             <td>{{ $val->unit }}</td>
             <td>{{ $val->price }}</td>
             <td>{{ $val->created_at }}</td>
             <td>
             <?php 
                for( $i = 0; $i < count($val->inventory); $i++ ){  
                if( $val->inventory[$i]->total_qty <= 50 )  { ?>
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
 </body>
</html>