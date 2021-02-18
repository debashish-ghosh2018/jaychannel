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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/redirect_to_home_login', 'HomeController@redirectToHomeLogin')->name('redirect_to_home_login');
Route::get('/show_admin_login', 'Auth\LoginController@showLoginForm')->name('show_admin_login');


Route::get('/member_login', 'HomeController@member_signin')->name('member_login');
Route::get('/enterprise_login', 'HomeController@enterprise_signin')->name('enterprise_login');
Route::get('/signinvendor_login', 'HomeController@vendor_signin')->name('signinvendor_login');


Route::get('/our_services/{content_type?}', 'HomeController@our_services')->name('our_services_view_all');
Route::get('/course_details/{course_id?}', 'CourseController@course_details')->name('view_course_details');


Route::get('/member_dashboard', 'Buyer\DashboardController@index')->name('show_member_dashboard');
Route::post('/add_card_details', 'Buyer\DashboardController@addCardDetails')->name('add_card_details');
Route::get('/member_manage_classes', 'Buyer\DashboardController@memberManageClass')->name('show_member_classes');


Route::get('/enterprise_dashboard', 'Enterprise\DashboardController@enterpriseClasses')->name('show_enterprise_dashboard');
Route::post('/add_enterprise_card_details', 'Enterprise\DashboardController@addEnterpriseCardDetails')->name('add_enterprise_card_details');
Route::get('/enterprise_account', 'Enterprise\DashboardController@index')->name('show_enterprise_account');


Route::get('/signinvendor_dashboard', 'HomeController@vendor_dashboard')->name('show_signinvendor_dashboard');
Route::post('/update_signinvendor_dashboard', 'HomeController@update_user_data')->name('update_signinvendor_dashboard');

Route::get('/signinvendor_manageclasses', 'CourseController@index')->name('show_signinvendor_manageclasses');
Route::get('/signinvendor_createcourse', 'CourseController@create_course')->name('show_signinvendor_createcourse');
Route::get('/signinvendor_editcourse/{id?}', 'CourseController@edit_course')->name('show_signinvendor_editcourse');
Route::post('/signinvendor_savenewcourse', 'CourseController@store')->name('show_signinvendor_savenewcourse');
Route::get('/signinvendor_finance', 'HomeController@show_vendor_finamce')->name('show_signinvendor_finance');


Route::post('/subscribe', 'SubscribeController@store')->name('save_subscriber');
Route::post('/search_vendor', 'HomeController@searchVendor')->name('search_vendor');
Route::post('/show_vendor_details', 'HomeController@showVendorDetails')->name('show_vendor_details');
Route::post('/show_credit_details', 'HomeController@showCreditDetails')->name('show_credit_details');


Route::get('/cart_checkout', 'CartController@checkout')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('checkout.cart.clear');
Route::post('/add_to_cart', 'CartController@addToCart')->name('add_to_cart');
Route::get('/view_cart', 'CartController@index')->name('view_cart');
Route::post('/place_order', 'CartController@placeOrder')->name('place_order');

Route::post('/search_course_by_title', 'HomeController@search_courses_by_description')->name('search_course_by_title');
Route::get('/show_page/{content_key?}', 'HomeController@other_pages')->name('show_page');
Route::post('/send_email_to_admin', 'HomeController@send_email_to_admin')->name('send_email_to_admin');
Route::post('/cancel_course', 'CourseController@cancel_course')->name('cancel_course');
Route::post('/add_course_to_user_wishlist', 'CourseController@add_course_to_user_wishlist')->name('add_course_to_user_wishlist');


// ---- Test email routes ----
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('show_user_register_form');
Route::post('/register', 'Auth\RegisterController@register')->name('register_user');

Route::get('/reset', 'Auth\ResetPasswordController@showResetForm')->name('reset_password');
Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('update_password');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('verify_login');
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/login');
})->name('logout');

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/');
})->name('user_logout');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->namespace('Admin')->middleware(['get.menu'])->group(function() {    
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('admin.dashboard.colors'); });
        Route::get('/typography', function () { return view('admin.dashboard.typography'); });
        Route::get('/charts', function () {     return view('admin.dashboard.charts'); });
        Route::get('/widgets', function () {    return view('admin.dashboard.widgets'); });
        Route::get('/404', function () {        return view('admin.dashboard.404'); });
        Route::get('/500', function () {        return view('admin.dashboard.500'); });
        Route::prefix('base')->group(function () {  
            Route::get('/breadcrumb', function(){   return view('admin.dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('admin.dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('admin.dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('admin.dashboard.base.collapse'); });

            Route::get('/forms', function(){        return view('admin.dashboard.base.forms'); });
            Route::get('/jumbotron', function(){    return view('admin.dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('admin.dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('admin.dashboard.base.navs'); });

            Route::get('/pagination', function(){   return view('admin.dashboard.base.pagination'); });
            Route::get('/popovers', function(){     return view('admin.dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('admin.dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('admin.dashboard.base.scrollspy'); });

            Route::get('/switches', function(){     return view('admin.dashboard.base.switches'); });
            Route::get('/tables', function () {     return view('admin.dashboard.base.tables'); });
            Route::get('/tabs', function () {       return view('admin.dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('admin.dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {  
            Route::get('/buttons', function(){          return view('admin.dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('admin.dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('admin.dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('admin.dashboard.buttons.brand-buttons'); });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('admin.dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('admin.dashboard.icons.flags'); });
            Route::get('/brands', function(){               return view('admin.dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {  
            Route::get('/alerts', function(){   return view('admin.dashboard.notifications.alerts'); });
            Route::get('/badge', function(){    return view('admin.dashboard.notifications.badge'); });
            Route::get('/modals', function(){   return view('admin.dashboard.notifications.modals'); });
        });
        Route::resource('notes', 'NotesController');
        Route::resource('users', 'UsersController');
        Route::resource('members', 'MembersController');	
        Route::resource('enterprises', 'EnterprisesController');  
        Route::resource('vendors', 'VendorsController'); 		
        Route::resource('courses', 'CoursesController'); 
		
		
        Route::resource('orders', 'OrdersController'); 
        Route::get('show_orders/{id?}/{showdetails?}', 'OrdersController@show_order')->name('showOrders');        
		
		
        Route::resource('credits', 'CreditsController');
        Route::get('list_credits', 'CreditsController@index')->name('listCredits');
        Route::post('update_credit/{id?}', 'CreditsController@update_details')->name('credit_update');
        Route::post('save_credit', 'CreditsController@save_details')->name('credit_save'); 
		
		
        Route::resource('banners', 'BannersController');
        Route::get('list_banners', 'BannersController@index')->name('listBanners');
        Route::post('update_banner/{id?}', 'BannersController@update_details')->name('banner_update');
        Route::post('save_banner', 'BannersController@save_details')->name('banner_save');		
		
		
        Route::resource('subscribers', 'SubscribersController'); 
        Route::resource('content_types', 'ContentTypesController');                
    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('bread', 'BreadController');   //create BREAD (resource)
        Route::resource('users', 'UsersController')->except( ['create', 'store'] );
        Route::resource('roles', 'RolesController');
        Route::resource('mail',  'MailController');
        Route::get('prepareSend/{id}', 'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}', 'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up', 'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down', 'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });
    });
});