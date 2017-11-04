    <script src="{{ asset('promed_admin/assets/js/jquery-1.10.2.js') }}"></script>
     
    <script src="{{ asset('promed_admin/assets/js/jquery-1.12.0.min.js') }}"></script>

    <script src="{{ asset('promed_admin/assets/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('promed_admin/assets/js/bootstrap_latest.js') }}"></script>

    <script src="{{ asset('promed_admin/assets/js/dataTables/moment.min.js') }}"></script>

    <script src="{{ asset('promed_admin/assets/js/dataTables/datetime-moment.js') }}"></script>

    <script src="{{ asset('promed_admin/assets/js/sweetalert-master/dist/sweetalert.min.js') }}"></script>

    
    <script type="text/javascript">

    var arrayVar = [];
    var arrayVarPurchases = [];
    var arrayVarSales = [];
    var totalArray = [];
    var totalArrayPurchases = [];
    var totalArraySales = [];
    var totalInt;
    var totalIntPurchases;
    var totalIntSales;
    var freight_charge = 0;
    var purchase_fcharge = 0;
    var overall_total;
    var overall_totalPurchases;
    var overall_totalSales;
    var data;
    var dataPurchases;
    var dataSales;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".alert-success").hide();

            $(function(){

              $.fn.dataTable.moment('YYYY-MM-DD hh:ii:ss');
              //$.fn.dataTable.moment('dd/mm/YYY hh:ii:ss');
               
              $('#table-prod-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [8] } 
                    ],"order": [[ 8, 'desc' ]] 
              });

              $('#table-prodpharma-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [8] } 
                    ],"order": [[ 8, 'desc' ]] 
              });

              $('#table-inv-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [7] } 
                    ],"order": [[ 7, 'desc' ]] 
              });

              $('#table-invoices-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [10] } 
                    ],"order": [[ 10, 'desc' ]] 
              });

              $('#table-sales-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [11] } 
                    ],"order": [[ 11, 'desc' ]] 
              });
            
              $('#table-po-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [2] } 
                    ],"order": [[ 2, 'desc' ]] 
              });

              $('#table-purchases-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [2] } 
                    ],"order": [[ 2, 'desc' ]] 
              });


              $('#table-supp-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [5] } 
                    ],"order": [[ 5, 'desc' ]]
              });


               $('#table-clients-contents').dataTable({
                  "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                  columnDefs : [ 
                    { type : 'date', targets : [7] } 
                    ],"order": [[ 7, 'desc' ]]
              });


               $('#table-agents-contents').dataTable({
                "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                 columnDefs : [ 
                    { type : 'date', targets : [9] } 
                    ],"order": [[ 9, 'desc' ]]
              });


               $('#table-payments-contents').dataTable({
                "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                 columnDefs : [ 
                    { type : 'date', targets : [5] } 
                    ],"order": [[ 5, 'desc' ]]
              });



              $.get("{{ url('getpoCurrID') }}", function(data){
                var json = JSON.parse(data);  
                //document.getElementsByClassName("po-code").value = json.notify;
                var x = document.getElementsByClassName("po-code");
                x[0].innerHTML = x[0].innerHTML + (json.notify + 1);

              });

              // Refresh page when Inactive
               /*var time = new Date().getTime();
               $(document.body).bind("mousemove keypress", function(e) {
                   time = new Date().getTime();
               });

               function refresh() {
                   if(new Date().getTime() - time >= 60000) 
                       window.location.reload(true);
                   else 
                       setTimeout(refresh, 10000);
               }

               setTimeout(refresh, 10000);*/

           });


            $(function(){

                $('#tbl-po-list').on( 'keyup change', 'input[type="number"]' ,function(){

                     $(this).parents('.info').find('.total').val($(this).val() * $(this).parents('.info').find('.price').val());

                     data = {

                       id: $(this).parents('.info').find('.prod-id').val(),
                       qty: $(this).val(),
                       unit: $(this).parents('.info').find('.pro-unit').text(),
                       pharma: $(this).parents('.info').find('.pro-pharmaceutical').text(),
                       pharmaDesc: $(this).parents('.info').find('.pro-desc').text(),
                       packaging: $(this).parents('.info').find('.pro-packaging').val(),
                       price: $(this).parents('.info').find('.price').val(),
                       total: $(this).parents('.info').find('.total').val()

                    }


                   for(var i = 0; i < arrayVar.length && arrayVar[i].id !== data.id; i++);
                       arrayVar[i] = data;
                       totalArray[i] = data.total;

 
                       totalInt = totalArray.map(Number);
                       overall_total = totalInt.reduce(function(a,b){return a + b});
                       console.log(overall_total);

                       document.getElementById("overall-total").value = overall_total + freight_charge;

                });   


               $('#tbl-po-list').on( 'keyup change', 'input[type="text"]:not(#freight-charge-id)' ,function(){

                      $(this).parents('.info').find('.po-Qty').val(0);

                      data = {

                         id: $(this).parents('.info').find('.prod-id').val(),
                         qty: 0,
                         unit: $(this).parents('.info').find('.pro-unit').text(),
                         pharma: $(this).parents('.info').find('.pro-pharmaceutical').text(),
                         pharmaDesc: $(this).parents('.info').find('.pro-desc').text(),
                         packaging: $(this).parents('.info').find('.pro-packaging').val(),
                         price: $(this).parents('.info').find('.price').val(),
                         total: $(this).parents('.info').find('.total').val()

                       }


                       for(var i = 0; i < arrayVar.length && arrayVar[i].id !== data.id; i++);
                           arrayVar[i] = data;
                           totalArray[i] = data.total;
                   
               });



              $('#tbl-purchase-list').on( 'keyup change', 'input[type="number"]' ,function(){

                    $(this).parents('.tr-purchase').find('.purchase-total').val($(this).val() * $(this).parents('.tr-purchase').find('.po-price').val());
                 
                     dataPurchases = {

                       po_id: $("#purchase_order_id").val(),
                       prod_id: $(this).parents('.tr-purchase').find('.prod-id').text(),
                       purchasesID: $(this).parents('.tr-purchase').find('.purchase-ID').text(),
                       po_qty: $(this).parents('.tr-purchase').find('.po-qty').text(),
                       addon_qty: $(this).parents('.tr-purchase').find('.purchase-addon-qty').val(),
                       purchase_qty: $(this).val(),
                       purchase_packaging: $(this).parents('.tr-purchase').find('.purchase-packaging').val(),
                       purchase_lot: $(this).parents('.tr-purchase').find('.purchase-lot').val(),
                       purchase_xpiryDate: $(this).parents('.tr-purchase').find('.purchase-xpiryDate').val(),
                       po_price: $(this).parents('.tr-purchase').find('.po-price').val(),
                       po_total: $(this).parents('.tr-purchase').find('.po-total').text(),
                       purchase_total: $(this).parents('.tr-purchase').find('.purchase-total').val()
                      
                    }

                  
                   for(var i = 0; i < arrayVarPurchases.length && arrayVarPurchases[i].prod_id !== dataPurchases.prod_id; i++);
                       arrayVarPurchases[i] = dataPurchases;
                       totalArrayPurchases[i] = dataPurchases.purchase_total;

 
                       console.log(arrayVarPurchases);
                       totalIntPurchases = totalArrayPurchases.map(Number);
                       overall_totalPurchases = totalIntPurchases.reduce(function(a,b){return a + b});

                       document.getElementById("overall-totalPurchases").value = overall_totalPurchases + parseFloat($("#purchase-freight-charge").val());

               
                });



              $('#tbl-purchase-list').on( 'keyup change', 'input[type="text"]:not(#purchase-freight-charge)' ,function(){

                    $(this).parents('.tr-purchase').find('.purchase-qty').val("");

                    dataPurchases = {

                       po_id: $("#purchase_order_id").val(),
                       prod_id: $(this).parents('.tr-purchase').find('.prod-id').text(),
                       purchasesID: $(this).parents('.tr-purchase').find('.purchase-ID').text(),
                       po_qty: $(this).parents('.tr-purchase').find('.po-qty').text(),
                       addon_qty: $(this).parents('.tr-purchase').find('.purchase-addon-qty').val(),
                       purchase_qty: "",
                       purchase_packaging: $(this).parents('.tr-purchase').find('.purchase-packaging').val(),
                       purchase_lot: $(this).parents('.tr-purchase').find('.purchase-lot').val(),
                       purchase_xpiryDate: $(this).parents('.tr-purchase').find('.purchase-xpiryDate').val(),
                       po_price: $(this).parents('.tr-purchase').find('.po-price').val(),
                       po_total: $(this).parents('.tr-purchase').find('.po-total').text(),
                       purchase_total: $(this).parents('.tr-purchase').find('.purchase-total').val()
                      
                    }

                  
                   for(var i = 0; i < arrayVarPurchases.length && arrayVarPurchases[i].prod_id !== dataPurchases.prod_id; i++);
                       arrayVarPurchases[i] = dataPurchases;
                       totalArrayPurchases[i] = dataPurchases.purchase_total;
               
                });


              $('#tbl-purchase-list').on( 'keyup change', 'input[type="date"]' ,function(){

                    $(this).parents('.tr-purchase').find('.purchase-qty').val("");

                    dataPurchases = {

                       po_id: $("#purchase_order_id").val(),
                       prod_id: $(this).parents('.tr-purchase').find('.prod-id').text(),
                       purchasesID: $(this).parents('.tr-purchase').find('.purchase-ID').text(),
                       po_qty: $(this).parents('.tr-purchase').find('.po-qty').text(),
                       addon_qty: $(this).parents('.tr-purchase').find('.purchase-addon-qty').val(),
                       purchase_qty: "",
                       purchase_packaging: $(this).parents('.tr-purchase').find('.purchase-packaging').val(),
                       purchase_lot: $(this).parents('.tr-purchase').find('.purchase-lot').val(),
                       purchase_xpiryDate: $(this).parents('.tr-purchase').find('.purchase-xpiryDate').val(),
                       po_price: $(this).parents('.tr-purchase').find('.po-price').val(),
                       po_total: $(this).parents('.tr-purchase').find('.po-total').text(),
                       purchase_total: $(this).parents('.tr-purchase').find('.purchase-total').val()
                      
                    }

                  
                   for(var i = 0; i < arrayVarPurchases.length && arrayVarPurchases[i].prod_id !== dataPurchases.prod_id; i++);
                       arrayVarPurchases[i] = dataPurchases;
                       totalArrayPurchases[i] = dataPurchases.purchase_total;

                });



              $('#tbl-sales-list').on( 'keyup change', 'input[type="number"]' ,function(){
    
                 $(this).parents('.tr-salesInvoice').find('.sales-amount').val($(this).val() * $(this).parents('.tr-salesInvoice').find('.sales-unitPrice').val());
                 
                 var val1 = $(this).val();
                 var val2 = parseInt($(this).parents('.tr-salesInvoice').find('.sales-inventory-quantity').text());

                 if( val1 > val2 ){
                    $(this).val("");
                    swal("Not enough quantity. Only "+val2+" is available", "")
                 }else{

                     dataSales = {

                       sales_inv_id: $(this).parents('.tr-salesInvoice').find('.sales-inv-id').text(),
                       sales_prod_id: $(this).parents('.tr-salesInvoice').find('.sales-product-id').text(),
                       sales_po_id: $(this).parents('.tr-salesInvoice').find('.sales-po-id').text(),
                       sales_purchase_id: $(this).parents('.tr-salesInvoice').find('.sales-purchase-id').text(),
                       sales_lot: $(this).parents('.tr-salesInvoice').find('.sales-lot').text(),
                       sales_expiry_date: $(this).parents('.tr-salesInvoice').find('.sales-expiry-date').text(),
                       sales_type: $(this).parents('.tr-salesInvoice').find('.sales-type').text(),
                       sales_pharma: $(this).parents('.tr-salesInvoice').find('.sales-pharma').text(),
                       sales_qty: $(this).val(),
                       sales_unit: $(this).parents('.tr-salesInvoice').find('.sales-unit').text(),
                       sales_unitPrice: $(this).parents('.tr-salesInvoice').find('.sales-unitPrice').val(),
                       sales_amount: $(this).parents('.tr-salesInvoice').find('.sales-amount').val(),
                       actual_inv_quantity: val2
                      
                    }

                  
                   for(var i = 0; i < arrayVarSales.length && arrayVarSales[i].sales_inv_id !== dataSales.sales_inv_id; i++);
                       arrayVarSales[i] = dataSales;
                       totalArraySales[i] = dataSales.sales_amount;

 
                       console.log(arrayVarSales);
                       totalIntSales = totalArraySales.map(Number);
                       overall_totalSales = totalIntSales.reduce(function(a,b){return a + b});

                       document.getElementById("total-amountDue").value = overall_totalSales;       

                  }
                     
                });



                $('#tbl-sales-list').on( 'keyup change', 'input[type="text"]' ,function(){

                       $(this).parents('.tr-salesInvoice').find('.sales-prodQty').val(0);
                
                       dataSales = {

                         sales_inv_id: $(this).parents('.tr-salesInvoice').find('.sales-inv-id').text(),
                         sales_prod_id: $(this).parents('.tr-salesInvoice').find('.sales-product-id').text(),
                         sales_po_id: $(this).parents('.tr-salesInvoice').find('.sales-po-id').text(),
                         sales_purchase_id: $(this).parents('.tr-salesInvoice').find('.sales-purchase-id').text(),
                         sales_lot: $(this).parents('.tr-salesInvoice').find('.sales-lot').text(),
                         sales_expiry_date: $(this).parents('.tr-salesInvoice').find('.sales-expiry-date').text(),
                         sales_type: $(this).parents('.tr-salesInvoice').find('.sales-type').text(),
                         sales_pharma: $(this).parents('.tr-salesInvoice').find('.sales-pharma').text(),
                         sales_qty: 0,
                         sales_unit: $(this).parents('.tr-salesInvoice').find('.sales-unit').text(),
                         sales_unitPrice: $(this).parents('.tr-salesInvoice').find('.sales-unitPrice').val(),
                         sales_amount: $(this).parents('.tr-salesInvoice').find('.sales-amount').val()
                       
                      }

                    
                     for(var i = 0; i < arrayVarSales.length && arrayVarSales[i].sales_inv_id !== dataSales.sales_inv_id; i++);
                         arrayVarSales[i] = dataSales;
                         totalArraySales[i] = dataSales.sales_amount;  

                
                 });


                 $("#create-sales-invoice").click(function(e){
      
                      e.preventDefault();
                      var prodIdArray = [];
                      var purchaseIdArray = [];
                      var salesArraySelected = [];
                      var txt = "";

                       $("#table-inv-contents tr td input:checkbox:checked").each(function(i){
                         prodIdArray[i] = $(this).val();
                         purchaseIdArray[i] = $(this).closest('tr').find('.purchase-id').text();
                       });
                     
                     document.getElementById("numberOfSalesItem").value = prodIdArray.length;
                      
                      if( prodIdArray.length > 0 ){
                    
                          $("option:selected").each(function(i){
                               salesArraySelected[i] = $(this).text();
                          });


                          $.post("{{ url('create_salesInvoice') }}", { 'prod_IDs': prodIdArray, 'purchase_IDs': purchaseIdArray }, function(data){

                            var obj = JSON.parse(data);

                            for(var i = 0; i < obj.prodval.length; i++){

                                txt += "<tr class='info tr-salesInvoice'><td style='display:none;'class='sales-inv-id'>"+obj.prodval[i].id+
                                       "</td><td style='display:none;'class='sales-product-id'>"+obj.prodval[i].product_id+
                                       "</td><td style='display:none;'class='sales-po-id'>"+obj.prodval[i].purchase_order_id+
                                       "</td><td style='display:none;'class='sales-purchase-id'>"+obj.prodval[i].purchase_id+
                                       "</td><td class='sales-lot'>"+obj.prodval[i].lot+
                                       "</td><td class='sales-expiry-date'>"+obj.prodval[i].expiry_date_month+
                                       "</td><td class='sales-type'>"+obj.prodval[i].type+
                                       "</td><td class='sales-pharma'>"+obj.prodval[i].pharmaceutical+
                                       "</td><td class='sales-unit'>"+obj.prodval[i].unit+
                                       "</td><td><input type='text' class='form-control sales-unitPrice' style='width:100px;' value='"+obj.prodval[i].unit_price+"'/>"+
                                       "</td><td class='sales-qty'><input title='Available Quantity is : "+obj.prodval[i].total_qty+"' type='number' class='form-control sales-prodQty' style='width:100px;' value='0' />"+
                                       "</td><td><input type='text' class='form-control sales-amount' style='width:100px;' value='0' disabled=disabled />"+
                                       "</td><td style='display:none;' class='sales-inventory-quantity'>"+obj.prodval[i].total_qty+
                                       "</td></tr>"; 
                              }

                              $("#tbl-sales-list").append(txt);

                            });

                            $(".create-salesInvoice-modal").modal({show:true});
                            $('.create-salesInvoice-modal').on('hidden.bs.modal', function () {
                            $("#salesInvoice-create").empty();
                            });

                         } else{

                            swal("Please select a record. Thanks.", "")

                         }
                    });


            });  // end of function clause 




            $("#freight-charge-id").on( 'keyup change', function(){
              freight_charge = parseFloat($(this).val());
              document.getElementById("overall-total").value = overall_total + parseFloat($(this).val());
            });


             $("#purchase-freight-charge").on( 'keyup change', function(){
              //event.stopImmediatePropagation(); this is a good line of code, equivalent to 'input[type="text"]:not(#purchase-freight-charge)'
              purchase_fcharge = parseFloat($(this).val());
              document.getElementById("overall-totalPurchases").value = overall_totalPurchases + parseFloat($(this).val());
            });

             //Onchange for Pharma

             $("#inputCategory, #editCategory").change(function(){

              var selectedText = $(this).find("option:selected").text();
              var optionTxtMedical = ['None'];
              var optionTxtPharma = ['Select type','Branded','Generics'];
              var select = document.getElementById("inputType");
              var select2 = document.getElementById("editType");
              var options = [];
              var option = document.createElement('option');

                if(selectedText == "Pharma"){

                  document.getElementById('inputType').innerHTML = "";
                  document.getElementById('editType').innerHTML = "";

                    for (var i = 0; i < optionTxtPharma.length; i++)
                    {
                        
                        option.text = option.value = optionTxtPharma[i];
                        options.push(option.outerHTML);
                    }

                    select.insertAdjacentHTML('beforeEnd', options.join('\n'));
                    select2.insertAdjacentHTML('beforeEnd', options.join('\n'));
                  
                    
                }else{

                  document.getElementById('inputType').innerHTML = "";
                  document.getElementById('editType').innerHTML = "";

                  for (var i = 0; i < optionTxtMedical.length; i++)
                    {
                        
                        option.text = option.value = optionTxtMedical[i];
                        options.push(option.outerHTML);
                    }

                    select.insertAdjacentHTML('beforeEnd', options.join('\n'));
                    select2.insertAdjacentHTML('beforeEnd', options.join('\n'));
                  
                }

             });


             $('.create-po-modal').on('hidden.bs.modal', function () {

              arrayVar = [];
              totalArray = [];
              overall_total = 0;

              document.getElementById("overall-total").value = overall_total;

             });


             $(".btn-edit-po").click( function(e) {

              e.preventDefault();
              var editvalArray = [];
              var poID;

              $("input:checkbox:checked").each(function(i){
                 editvalArray[i] = $(this).val();
                 poID = $(this).val();
              });

              if( editvalArray.length > 0 &&  editvalArray.length == 1 ){

                 window.location.replace("http://promed/editPurchase/"+poID);
                
              }else{
                swal("Please select a record to update.Thank you.", "")
              }

             });


            $(".add-prod-btn").click(function(e){
              e.preventDefault();
              $(".add-prod-modal").modal({show:true});
            });


            $(".add-prodpharma-btn").click(function(e){
              e.preventDefault();
              $(".add-prod-pharma-modal").modal({show:true});
            });


            $(".edit-prod-btn").click(function(e){

              e.preventDefault();
              var Txt = $("#pageTxt").text();
              var editvalArray = [];
              var editvalArraySelected = [];

              $("input:checkbox:checked").each(function(i){
                 editvalArray[i] = $(this).val();
              });

              if( editvalArray.length > 0 &&  editvalArray.length == 1 ){

               $('#table-prod-contents tr.tbl-prod-row, #table-prodpharma-contents tr.tbl-prod-row').filter(':has(:checkbox:checked)').each(function() {
                  // this = tr
                  $tr = $(this);
                  $('td', $tr).each(function() {
                     
                      document.getElementById("edit-prodID").value = $tr.find('td:eq(1)').html();
                      document.getElementById("editPharmaceutical").value = $tr.find('td:eq(3)').html();
                      document.getElementById("editDescription").value = $tr.find('td:eq(4)').html();
                      document.getElementById("editType").value = $tr.find('td:eq(5)').html();
                      document.getElementById("editUnit").value = $tr.find('td:eq(6)').html();
                      document.getElementById("editCategory").value = $tr.find('td:eq(2)').html();
                      document.getElementById("editPrice").value = $tr.find('td:eq(7)').html();

                      if( Txt == "Medical"){
                        $(".edit-prod-modal").modal({show:true}); 
                      }else{
                        $(".edit-prodPharma-modal").modal({show:true});
                      }

                  });
                    
                    return false;

              });

              }else{
                swal("Please select a product to update.Thank you.", "")
              }
    
            });


            $(".add-supp-btn").click(function(e){
              e.preventDefault();
             $(".add-supp-modal").modal({show:true});
            });

            //Edit Supplier
            $(".edit-supp-btn").click(function(e){
              e.preventDefault();

              var editvalArray = [];

              $("input:checkbox:checked").each(function(i){
                 editvalArray[i] = $(this).val();
              });

              if( editvalArray.length > 0 &&  editvalArray.length == 1 ){

               $('#table-supp-contents tr.tbl-supp-row').filter(':has(:checkbox:checked)').each(function() {
                  // this = tr
                  $tr = $(this);
                  $('td', $tr).each(function() {
                     
                      document.getElementById("supplierID").value = $tr.find('td:eq(0) input').val();
                      document.getElementById("updateName").value = $tr.find('td:eq(1)').html();
                      document.getElementById("updateAddress").value = $tr.find('td:eq(2)').html();
                      document.getElementById("updateContact").value = $tr.find('td:eq(3)').html();
                      document.getElementById("updateTIN").value = $tr.find('td:eq(4)').html();

                     $(".edit-supp-modal").modal({show:true}); 

                  });
                    
                    return false;

              });

              }else{
                swal("Please select a supplier to update.Thank you.", "")
              }

            });

            // Edit Agent Details
            $(".edit-agent-btn").click(function(e){
              e.preventDefault();

              var editvalArray = [];

              $("input:checkbox:checked").each(function(i){
                 editvalArray[i] = $(this).val();
              });

              if( editvalArray.length > 0 &&  editvalArray.length == 1 ){

               $('#table-agents-contents tr.tbl-agents-row').filter(':has(:checkbox:checked)').each(function() {
                  // this = tr
                  $tr = $(this);
                  $('td', $tr).each(function() {
                     
                      document.getElementById("agentID").value = $tr.find('td:eq(1)').html();
                      document.getElementById("updateFname").value = $tr.find('td:eq(2)').html();
                      document.getElementById("updateLname").value = $tr.find('td:eq(3)').html();
                      document.getElementById("updateSex").value = $tr.find('td:eq(4)').html();
                      document.getElementById("updateAge").value = $tr.find('td:eq(5)').html();
                      document.getElementById("updateAddress").value = $tr.find('td:eq(6)').html();
                      document.getElementById("updateContactNum").value = $tr.find('td:eq(7)').html();
                      document.getElementById("updateDateofBirth").value = $tr.find('td:eq(8)').html();

                     $(".edit-agent-modal").modal({show:true}); 

                  });
                    
                    return false;

              });

              }else{
                swal("Please select an agent to update.Thank you.", "")
              }

            });


