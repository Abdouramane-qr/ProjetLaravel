@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 
<style>
.pt-3-half {
    padding-top: 1.4rem;
}
</style>
<script>
	var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  $TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});

$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
  var $rows = $TABLE.find('tr:not(:hidden)');
  var headers = [];
  var data = [];

  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });

  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};

    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();
    });

    data.push(h);
  });

  // Output the result
  $EXPORT.text(JSON.stringify(data));
});
</script>
<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Customer Order List</h3>
    <hr/>
  <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 
 
 <div class="fulleft">
<?php   $shepp = DB::table('shepping')->where('sheping_id',$orders->sheping_id)->first();  ?>
   <div class="left">
   <h3>Shepping Name:{{$shepp->sheping_name}} </h3>    
    <h3>Address: {{$shepp->sheping_adders}} </h3>    
    <h3>Phone: {{$shepp->sheping_phone}} </h3>  
    </div>
    <div class="left">  
    <h3>zip code: {{$shepp->sheping_zip}}</h3>    
    <h3>City:{{$shepp->sheping_city}} </h3>    
    <h3>Country:{{$shepp->sheping_country}} </h3> 
   </div>
 </div>

    <div class="card-body">
        <div id="table" class="table-editable">
           
      <table class="table table-bordered table-responsive-md table-striped text-center">
          <tr>
              <th class="text-center"> Sl</th>
           
              <th class="text-center">Product Name</th>
              <th class="text-center">Product Price</th>
              <th class="text-center">Product Image</th>
              <th class="text-center">Product Qty</th>
              <th class="text-center">Product totla Price</th>
              <th class="text-center">Action</th>
           
          </tr>
         @php $i=0; @endphp
           @php  $sum=0; @endphp
           @php  $qty = 0;

          $order = DB::table('tbl_orders')
            ->where('sheping_id',$shepp->sheping_id)
            ->where('order_pandding',0)
           ->get();

            @endphp
          @foreach($order as $vcomment)
         @php $i++; @endphp
          <tr>
              <td class="pt-3-half" contenteditable="true">{{ $i }}</td>
            
              <td class="pt-3-half" contenteditable="true">{{$vcomment->or_product_name}}</td>
              
              <td class="pt-3-half" contenteditable="true"> <img src="{{URL($vcomment->or_product_image)}}" height="80px;" width="80px;" alt=""> </td>

              <td class="pt-3-half" contenteditable="true">{{$vcomment->or_product_price}}</td>

              <td class="pt-3-half" contenteditable="true">{{$vcomment->or_product_qty}}</td>   
                   
              <td class="pt-3-half" contenteditable="true">{{$vcomment->or_product_total}}</td>   
               
             <td><a onclick="return confirm('ARE YOU SURE TO Order Pade');" href="{{URL::to('/orderpade/'.$shepp->sheping_id)}} "> <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Order Pandding</button></span></a> </td>
              
             <tr><?php  
               $total =  $vcomment->or_product_qty * $vcomment->or_product_price;
               $qty = $qty + $vcomment->or_product_qty  ;

              $sum= $total +$sum; 
                     

             ?></tr>      
  
          </tr>
          @endforeach
         
         <tr>
           <td></td>
           <td></td>
 
           <td></td>
           <td></td>
           <td>Qty: <?php  echo  $qty; ?> </td>
           <td> <?php  echo  $sum; ?> tk</td>
           <td>   </td>  
           
         </tr>
      
      </table>
        </div>
    </div>
</div>
<!-- Editable table -->





</div>
</div>
 <div class="inner-block">
 <div class="market-updates text-center"> 
    </div>
</div> <div class="inner-block">
 <div class="market-updates text-center"> 
    </div>
</div> 
   @endsection