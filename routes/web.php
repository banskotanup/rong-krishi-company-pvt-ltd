<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Home\ProductController as ProductFront;
use App\Http\Controllers\Home\BlogController as BlogFront;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

//welcome route..... 
route::get('/',[LandingPageController::class, 'welcome']);

//AuthRoutes Goes Here...
route::post('/auth_login', [AuthController::class, 'auth_login']);
route::get('/ipChange', [AuthController::class, 'ipChange']);
route::post('/ipChange', [AuthController::class, 'auth_ipChange']);
route::get('/forgot-password', [AuthController::class, 'forgot_password']);
route::post('/forgot-password', [AuthController::class, 'auth_forgot_password']);
route::get('/reset/{token}', [AuthController::class, 'reset']);
route::post('/reset/{token}', [AuthController::class, 'authReset']);
route::get('/changePw/{token}', [AuthController::class, 'changePw']);
route::post('/changePw/{token}', [AuthController::class, 'authChangePw']);

//AuthController Routes Goes Here...
// route::get('/login',[AuthController::class, 'login_admin']);
// route::post('/login',[AuthController::class, 'auth_login_admin']);
route::get('/log_out',[AuthController::class, 'log_out']);

// AdminController Routes Goes Here...
route::get('/admin_dashboard',[AdminController::class, 'index'])->middleware('is_admin');
route::get('/admin_list',[AdminController::class, 'admin_list'])->middleware('is_admin');
route::get('/admin_add',[AdminController::class, 'admin_add'])->middleware('is_admin');
route::post('/admin_add',[AdminController::class, 'insert_admin'])->middleware('is_admin');
route::get('/admin_edit/{id}',[AdminController::class, 'edit_admin'])->middleware('is_admin');
route::post('/admin_edit/{id}',[AdminController::class, 'update_edit_admin'])->middleware('is_admin');
route::get('/admin_delete/{id}',[AdminController::class, 'delete_admin'])->middleware('is_admin');

//MemberController Routes Goes Here....
route::get('/member_list',[MemberController::class, 'member_list'])->middleware('is_admin');
route::get('/member_add',[MemberController::class, 'member_add'])->middleware('is_admin');
route::post('/member_add',[MemberController::class, 'insert_member'])->middleware('is_admin');
route::get('/activate/{id}',[MemberController::class, 'activate_email']);
route::get('/member_edit/{id}',[MemberController::class, 'edit_member'])->middleware('is_admin');
route::post('/member_edit/{id}',[MemberController::class, 'update_edit_member'])->middleware('is_admin');
route::get('/member_delete/{id}',[MemberController::class, 'delete_member'])->middleware('is_admin');

//CategoryController Routes Goes Here....
route::get('/category_list',[CategoryController::class, 'category_list'])->middleware('is_admin');
route::get('/category_add',[CategoryController::class, 'category_add'])->middleware('is_admin');
route::post('/category_add',[CategoryController::class, 'insert_category'])->middleware('is_admin');
route::get('/category_edit/{id}',[CategoryController::class, 'edit_category'])->middleware('is_admin');
route::post('/category_edit/{id}',[CategoryController::class, 'update_edit_category'])->middleware('is_admin');
route::get('/category_delete/{id}',[CategoryController::class, 'delete_category'])->middleware('is_admin');

//SubCategoryController Routes Goes Here...
route::get('/sub_category_list',[SubCategoryController::class, 'sub_category_list'])->middleware('is_admin');
route::get('/sub_category_add',[SubCategoryController::class, 'sub_category_add'])->middleware('is_admin');
route::post('/sub_category_add',[SubCategoryController::class, 'insert_sub_category'])->middleware('is_admin');
route::get('/sub_category_edit/{id}',[SubCategoryController::class, 'edit_sub_category'])->middleware('is_admin');
route::post('/sub_category_edit/{id}',[SubCategoryController::class, 'update_edit_sub_category'])->middleware('is_admin');
route::get('/sub_category_delete/{id}',[SubCategoryController::class, 'delete_sub_category'])->middleware('is_admin');