// Submit and save product data

    $(".submit-prod").click(function(e){

     e.preventDefault();
     document.getElementById("submit-prod").disabled = true;
      
       $.post("{{ url('addprod') }}", $("#prod-form").serialize(), function(data){

        document.getElementById('loading-image').style.display="block";

           if(data.notify == "Success"){
              setTimeout(function(){
                 $(".alert-addprod-success").fadeIn(100);
                 $(".alert-addprod-success").delay(2000).fadeOut(800);
                 window.location.reload(1);
              }, 2000);

           }else{
            console.log(data.notify);
           }

        },"json");

    }); //end


    //Update Product

    $("#update-prod").click(function(e){

       e.preventDefault();
       document.getElementById("update-prod").disabled = true;
      
       var postdata;

       var conditionalTxt = $("#pharmaTxtVal").val();
       var prodID = document.getElementById("edit-prodID").value;
       var editPharma = document.getElementById("editPharmaceutical").value;
       var editDesc = document.getElementById("editDescription").value;
       var editType = document.getElementById("editType").value;
       var editUnit = document.getElementById("editUnit").value;
       var editCat = document.getElementById("editCategory").value;
       var editPrice = document.getElementById("editPrice").value;
      

       postdata = {

            'prod_id': prodID,
            'editPharma': editPharma,
            'editDesc': editDesc,
            'editType': editType,
            'editUnit': editUnit,
            'editCat': editCat,
            'editPrice': editPrice

           };


            $.post("{{ url('updateprod') }}", postdata, function(data){

              if( conditionalTxt == "Pharma" ){
                document.getElementById('updatePharma-loading-image').style.display="block";
              }else{
                document.getElementById('update-loading-image').style.display="block";
              }

               if(data.notify == "Success"){

                  var txt = "";
                  
                  txt += "<tr class='tbl-prod-row'><td><input type='checkbox' style='width:30px; height:20px;' checked='checked' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='radio_check_all prod-id-checkbox' value="+prodID+"></td><td style='display:none;'>"+prodID+
                                   "</td><td style='display:none;'>"+editCat+"</td><td>"+editPharma+"</td><td>"+editDesc+"</td><td>"+editType+"</td><td>"+editUnit+
                                   "</td><td>"+editPrice+"</td></tr>";
                 
                  $('#table-prod-contents tr.tbl-prod-row').filter(':has(:checkbox:checked)').replaceWith(txt);

                  setTimeout(function(){
                   $(".alert-notice-success-update").fadeIn(100);
                   $(".alert-notice-success-update").delay(2000).fadeOut(800);
                   window.location.reload(1);
                  }, 2000);

               }else{
                console.log(data.notify);
               }

            },"json");

    });


    $(".submit-supp").click(function(e){

     e.preventDefault();

     document.getElementById("submit-supp").disabled = true;
      
       $.post("{{ url('addsupp') }}", $("#supp-form").serialize(), function(data){

           if(data.notify == "Success"){

            document.getElementById('supplierLoading-image').style.display="block";

             setTimeout(function(){
              $(".alert-addsupp-success").fadeIn(100);
              $(".alert-addsupp-success").delay(2000).fadeOut(800);
                   window.location.reload(1);
              }, 2000);

           }else{

            console.log(data.notify);

           }

        },"json");

      
    }); //end


    // Submit Client Details

    $(".submit-client").click(function(e){

     e.preventDefault();

     document.getElementById("submit-client").disabled = true;
      
       $.post("{{ url('saveclient') }}", $("#client-form").serialize(), function(data){

           if(data.notify == "Success"){

            document.getElementById('clientsLoading-image').style.display="block";

             setTimeout(function(){
                $(".alert-addclient-success").fadeIn(100);
                $(".alert-addclient-success").delay(2000).fadeOut(800);
                   window.location.reload(1);
              }, 2000);

           }else{

            console.log(data.notify);

           }

        },"json");

      
    }); //end


    //Edit Client

    $(".edit-client-btn").click(function(e){
      e.preventDefault();

      var editvalArray = [];

              $("input:checkbox:checked").each(function(i){
                 editvalArray[i] = $(this).val();
              });

              if( editvalArray.length > 0 &&  editvalArray.length == 1 ){

               $('#table-clients-contents tr.tbl-clients-row').filter(':has(:checkbox:checked)').each(function() {
                  // this = tr
                  $tr = $(this);
                  $('td', $tr).each(function() {
                     
                      document.getElementById("clientID").value = $tr.find('td:eq(0) input').val();
                      document.getElementById("editName").value = $tr.find('td:eq(1)').html();
                      document.getElementById("editTIN").value = $tr.find('td:eq(2)').html();
                      document.getElementById("editAddress").value = $tr.find('td:eq(3)').html();
                      document.getElementById("editBusinessStyle").value = $tr.find('td:eq(4)').html();
                      document.getElementById("editTerms").value = $tr.find('td:eq(5)').html();
                      document.getElementById("editOsca").value = $tr.find('td:eq(6)').html();

                     $(".edit-client-modal").modal({show:true}); 

                  });
                    
                    return false;

              });

              }else{
                swal("Please select a client to update.Thank you.", "")
              }


    });


    //Submit Agent Details

    $(".submit-agent").click(function(e){

     e.preventDefault();

     document.getElementById("submit-agent").disabled = true;
      
       $.post("{{ url('saveagent') }}", $("#agent-form").serialize(), function(data){

           if(data.notify == "Success"){

            document.getElementById("agentsLoading-image").style.display = "block";

             setTimeout(function(){
              $(".alert-addagent-success").fadeIn(100);
              $(".alert-addagent-success").delay(2000).fadeOut(800);
                   window.location.reload(1);
              }, 2000);

           }else{

            console.log(data.notify);

           }

        },"json");

      
    }); //end


    //Update Client Details
    $(".update-client").click(function(e){
            
            e.preventDefault();

            $.post("{{ url('updateClient') }}", $("#update-client-form").serialize(), function(data){

               if(data.notify == "Success"){

                  $(".alert-notice-success-update").fadeIn(100);
                  $(".alert-notice-success-update").delay(2000).fadeOut(800);
                  setTimeout(function(){
                   window.location.reload(1);
                  }, 2000);

               }else{

                console.log(data.notify);

               }

            },"json");

    });


    //Update Supplier Details
    $(".update-supp").click(function(e){
            
            e.preventDefault();

            $.post("{{ url('updateSupplier') }}", $("#update-supp-form").serialize(), function(data){

               if(data.notify == "Success"){

                  $(".alert-notice-success-update").fadeIn(100);
                  $(".alert-notice-success-update").delay(2000).fadeOut(800);
                  setTimeout(function(){
                   window.location.reload(1);
                  }, 2000);

               }else{

                console.log(data.notify);

               }

            },"json");

    });


    //Update Agent Details
    $(".update-agent").click(function(e){
            
            e.preventDefault();

            $.post("{{ url('updateAgent') }}", $("#update-agent-form").serialize(), function(data){

               if(data.notify == "Success"){

                  $(".alert-notice-success-update").fadeIn(100);
                  $(".alert-notice-success-update").delay(2000).fadeOut(800);
                  setTimeout(function(){
                   window.location.reload(1);
                  }, 2000);

               }else{

                console.log(data.notify);

               }

            },"json");

    });



      $('#create-po').click(function(e){
      
        e.preventDefault();
        var valArray = [];
        var valArraySelected = [];
        var txt = "";


         $("input:checkbox:checked").each(function(i){
           valArray[i] = $(this).val();
         });

        document.getElementById("numberOfItem").value = valArray.length;

        if( valArray.length > 0 ){
    
          $("option:selected").each(function(i){
               valArraySelected[i] = $(this).text();
               //console.log(valArraySelected[i]);
          });


          $.post("{{ url('create_po') }}", { 'prod_IDs': valArray }, function(data){

            var obj = JSON.parse(data);

            for(var i = 0; i < obj.prodval.length; i++){

              txt += "<tr class='info'><td><input type='text' class='form-control pro-packaging' style='width:100px;' value=''/>"+
                     "</td><td class='pro-unit'><input type='hidden' class='form-control prod-id' style='width:100px;' value='"+obj.prodval[i].id+"'/>"+obj.prodval[i].unit+
                     "</td><td class='pro-pharmaceutical'>"+obj.prodval[i].pharmaceutical+
                     "</td><td class='pro-desc'>"+obj.prodval[i].description+
                     "</td><td><input type='number' class='form-control po-Qty' style='width:100px;' value='0'/>"+
                     "</td><td><input type='text' class='form-control price' style='width:100px;' value='"+obj.prodval[i].price+"' disabled=disabled />"+
                     "</td><td><input type='text' class='form-control total' style='width:100px;' value='0' disabled=disabled />"+
                     "</td></tr>";
                
            }
            
            $("#tbl-po-list").append(txt);

            });

            $(".create-po-modal").modal({show:true});
            $('.create-po-modal').on('hidden.bs.modal', function () {
            $("#po-create").empty();
            });

         } else{

            swal("Please select a record. Thanks.", "")

         }   

    });


   /* ******************************************************sales invoice************************************************************************ */

    
