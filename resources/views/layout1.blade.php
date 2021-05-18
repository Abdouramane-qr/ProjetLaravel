<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>PG Templates Re-Regstion</title>
	<link rel="stylesheet" href="{{asset('css/app1.css')}}" />
</head>
<body>
	<nav><div class="nav"><div class="logo">
	<img src="{{asset('fontpage/img/2LysmP7vLXNX6NSj2UUv.png')}}" alt="" /></div>
	<h3>PG Temaplates</h3>
	</div></nav>
	
	<div class="fullbody">
	 <div class="body"> 
	   <h3>Your Template Date Is Over . Place Your Template Re_Regstion .</h3>
	   
	   <table class="tblone"> 
	    <tr>
	    	<th>Name</th>
	    	<th>Price</th>
	    	<th>Action</th>
	    	
	    </tr>
	 	
		<tr>
		<?php 	 $uds = DB::table('uds')->where('id',1)->first(); ?>

			<td>{{$uds->name }}</td>
			<td>{{$uds->price }}</td>
			<td> <a href="pgtemplates.com/profile-page-pgtemplates">Re-Regstion Now</a> </td>
		</tr>
		
	   </table>
	 </div>
	</div>
	
	
</body>
</html>