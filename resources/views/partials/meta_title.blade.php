<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<!--<meta http-equiv="refresh" content="5" >-->
<title>
<?php 

if( isset( $products ) ){
	echo "ProMED Products";
}else if( isset( $purchaseOrders ) ){
	echo "ProMED Purchase Orders";
}else if( isset( $allPurchases ) ){
	echo "ProMED Purchases";
}else if( isset( $inventory ) ){
	echo "ProMED Inventory";
}else if( isset( $invoices ) ){
	echo "ProMED Invoices";
}else if( isset( $sales ) ){
	echo "ProMED Sales";
}else if( isset( $agents ) ){
	echo "ProMED Agents";
}else if( isset( $suppliers ) ){
	echo "ProMED Suppliers";
}else if( isset( $clients ) ){
	echo "ProMED Clients";
}else{
	echo "ProMED Solutions"; 
}

?>
</title>