//Save Purchase Orders

$("#save-po-button").click(function(e){

  e.preventDefault();
  var supplierName = $("#supplierID").val();
  var shippedViaPO = $("#po-shipped-via").val();
  var termsPO = $("#po-terms").val();
  var numberOfItems = $("#numberOfItem").val();
  

  if( supplierName == 0 ){
    swal("Please enter value in supplier field. Thank you.")
    return false;
  }else if( shippedViaPO == "Select"){
     swal("Please enter value in shipped via field. Thank you.")
     return false;
  }else if( termsPO == "" ){
     swal("Please enter value in terms field. Thank you.")
     return false;
  }else if( arrayVar == ""){
      swal("Please enter values in the Purchase Order Form. Thank you.")
      return false;
  }else if( numberOfItems > arrayVar.length ){
    swal("Please enter value for other items. Thank you.")
    return false;
  }


  for (var i = arrayVar.length - 1; i >= 0; i--) {

    if( arrayVar[i].packaging == "" ){
      swal("Please enter packaging value. For no value, type 'None'. Thank you.")
      return false;
    }else if( arrayVar[i].qty == 0 ){
      swal("Please enter quantity value. Thank you.")
      return false;
    }

  }

  document.getElementById("save-po-button").disabled = true;
  
   $.post("{{ url('savepurchaseorders') }}", { 
      'po_code': $(".po-code").text(), 
      'purchase_orders': arrayVar,
      'shipped_via': $("#po-shipped-via :selected").text(),
      'terms': $("#po-terms").val(),
      'freight_charge': freight_charge, 
      'supplierID': $("#supplierID").val(),
      'overall_total': overall_total + freight_charge }, function(data){
     
      if(data.notify == "Success"){

        document.getElementById('poLoading-image').style.display="block";
      
        setTimeout(function(){
          $(".alert-addpo-success").fadeIn(100);
          $(".alert-addpo-success").delay(2000).fadeOut(800);
             window.location.reload(1);
        }, 2000);

      }else{
        console.log(data.notify);
      }

    }, 'json');

});