route::post('/get_sub_category',[SubCategoryController::class, 'get_sub_category'])->middleware('is_admin');

//ProductController Routes Goes Here....
route::get('/product_list',[ProductController::class, 'product_list'])->middleware('is_admin');
route::get('/product_add',[ProductController::class, 'product_add'])->middleware('is_admin');
route::post('/product_add',[ProductController::class, 'insert_product'])->middleware('is_admin');
route::get('/product_add/{id}',[ProductController::class, 'add_product'])->middleware('is_admin');
route::post('/product_add/{id}',[ProductController::class, 'update_add_product'])->middleware('is_admin');
route::post('/product_add/{id}/calculate_total',[ProductController::class, 'calculate_total'])->middleware('is_admin');
route::get('/product_edit/{id}',[ProductController::class, 'edit_product'])->middleware('is_admin');
route::post('/product_edit/{id}',[ProductController::class, 'update_edit_product'])->middleware('is_admin');
route::get('/product_delete/{id}',[ProductController::class, 'delete_product'])->middleware('is_admin');

//Discount Model Controller Goes here
route::get('/discount_list',[DiscountController::class, 'discount_list'])->middleware('is_admin');
route::get('/discount_add',[DiscountController::class, 'discount_add'])->middleware('is_admin');
route::post('/discount_add',[DiscountController::class, 'insert_discount'])->middleware('is_admin');
route::get('/discount_edit/{id}',[DiscountController::class, 'edit_discount'])->middleware('is_admin');
route::post('/discount_edit/{id}',[DiscountController::class, 'update_edit_discount'])->middleware('is_admin');
route::get('/discount_delete/{id}',[DiscountController::class, 'delete_discount'])->middleware('is_admin');


route::get('/shipping_charge_list',[ShippingChargeController::class, 'shipping_charge_list'])->middleware('is_admin');
route::get('/shipping_charge_add',[ShippingChargeController::class, 'shipping_charge_add'])->middleware('is_admin');
route::post('/shipping_charge_add',[ShippingChargeController::class, 'insert_shipping_charge'])->middleware('is_admin');
route::get('/shipping_charge_edit/{id}',[ShippingChargeController::class, 'edit_shipping_charge'])->middleware('is_admin');
route::post('/shipping_charge_edit/{id}',[ShippingChargeController::class, 'update_edit_shipping_charge'])->middleware('is_admin');
route::get('/shipping_charge_delete/{id}',[ShippingChargeController::class, 'delete_shipping_charge'])->middleware('is_admin');

route::get('/blog_category_list',[BlogCategoryController::class, 'blog_category_list'])->middleware('is_admin');
route::get('/blog_category_add',[BlogCategoryController::class, 'blog_category_add'])->middleware('is_admin');
route::post('/blog_category_add',[BlogCategoryController::class, 'insert_blog_category'])->middleware('is_admin');
route::get('/blog_category_edit/{id}',[BlogCategoryController::class, 'edit_blog_category'])->middleware('is_admin');
route::post('/blog_category_edit/{id}',[BlogCategoryController::class, 'update_edit_blog_category'])->middleware('is_admin');
route::get('/blog_category_delete/{id}',[BlogCategoryController::class, 'delete_blog_category'])->middleware('is_admin');

route::get('/admin_blog',[BlogController::class, 'admin_blog'])->middleware('is_admin');
route::get('/blog_add',[BlogController::class, 'blog_add'])->middleware('is_admin');
route::post('/blog_add',[BlogController::class, 'insert_blog'])->middleware('is_admin');
route::get('/blog_edit/{id}',[BlogController::class, 'edit_blog'])->middleware('is_admin');
route::post('/blog_edit/{id}',[BlogController::class, 'update_edit_blog'])->middleware('is_admin');
route::get('/blog_delete/{id}',[BlogController::class, 'delete_blog'])->middleware('is_admin');

route::get('/order_list',[OrderController::class, 'order_list'])->middleware('is_admin');
route::get('/order_status',[OrderController::class, 'order_status'])->middleware('is_admin');
route::get('/order_view/{id}',[OrderController::class, 'order_view'])->middleware('is_admin');

