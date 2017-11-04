<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
        
 <table id="table-agents-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Agent Address</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($agents as $val)
          
           <tr class="tbl-agents-row">
             <td>{{ $val->fname }}</td>
             <td>{{ $val->lname }}</td>
             <td>{{ $val->sex }}</td>
             <td>{{ $val->age }}</td>
             <td>{{ $val->address }}</td>
             <td>{{ $val->contact_num }}</td>
             <td>{{ $val->date_of_birth }}</td>
           </tr>

        @endforeach
            
        </tbody>

    </table>

   </div>            <!-- /. PAGE INNER  -->
  </div>
 </body>
</html>
        