//Save Purchases
$("#save-purchases-button").click(function(e){

  e.preventDefault();
  var numberOfItemsPos = $("#numberOfItemsPos").val();
  var purchasesFCharge = $("#purchase-freight-charge").val();

  if( arrayVarPurchases == "" ){
    swal("Please enter values in the purchases form. Thank you.")
    return false;
  }else if( numberOfItemsPos > arrayVarPurchases.length ){
    swal("Please enter value for the other items. Thank you.")
    return false;
  }else if( purchasesFCharge=="" ){
    swal("Please enter freight charge value. Enter 0 if none. Thank you.")
    return false;
  }


  for (var i = arrayVarPurchases.length - 1; i >= 0; i--) {
    if( arrayVarPurchases[i].addon_qty == "" ){
      swal("Please enter add-on value. Enter 0 if none. Thank you.")
      return false;
    }else if( arrayVarPurchases[i].purchase_qty == "" ){
      swal("Please enter value for actual purchase quantity. Thank you.")
      return false;
    }

  }

  document.getElementById("save-purchases-button").disabled = true;

  $.post("{{ url('savepurchases') }}", {
    'purchases_data': arrayVarPurchases,
    'freight_charge': purchasesFCharge
    }, function(data){
   
       if(data.notify == "Success"){

        document.getElementById('purchasesLoading-image').style.display="block";

        setTimeout(function(){
          $(".alert-notice-success").fadeIn(100);
          $(".alert-notice-success").delay(2000).fadeOut(800);
           window.location.replace("http://promed/purchaseorders");
        }, 2000);

       }else{
        console.log("Failed");   
      }

    }, 'json');
  
});



