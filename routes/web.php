<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// more courses ..................

Route::get("/More-Courses-mitfarm", "home@morecourses")->name('More-Courses-mitfarm');

// font Page blog site ....................?

Route::get("/More-Blog", "home@moreblog")->name('More-Blog');

Route::get("/sitetitle", "home@sitetitle")->name('sitetitle');

Route::post("/save_seo", "home@save_seo")->name('save_seo');

Route::get("/Service-Detels-Page-mitfarm/{service_id}", "home@ServiceDetelsPagemitfarm")->name('Service-Detels-Page-mitfarm');

Route::get("/Local-Service-Detels-Page-mitfarm/{service_id}", "home@LocalServiceDetelsPagemitfarm")->name('Local-Service-Detels-Page-mitfarm');

Route::get("/Traning-Service-Detels-Page-mitfarm/{service_id}", "home@TraningServiceDetelsPagemitfarm")->name('Traning-Service-Detels-Page-mitfarm');







// Admin Login Site .............................

Route::get("/backsite", "AdminController@backsite")->name('backsite');

Route::get("/logout", "AdminController@logout")->name('logout');

Route::post("/admin_beshbord", "AdminController@deshbord")->name('admin_beshbord');




// backsite home .........................?

Route::get("/home", "home@home")->name('home');

// Add Service ........................??

Route::get("/add_service", "ServiceController@add_service")->name('add_service');

Route::get("/all_service", "ServiceController@all_service")->name('all_service');

Route::get("/activeservice/{service_id}", "ServiceController@activeservice")->name('activeservice');

Route::get("/unactiveservice/{service_id}", "ServiceController@unactiveservice")->name('unactiveservice');

Route::get("/deleteservice/{service_id}", "ServiceController@deleteservice")->name('deleteservice');

Route::get("/editservice/{service_id}", "ServiceController@editservice")->name('editservice');

Route::post("/updateservice/{service_id}", "ServiceController@updateservice")->name('updateservice');

Route::post("/save_service", "ServiceController@saveservice")->name('save_service');

Route::post("/Commert-User-Service-mitfarm{service_id}", "home@CommertUserServicemitfarm")->name('Commert-User-Service-mitfarm');

Route::post("/Commert-Local-Service-mitfarm{service_id}", "home@CommertLocalServicemitfarm")->name('Commert-Local-Service-mitfarm');

Route::post("/Commert-Internation-Service-mitfarm{service_id}", "home@CommertInternationServicemitfarm")->name('Commert-Internation-Service-mitfarm');
Route::get("/", "home@index1")->name('home');

Route::get("/mitfarm-home", "home@index")->name('mitfarm-home');





// category site ......................?

Route::get("/addcategory", "CategoryController@addcategory")->name('addcategory');

Route::get("/allcategory", "CategoryController@allcategory")->name('allcategory');

Route::get("/activecategory/{category_id}", "CategoryController@activecategory")->name('activecategory');

Route::get("/unactivecategory/{category_id}", "CategoryController@unactivecategory")->name('unactivecategory');

Route::get("/deletecategory/{category_id}", "CategoryController@deletecategory")->name('deletecategory');

Route::get("/editcategory/{category_id}", "CategoryController@editcategory")->name('editcategory');

Route::post("/updatecategory/{category_id}", "CategoryController@updatecategory")->name('updatecategory');

Route::post("/save_category", "CategoryController@save_category")->name('save_category');

Route::get("/Blog-Category-Page-mitfarm/{category_id}", "CategoryController@BlogCategoryPagemitfarm")->name('Blog-Category-Page-mitfarm');




// Blog ................................................?


Route::get("/addblog", "BlogController@addblog")->name('addblog');

Route::get("/allblog", "BlogController@allblog")->name('allblog');

Route::get("/activeblog/{blog_id}", "BlogController@activeblog")->name('activeblog');

Route::get("/unactiveblog/{blog_id}", "BlogController@unactiveblog")->name('unactiveblog');

Route::get("/deleteblog/{blog_id}", "BlogController@deleteblog")->name('deleteblog');

Route::get("/editblog/{blog_id}", "BlogController@editblog")->name('editblog');

Route::post("/updateblog/{blog_id}", "BlogController@updateblog")->name('updateblog');

Route::post("/saveblog", "BlogController@saveblog")->name('saveblog');

Route::get("/blog_detels{blog_id}", "BlogController@blog_detels")->name('blog_detels');

Route::get("Show-Blog-Detels-mitfarm/{blog_id}", "BlogController@showblogdetels")->name('Show-Blog-Detels-mitfarm');

Route::get("asdfghjkl", "BlogController@asdfghjkl")->name('asdfghjkl');

Route::post("vefriy-Customers", "BlogController@vefriyCustomers")->name('vefriy-Customers');

Route::post("customer-Submit-Blog-mitfarm", "BlogController@customerSubmitBlogmitfarm")->name('customer-Submit-Blog-mitfarm');

