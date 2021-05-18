@extends('backsite/master')

@section('main_body')

  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td =  <div class="inner-block">
 
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
 $(this).find('td');
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
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Service List</h3>
    <hr/>
  <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 

    <div class="card-body">
        <div id="table" class="table-editable">
           
      <table class="table table-bordered table-responsive-md table-striped text-center">
          <tr>
              <th class="text-center">Sl</th>
              <th class="text-center">Blog Title</th>
              <th class="text-center">Blog Image</th>
              <th class="text-center">Blog Category</th>
              <th class="text-center">Blog Status</th>
             <th class="text-center">Action</th>
          </tr>
         @php $i=0; @endphp
          @foreach($allblog as $allblog)
         @php $i++; @endphp
          <tr>
              <td class="pt-3-half" contenteditable="true">{{ $i }}</td>
              <td class="pt-3-half" contenteditable="true">{{$allblog->blog_title}}</td>
               <td><img src="{{URL($allblog->blog_image)}}" height="60px;" width="60px;" alt=""> </td>
              <td class="pt-3-half" contenteditable="true">{{$allblog->category_name}}</td> 
              <td>
            @if($allblog->blog_status==0)
             <a href="{{URL::to('activeblog/'.$allblog->blog_id)}}"> <span class="table-remove"><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Active</button></span></a>
             @else
               <a href="{{URL::to('unactiveblog/'.$allblog->blog_id)}}"><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Unactive</button></span></a> 
             @endif  
              </td>
              <td>
                  <a onclick="return confirm('ARE YOU SURE TO DELET');" href="{{URL::to('/deleteblog/'.$allblog->blog_id)}} "> <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span></a> 

                   <a href="{{URL::to('/editblog/'.$allblog->blog_id)}} "><span><button type="button" class="btn btn-success btn-rounded btn-sm my-0">Edit</button></span></a> 
              </td>
          </tr>
          @endforeach
          <!-- This is our clonable table line -->
          
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