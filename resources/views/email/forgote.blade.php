<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgote Password</title>
</head>
<body>
	
	<h4>  </h4>
	 
 
	<h4>Verify Code
<?php 
 $user = DB::table('tbl_customer')
              ->where('customer_email' ,$customer_email)
              ->limit(1)
              ->first();
?>

	 {{$user->code}} </h4>
 
</body>
</html>