Route::post("Commert-User-Blog-mitfarm/{blog_id}", "BlogController@CommertUserBlogmitfarm")->name('Commert-User-Blog-mitfarm');

Route::get("Add-Blog-Post-Profile-mitfarm", "ChackOutController@AddBlogsPostProfilemitfarm")->name('Add-Blog-Post-Profile-mitfarm');

Route::get("delete-post-mitfarm-{blog_id}", "BlogController@deletepostmitfarm")->name('delete-post-mitfarm');









// Slider .........................................?


Route::get("/addslider", "SliderController@addslider")->name('addslider');

Route::get("/allslider", "SliderController@allslider")->name('allslider');

Route::get("/activeslider/{slider_id}", "SliderController@activeslider")->name('activeslider');

Route::get("/unactiveslider/{slider_id}", "SliderController@unactiveslider")->name('unactiveslider');

Route::get("/deleteslider/{slider_id}", "SliderController@deleteslider")->name('deleteslider');

Route::get("/editslider/{slider_id}", "SliderController@editslider")->name('editslider');

Route::post("/updateslider/{slider_id}", "SliderController@updateslider")->name('updateslider');

Route::post("/save_slider", "SliderController@saveslider")->name('save_slider');









// comment site .........................................................

Route::get("/connent-page", "SliderController@connentpage")->name('connent-page');
Route::get("/activecomment/{comment_id}", "SliderController@activecomment")->name('activecomment');

Route::get("/unactivecomment/{comment_id}", "SliderController@unactivecomment")->name('unactivecomment');

Route::get("/deletecomment/{comment_id}", "SliderController@deletecomment")->name('deletecomment');

Route::get("/viewcomment/{comment_id}", "SliderController@viewcomment")->name('viewcomment');




// Massage ...........................??


Route::get("/inbox-page", "SliderController@inboxpage")->name('inbox-page');

Route::get("/activeinbox/{id}", "SliderController@activeinbox")->name('activeinbox');

Route::get("/unactiveinbox/{id}", "SliderController@unactiveinbox")->name('unactiveinbox');

Route::get("/deleteinbox/{id}", "SliderController@deleteinbox")->name('deleteinbox');

Route::get("/viewinbox/{id}", "SliderController@viewinbox")->name('viewinbox');



// Team Member..........................................................?

Route::get("/add-team-member", "TeamMamberController@addteammember")->name('add-team-member');

Route::get("/all-team-mamber", "TeamMamberController@AllTeamMamber")->name('all-team-mamber');

Route::get("/activeMember/{member_id}", "TeamMamberController@ActiveMember")->name('activeMember');

Route::get("/unactiveMember/{member_id}", "TeamMamberController@UnActiveMember")->name('unactiveMember');

Route::get("/deleteMember/{member_id}", "TeamMamberController@deleteMember")->name('deleteMember');

Route::get("/edit-Member/{member_id}", "TeamMamberController@editMember")->name('edit-Member');

Route::post("/updatemamber/{member_id}", "TeamMamberController@updatemamber")->name('updatemamber');

Route::post("/savemamber", "TeamMamberController@savemamber")->name('savemamber');

Route::get("/Show-Team-Mamber-mitfarm/{member_id}", "TeamMamberController@ShowTeamMambermitfarm")->name('Show-Team-Mamber-mitfarm');


// Product Controller....................................................?

Route::get("/Add-Product", "ProductController@AddProduct")->name('Add-Product');

Route::get("/All-Product", "ProductController@AllProduct")->name('All-Product');

Route::get("/activeProduct/{product_id}", "ProductController@activeProduct")->name('activeProduct');

Route::get("/unactiveProduct/{product_id}", "ProductController@unactiveProduct")->name('unactiveProduct');

Route::get("/deleteProduct/{product_id}", "ProductController@deleteProduct")->name('deleteProduct');

Route::get("/Edit-Product/{product_id}", "ProductController@EditProduct")->name('Edit-Product');

Route::post("/update_product/{product_id}", "ProductController@update_product")->name('update_product');

Route::post("/save_product", "ProductController@save_product")->name('save_product');

Route::get("/Show-All-Products-mitfarm", "ProductController@ShowAllProductsmitfarm")->name('Show-All-Products-mitfarm');

Route::get("/Show-Product-Detels-mitfarm/{product_id}", "ProductController@ShowProductsdetelsmitfarm")->name('Show-Product-Detels-mitfarm');

Route::get("/View-Product-Category-mitfarm/{category_id}", "ProductController@ViewProductCategorymitfarm")->name('View-Product-Category-mitfarm');

Route::get("/sheping-order-page", "ProductController@shepingorderpage")->name('sheping-order-page');

Route::post("/save-shepping-address", "ProductController@savesheppingaddress")->name('save-shepping-address');



// Add To Cart...........................................?


