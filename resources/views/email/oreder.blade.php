<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mitfarm Oreder </title>

	<style>
		
		  table { 
  width: 98%; 
  border-collapse: collapse; 
  margin:0 auto;
  margin-top: 60px;
  margin-bottom:  60px;
  text-align:center;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
  text-align:center;
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align:center;
}
	</style>
</head>
<body>
	 

	 <div class="fullbody">
	 	
	 	<div class="main">
                              
    <table>
  <thead>
  <tr>
    <th>SL</th>
    <th>Product Name</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <th>Quntity</th>
    <th>Total</th>
    
  </tr>
  </thead>
  <tbody>

<?php 

 

  $customere =  DB::table('tbl_orders')
        ->where('customer_id',$customer_id)
        ->where('order_pandding',0)
        ->orderby('order_id','desc')
        ->get();

    $i=0;
   foreach ($customere as $v_content) {
    $i++;
?>    
  <tr>
    <td>{{ $i }} </td>
    <td>{{$v_content->or_product_name}} </td>
    <td> <img src="{{Illuminate\Support\Facades\Storage::URL($v_content->or_product_image)}}" height="70px;" width="70px;" alt=""> </td>
    <td>{{$v_content->or_product_price}} tk</td> 
    <td>{{$v_content->or_product_qty}}  
       </td> 
    <td>{{$v_content->or_product_total}} tk</td>
     
  </tr>
  </tr>

<?php } ?>   

  </tbody>
</table>




 	</div>
	 </div>
</body>
</html>