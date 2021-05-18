@extends('backsite/master')

@section('main_body')
<?php
     $image = DB::table('seo')->where('website_id' ,'1')->first(); ?>
<!--inner block start here-->
 <img src="{{url($image->website_image)}}" width="100%;" height="100%;" alt="">
 
@endsection