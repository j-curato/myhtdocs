<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
        
 <table id="table-supp-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>TIN</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($suppliers as $val)
          
           <tr class="tbl-supp-row">
             <td>{{ $val->name }}</td>
             <td>{{ $val->address }}</td>
             <td>{{ $val->contact_number }}</td>
             <td>{{ $val->TIN }}</td>
           </tr>

        @endforeach
            
        </tbody>

    </table>

   </div>            <!-- /. PAGE INNER  -->
  </div>
 </body>
</html>
        