route::get('/aboutus',[PageController::class, 'aboutus'])->middleware('is_admin');
route::post('/aboutus',[PageController::class, 'update_about_us'])->middleware('is_admin');
route::get('/system_setting',[PageController::class, 'index'])->middleware('is_admin');
route::post('/system_setting',[PageController::class, 'update_system_settings'])->middleware('is_admin');

route::get('/our_team',[PageController::class, 'our_team'])->middleware('is_admin');
route::get('/add_team_member',[PageController::class, 'add_team_member'])->middleware('is_admin');
route::post('/add_team_member',[PageController::class, 'insert_team_member'])->middleware('is_admin');
route::get('/our_team_edit/{id}',[PageController::class, 'edit_team_member'])->middleware('is_admin');
route::post('/our_team_edit/{id}',[PageController::class, 'update_edit_team_member'])->middleware('is_admin');
route::get('/our_team_delete/{id}',[PageController::class, 'our_team_delete'])->middleware('is_admin');

//ImageController Routes Goes Here.....
route::get('/image_delete/{id}',[ProductController::class, 'image_delete'])->middleware('is_admin');
route::post('/product_image_sortable',[ProductController::class, 'product_image_sortable'])->middleware('is_admin');


route::get('/user_dashboard/{id}',[UserController::class, 'dashboard'])->middleware('is_user');
route::get('/user_orders',[UserController::class, 'user_orders'])->middleware('is_user');
route::get('/user_order_status',[UserController::class, 'user_order_status'])->middleware('is_user');
route::get('/user_order_view/{id}',[UserController::class, 'user_order_view'])->middleware('is_user');
route::get('/edit_profile',[UserController::class, 'edit_profile'])->middleware('is_user');
route::post('/edit_profile',[UserController::class, 'update_profile'])->middleware('is_user');
route::get('/change_password',[UserController::class, 'changePw404'])->middleware('is_user');
route::get('/change_password/{token}',[UserController::class, 'changePw'])->middleware('is_user');
route::post('/change_password/{token}', [UserController::class, 'authChangePw'])->middleware('is_user');



//HomeController Routes Goes Here.....
route::get('/home',[HomeController::class, 'index']);


route::get('/shop',[HomeController::class, 'getShop']);
route::get('/about_us',[HomeController::class, 'about_us']);
route::get('/contact_us',[HomeController::class, 'contact_us']);
route::post('/contact_us',[HomeController::class, 'submit_contact']);
route::get('/faq',[HomeController::class, 'faq']);
route::get('/error_404',[HomeController::class, 'error_404']);
route::get('/blog',[HomeController::class, 'blog']);
route::get('/blog/{slug}',[HomeController::class, 'blog_detail']);
route::get('/blog/category/{slug}',[HomeController::class, 'blog_category']);
route::post('blog/submit_comment',[HomeController::class, 'submit_blog_comment'])->middleware('is_user');


//Home/ProductController Goes Here...

route::get('/checkout',[CartController::class, 'checkout']);
route::post('/checkout/apply_discount_code',[CartController::class, 'apply_discount_code']);
route::post('/checkout/place_order',[CartController::class, 'place_order']);
route::get('/checkout/payment',[CartController::class, 'checkout_payment']);
route::get('/stripe/payment-success',[CartController::class, 'stripe_success_payment']);
route::post('add_to_wishlist', [CartController::class, 'add_to_wishlist']);
route::get('my-wishlist', [ProductFront::class, 'my_wishlist']);



route::get('/search',[ProductFront::class, 'getProductSearch']);
route::post('get_filter_product_ajax',[ProductFront::class, 'getFilterProductAjax']);
route::get('/cart/delete/{rowId}',[CartController::class, 'cart_delete']);
route::get('/cart',[CartController::class, 'getCart']);
route::post('/cart',[CartController::class, 'add_to_Cart']);
route::post('/cart/update',[CartController::class, 'update_cart']);
route::get('{category?}/{subcategory?}',[ProductFront::class, 'getCategory']);