$("#update-purchases-button").click(function(e){

  e.preventDefault();
  var purchasesFCharge = $("#purchase-freight-charge").val();

  $.post("{{ url('updatepurchases') }}", {
    'purchases_data': arrayVarPurchases,
    'freight_charge': purchasesFCharge
    }, function(data){
   
       if(data.notify == "Success"){

        $(".alert-notice-success-update").fadeIn(100);
        $(".alert-notice-success-update").delay(2000).fadeOut(800);
        setTimeout(function(){
           window.location.replace("http://promed/purchaseorders");
        }, 2000);

       }else{
        console.log("Failed");   
      }

    }, 'json');

})

//Save Sales
$("#save-sales-button").click(function(e){

 e.preventDefault();
 var sales_params = $(".tbl-sales-details :input").serialize();
 var salesNumber = $(".sales_number").val();
 var numberOfSalesItem = $("#numberOfSalesItem").val();
 var agentName = $("#agentsID").val();
 var clientName = $("#clientsID").val();
 

   if( clientName == 0 ){

    swal("Please enter value in the client field. Thank you.")
    return false;

   }else if( arrayVarSales == "" ){

    swal("Please enter values in the sales invoice form. Thank you.")
    return false;

  }else if( numberOfSalesItem > arrayVarSales.length ){

    swal("Please enter value for the other items. Thank you.")
    return false;

  }


  for (var i = arrayVarSales.length - 1; i >= 0; i--) {

    if( arrayVarSales[i].sales_qty == 0 ){
      swal("Please enter sales quantity. Thank you.")
      return false;
    }

  }

   document.getElementById("save-sales-button").disabled = true;
  
   $.post("{{ url('saveSales') }}", {
      'salesNumber': salesNumber,
      'customerID': $("#clientsID").val(),
      'agentID': $("#agentsID").val(),
      'salesDetails': arrayVarSales
      }, function(data){

      $.post("{{ url('updateInventory') }}", {
      'salesDetails': arrayVarSales
      }, function(data){

        document.getElementById('createInvoiceLoading-image').style.display="block";
     
        if(data.notify == "Success"){

          setTimeout(function(){
            $(".alert-saveSales-success").fadeIn(100);
            $(".alert-saveSales-success").delay(2000).fadeOut(800);
             window.location.reload(1);
          }, 2000);

         }else{
          console.log("Failed");
        }

      }, 'json');
     
    }, 'json');
 
  
});