Route::post("/add-to-cart-mitfarm", "CartController@addtocartmitfarm")->name('add-to-cart-mitfarm');

Route::get("/Show-Cart-mitfarm", "CartController@ShowCart")->name('Show-Cart-mitfarm');

Route::get("/Delete-Cart-mitfarm/{rowId}", "CartController@DeleteCartmitfarm")->name('Delete-Cart-mitfarm');

Route::post("/Update-Cart-mitfarm/{rowId}", "CartController@UpdateCartmitfarm")->name('Update-Cart-mitfarm');


// Login-Page-mitfarm ....................................??

Route::get("/Login-Page-mitfarm", "ChackOutController@LoginPagemitfarm")->name('Login-Page-mitfarm');

Route::get("/Logout-Page-mitfarm", "ChackOutController@LogoutPagemitfarm")->name('Logout-Page-mitfarm');

Route::get("/New-Customer-Registration-mitfarm", "ChackOutController@NewCustomerRegstionmitfarm")->name('New-Customer-Registration-mitfarm');

Route::post("/Registration-Page-Mitfarm", "ChackOutController@CustomerRegstionMitfarm")->name('Registration-Page-Mitfarm');

Route::post("/Login-Customer-mitfarm", "ChackOutController@LoginCustomermitfarm")->name('Login-Customer-mitfarm');

Route::get("/Payment-Page-mitfarm", "ChackOutController@PaymentPagemitfarm")->name('Payment-Page-mitfarm');

Route::get("/Success-Page-mitfarm", "ChackOutController@SuccessPagemitfarm")->name('Success-Page-mitfarm');

Route::get("/Order-Page-mitfarm", "ChackOutController@OrderPagemitfarm")->name('Order-Page-mitfarm');

Route::get("/Customer-Profile-mitfarm", "ChackOutController@CustomerProfilemitfarm")->name('Customer-Profile-mitfarm');

Route::get("/Update-Profile-mitfarm", "ChackOutController@UpdateProfilemitfarm")->name('Update-Profile-mitfarm');

Route::post("/Update-Page-Profile-Mitfarm", "ChackOutController@UpdatePageProfileMitfarm")->name('Update-Page-Profile-Mitfarm');

Route::get("/Verify-Account-Mitfarm", "ChackOutController@VerifyAccountMitfarm")->name('Verify-Account-Mitfarm');

Route::post("/vefriy-Customer-mitfarm", "ChackOutController@vefriyCustomermitfarm")->name('vefriy-Customer-mitfarm');





// Contick-Profile-mitfarm................................??



Route::get("/Contick-Page-mitfarm", "ChackOutController@ContickProfilemitfarm")->name('Contick-Page-mitfarm');

Route::post("/contact-User-mitfarm", "ChackOutController@contactUsermitfarm")->name('contact-User-mitfarm');






// Order site......................................??


Route::get("/Delete-order-mitfarm/{order_id}", "ChackOutController@Deleteordermitfarm")->name('Delete-order-mitfarm');

Route::get("/pandingorder", "ChackOutController@pandingorder")->name('pandingorder');

Route::get("/vieworder/{sheping_id}", "ChackOutController@vieworder")->name('vieworder');

Route::get("/orderpade/{sheping_id}", "ChackOutController@orderpade")->name('orderpade');

Route::get("/viewpadeorder/{customer_id}", "ChackOutController@viewpadeorder")->name('viewpadeorder');

Route::get("/allpadeorder", "ChackOutController@allpadeorder")->name('allpadeorder');

Route::get("/deletepadeorder/{order_id}", "ChackOutController@deletepadeorder")->name('deletepadeorder');
Route::get("/froget-password", "ChackOutController@frogetpassword")->name('froget-password');

Route::post("/froget-password-sent", "ChackOutController@frogetpasswordsent")->name('froget-password-sent');




//  Gellery Site ..........................................?

Route::get("/gelleryphoto", "GelleryController@gelleryphoto")->name('gelleryphoto');

Route::post("/savegellery", "GelleryController@savegellery")->name('savegellery');

Route::get("/allgelleryphoto", "GelleryController@allgelleryphoto")->name('allgelleryphoto');

Route::get("/activephoto/{gellery_id}", "GelleryController@activephoto")->name('activephoto');

Route::get("/unactivephoto/{gellery_id}", "GelleryController@unactivephoto")->name('unactivephoto');

Route::get("/editphoto/{gellery_id}", "GelleryController@editphoto")->name('editphoto');

Route::get("/deletephoto/{gellery_id}", "GelleryController@deletephoto")->name('deletephoto');

Route::post("/updategelleryphoto/{gellery_id}", "GelleryController@updategelleryphoto")->name('updategelleryphoto');

Route::get("/See-More-Photo-mitfarm", "GelleryController@SeeMorePhotomitfarm")->name('See-More-Photo-mitfarm');
