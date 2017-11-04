<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>    
 <table id="table-clients-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>TIN</th>
                <th>Client Address</th>
                <th>Business style</th>
                <th>Terms/P.O</th>
                <th>OSCA/PWD ID No.</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($clients as $val)
          
           <tr class="tbl-clients-row">
             <td>{{ $val->client_name }}</td>
             <td>{{ $val->TIN }}</td>
             <td>{{ $val->client_address }}</td>
             <td>{{ $val->business_style }}</td>
             <td>{{ $val->terms }}</td>
             <td>{{ $val->osca_pwd_id }}</td>
           </tr>

        @endforeach
            
        </tbody>

     </table>

   </div>            <!-- /. PAGE INNER  -->
  </div>
 </body>
</html>