//Add purchases to Inventory

$("#purchase_toInventoryID").click(function(e){

  e.preventDefault();
         
        var array_prodID = <?php echo json_encode(isset($array_prodID) ? $array_prodID : 0); ?>;
        var array_poID = <?php echo json_encode(isset($array_poID) ? $array_poID : 0); ?>;
        var array_purchaseID = <?php echo json_encode(isset($array_purchaseID) ? $array_purchaseID : 0); ?>;
        var array_purchasePrice = <?php echo json_encode(isset($array_purchasePrice) ? $array_purchasePrice : 0); ?>;
        var array_purchaseQuantity = <?php echo json_encode(isset($array_purchaseQuantity) ? $array_purchaseQuantity : 0); ?>;
        var array_purchaseAddOnQty = <?php echo json_encode(isset($array_purchaseAddOnQty) ? $array_purchaseAddOnQty : 0); ?>;
        var array_purchaseExpiryDate = <?php echo json_encode(isset($array_purchaseExpiryDate) ? $array_purchaseExpiryDate : 0); ?>;
        

        document.getElementById("purchase_toInventoryID").disabled = true;

        $.post("{{ url('saveToInventory') }}", { 
                'product_ids': array_prodID, 
                'purchase_order_ids': array_poID,
                'purchase_ids':array_purchaseID,
                'purchasePrice': array_purchasePrice,
                'purchaseQuantity': array_purchaseQuantity,
                'purchaseAddOnQty': array_purchaseAddOnQty,
                'purchaseExpiryDate': array_purchaseExpiryDate
           }, function(data){
           
            if(data.notify == "Success"){

              document.getElementById('purchasesToInventoryLoading-image').style.display="block";

                   $.post("{{ url('updatePOStatus') }}", { 
                          'purchase_order_ids': array_poID
                     }, function(data){
                     
                      if(data.notify == "Success"){

                        setTimeout(function(){
                          $(".alert-notice-success").fadeIn(100);
                          $(".alert-notice-success").delay(2000).fadeOut(800);
                           window.location.replace("http://promed/purchaseorders");
                        }, 2000);

                      }else{
                        console.log(data.notify);
                      }

                    }, 'json');

            }else{

              console.log(data.notify);

            }

          }, 'json');
           
});


$('#table-prod-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-prod-id").href="{{ url('exportProduct') }}"+'/'+value;
    
});

$('#table-prodpharma-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-prodPharma-id").href="{{ url('exportProductPharma') }}"+'/'+value;
    
});

$('#table-sales-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-sales-id").href="{{ url('exportSales') }}"+'/'+value;
    
});

$('#table-inv-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-inv-id").href="{{ url('exportInventory') }}"+'/'+value;
    
});

$('#table-invoices-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-invoices-id").href="{{ url('exportInvoices') }}"+'/'+value;
    
});

$('#table-clients-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-client-id").href="{{ url('exportClient') }}"+'/'+value;
    
});

$('#table-supp-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-supplier-id").href="{{ url('exportSupplier') }}"+'/'+value;
    
});

$('#table-agents-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-agent-id").href="{{ url('exportAgents') }}"+'/'+value;
    
});

/*$('#table-payments-contents').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    document.getElementById("export-payment-history").href="{{ url('exportPaymentHistory') }}"+'/'+value;
    
});*/


$("#add-prodpo-btn").change(function(e){

  var txt;
  var pharmaID = $(this).find('option:selected').val();
  var pharmaName = $(this).find('option:selected').text();
  var pharmaUnit = $("#prod-unit").text();
  
  
  txt += "<tr class='info1'><td><input type='number' class='form-control' style='width:100px;' value='0'/>"+
                     "</td><td class='pro-unit'><input type='hidden' class='form-control prod-id' style='width:100px;' value='"+pharmaID+"'/>"+pharmaUnit+
                     "</td><td class='pro-pharmaceutical'>"+pharmaName+
                     "</td><td><input type='text' class='form-control pro-packaging' style='width:100px;' value=''/>"+
                     "</td><td><input type='text' class='form-control price' style='width:100px;' value='' />"+
                     "</td><td><input type='text' class='form-control total' style='width:100px;' value='0' disabled=disabled />"+
                     "</td></tr>";
                
            
  $("#tbl-po-list").append(txt);

});

//Client Modal
$("#create-client-details").click(function(e){

 e.preventDefault();
 
  $(".add-clients-modal").modal({show:true});
  $('.add-clients-modal').on('hidden.bs.modal', function () {
  $("#po-create").empty();
  });
 
});

//Agent Modal

$("#add-agent-btn").click(function(e){

 e.preventDefault();
 
  $(".add-agent-modal").modal({show:true});
 
});


//Change collectibles to collected

$("#btn-saleNum-collected").click(function(e){

  e.preventDefault();
  var sale_num = [];

  $("#table-invoices-contents tr td input:checkbox:checked").each(function(i){
    sale_num[i] = $(this).val();
  });

  
  if(sale_num.length > 0){

    $.post("{{ url('changesalestatus') }}", {
      'saleNumber': sale_num
      }, function(data){
     
         if(data.notify == "Success"){

          $(".alert-notice-success-collected").fadeIn(100);
          $(".alert-notice-success-collected").delay(2000).fadeOut(800);
          setTimeout(function(){
             window.location.reload(1);
          }, 1000);
          
         }else{
          console.log("Failed");   
        }

      }, 'json');
  }else{
    swal("Please select a record. Thanks.", "")
  }

});


//Delete functions
$(".delete-supp-btn").click(function(e){
  e.preventDefault();
  swal('This function is not enabled. Please contact system developer for additional functions needed. Thank you.')
});


//Payment Functions

$("#btn-enter-payment").click(function(e){
  e.preventDefault();

    var sale_num = [];

    $("#table-invoices-contents tr td input:checkbox:checked").each(function(i){
      sale_num[i] = $(this).val();
    });

    if( sale_num.length > 0 && sale_num.length == 1 ){

      $('#table-invoices-contents tr.tbl-invoices-row').filter(':has(:checkbox:checked)').each(function() {
               
                  $tr = $(this);
                  $('td', $tr).each(function() {

                      if( $tr.find('td:eq(8)').html() == "Fully Paid"){

                         swal("Fully Paid");

                      }else{

                         document.getElementById("salesNumID").value = $tr.find('td:eq(0) input').val(); 
                         document.getElementById("client_id").value = $tr.find('td:eq(11)').html(); 
                         document.getElementById("customerNameID").value = $tr.find('td:eq(3)').html(); 
                         document.getElementById("customerBalanceID").value = $tr.find('td:eq(7)').html(); 
                         $(".enter-payment-modal").modal({show:true});

                      }

                  });
                    
                  return false;
             });

     }else if( sale_num.length > 1 ){

        swal("Please select one record at a time. Thanks.", "")

     }else{

        swal("Please select a record to enter payment. Thanks.", "")

     }

});


$(".submit-payment").click(function(e){
  e.preventDefault();

  var balancePayment = parseFloat($("#customerBalanceID").val().replace(/,/g, ''));
  var currentPayment = parseFloat($("#payment-value-id").val());
  var sale_num = $("#salesNumID").val();
  var orNumber = $("#orNumberID").val();

      if( orNumber == "" ){

        swal('Please enter official receipt number. Thank you.');

      }else if(balancePayment == currentPayment){

        document.getElementById("submit-payment").disabled = true;
        
        $.post("{{ url('enterPayment') }}", $("#enter-payment-form").serialize() + '&status=' + "TRUE", function(data){

          if( data.notify == "Success" ){

            document.getElementById('paymentLoading-image').style.display="block";

                setTimeout(function(){
                  $(".alert-payment-notice-success").fadeIn(100);
                  $(".alert-payment-notice-success").delay(2000).fadeOut(800);
                   window.location.reload(1);
                }, 1000);

          }else{

            swal('Error: Data not saved.');

          }

        },'json');


        $.post("{{ url('changesalestatus') }}", {
          'saleNumber': sale_num
          }, function(data){
           console.log(data.notify);
         }, 'json');
   

      }else if( balancePayment < currentPayment ){

        swal('Payment Exceeded.');

      }else if( !currentPayment){

        swal('Please enter payment. Thank you.');

      }else{

          document.getElementById("submit-payment").disabled = true;

          $.post("{{ url('enterPayment') }}", $("#enter-payment-form").serialize(), function(data){

          if( data.notify == "Success" ){

            document.getElementById('paymentLoading-image').style.display="block";

                setTimeout(function(){
                   $(".alert-payment-notice-success").fadeIn(100);
                   $(".alert-payment-notice-success").delay(2000).fadeOut(800);
                   window.location.reload(1);
                }, 1000);

          }else{

            swal('Error: Data not saved.');

          }

        },'json');

    }

});



</script>