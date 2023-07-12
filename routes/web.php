<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SettingController;


require __DIR__.'/auth.php';

/**** TODOS *****************
* Acceso para todos frontend
****************************/

// Home User Frontend All Route
Route::get('/', [UserController::class, 'index'])->name('casa');
Route::get('/category/all', [UserController::class, 'CategoryAll'])->name('category.all');

// Login and Register
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');


// Frontend Property Details All Routes (IndexController)
Route::get('/property/details/{id}/{slug}', [IndexController::class, 'PropertyDetails']);

// Para desplegar el mapa
Route::get('/google/maps/{latitude}/{longitude}', [IndexController::class, 'VerEnGoogleMapsConLatitude']);
    // Route::post('/google/map', [IndexController::class, 'VerEnGoogleMaps'])->name('google.map'); // si lo queremos hacer con parámetros POST

// Para Wishlist
Route::post('/add-to-wishList/{property_id}', [WishlistController::class, 'AddToWishList']);

// Para Compare
Route::post('/add-to-compare/{property_id}', [CompareController::class, 'AddToCompare']);

// Para formulario de enviar mensaje en resources/views/frontend/property/property_details.blade.php
Route::post('/property/message', [IndexController::class, 'PropertyMessage'])->name('property.message');

// Para ver los detalles de uno de los agentes, desde el frontend resources/views/frontend/home/team.blade.php dan click en <h4><a href="{{ route('agent.details', $item->id) }}">{{ $item->name }}</a></h4>
Route::get('/agent/details/{id}', [IndexController::class, 'AgentDetails'])->name('agent.details');

// Para formulario de enviar mensaje en resources/views/frontend/agent/agent_details.blade.php
Route::post('/agent/details/message', [IndexController::class, 'AgentDetailsMessage'])->name('agent.details.message');

// Para listar todas las propiedades solo para renta, llamado de resources/views/frontend/agent/agent_details.blade.php
Route::get('/rent/list/property', [IndexController::class, 'RentListProperty'])->name('rent.list.property');

// Para listar todas las propiedades solo para compra, llamado de resources/views/frontend/agent/agent_details.blade.php
Route::get('/buy/list/property', [IndexController::class, 'BuyListProperty'])->name('buy.list.property');

// Para listar todas las propiedades
Route::get('/all/list/property', [IndexController::class, 'ListAllProperty'])->name('all.list.property');

// Para listar todas las propiedades por categoría, llamado de resources/views/frontend/home/category_todas.blade.php
Route::get('/property/type/{id}', [IndexController::class, 'PropertyType'])->name('property.type');

// Para listar todas las propiedades de un estado si dan click en frontend,  llamado de resources/views/frontend/home/place.blade.php
Route::get('/state/details/{id}', [IndexController::class, 'StateDetails'])->name('state.details');

// En pagina de inicio para formulario en resources/views/frontend/home/banner.blade.php, para búsqueda de propiedades solo para compra
Route::post('/buy/property/search', [IndexController::class, 'BuyPropertySearch'])->name('buy.property.search');

// En pagina de inicio para formulario en resources/views/frontend/home/banner.blade.php, para búsqueda de propiedades solo para renta
Route::post('/rent/property/search', [IndexController::class, 'RentPropertySearch'])->name('rent.property.search');

// All Property Search Option para formulario en resources/views/frontend/property/rent_property.blade.php, para buscar propiedades
Route::post('/all/property/search', [IndexController::class, 'AllPropertySearch'])->name('all.property.search');


/* Citas */

// Schedule Message Request - llamado de resources/views/frontend/property/property_details.blade.php
Route::post('/store/schedule', [IndexController::class, 'StoreSchedule'])->name('store.schedule');




/* Blog Rutas */

// Blog Details - Ver Detalles de Artículos y Noticias, llamado de resources/views/frontend/home/news.blade.php
Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);
// Blog Details - Lista por categoría, llamado de resources/views/frontend/blog/blog_details.blade.php
Route::get('/blog/cat/list/{id}', [BlogController::class, 'BlogCatList']);
// Blog List - llamado de resources/views/frontend/home/header.blade.php
Route::get('/blog', [BlogController::class, 'BlogList'])->name('blog.list');
// Blog Almacenar comentario - llamado de resources/views/frontend/blog/blog_details.blade.php
Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
// Blog Comments - llamado de resources/views/admin/body/sidebar.blade.php
Route::get('/admin/blog/comments', [BlogController::class, 'AdminBlogComments'])->name('admin.blog.comments');
// Blog Comment Reply - llamado de resources/views/backend/comment/comment_all.blade.php
Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
// Blog Replay Message - llamado de resources/views/backend/comment/comment_reply.blade.php
Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');



/**** USER ********************************************************
* User
* Pagina de inicio de sesión: resources/views/auth/login.blade.php
*******************************************************************/

// user '/dashboard' cuando user hace login valido aquí entra
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User group middleware, profile, logout, change password, Wishlist, Compare
Route::middleware('auth')->group(function () {

    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    // Ver citas desde user dashboard - llamado de resources/views/frontend/dashboard/dashboard_sidebar.blade.php
    Route::get('/user/schedule/request', [UserController::class, 'UserScheduleRequest'])->name('user.schedule.request');


    // User Wishlist All Routes
    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist', 'UserWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-property', 'GetWishlistProperty');
        Route::get('/wishlist-remove/{id}', 'WishlistRemove');
    });

    // User Compare All Routes
    Route::controller(CompareController::class)->group(function(){

        Route::get('/user/compare', 'UserCompare')->name('user.compare');
        Route::get('/get-compare-property', 'GetCompareProperty');
        Route::get('/compare-remove/{id}', 'CompareRemove');

    });

});


/**** ADMIN ***************************************************************
* Admin
* Pagina de inicio de sesión: resources/views/admin/admin_login.blade.php
**************************************************************************/

// Admin group middleware, Dashboard, profile, logout, change password, All Routes
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::post('/admin/topbar/store', [AdminController::class, 'AdminTopbarStore'])->name('admin.topbar.store');
});

// Admin group middleware, Property Type, Amenities, Property CRUD etc...
Route::middleware(['auth','role:admin'])->group(function(){

    // CRUD Property Type - tabla 'property_types'
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    // Admin CRUD Amenities - tabla 'amenities'
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('/add/amenities', 'AddAmenities')->name('add.amenities');
        Route::post('/store/amenities', 'StoreAmenities')->name('store.amenities');
        Route::get('/edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::post('/update/amenities', 'UpdateAmenities')->name('update.amenities');
        Route::get('/delete/amenities/{id}', 'DeleteAmenities')->name('delete.amenities');
    });

    // Admin CRUD Property - tabla 'properties', 'multi_images', 'package_plans', 'property_messages'
    Route::controller(PropertyController::class)->group(function(){

        Route::get('/all/property', 'AllProperty')->name('all.property');

        Route::get('/add/property', 'AddProperty')->name('add.property');
        Route::post('/store/property', 'StoreProperty')->name('store.property');
        Route::get('/edit/property/{id}', 'EditProperty')->name('edit.property');
        Route::post('/update/property', 'UpdateProperty')->name('update.property');

        Route::post('/update/property/thumbnail', 'UpdatePropertyThumbnail')->name('update.property.thumbnail');
        Route::post('/update/property/multi-image', 'UpdatePropertyMultiImage')->name('update.property.multi-image');
        Route::get('/delete/property/multi-image/{id}', 'DeleteMultiImageProperty')->name('delete.property.multi-image');
        Route::post('/store/new/multi-image', 'StoreNewMultiImage')->name('store.new.multi-image');
        Route::post('/store/property/facilities', 'UpdatePropertyFacilities')->name('update.property.facilities');

        Route::get('/delete/property/{id}', 'DeleteProperty')->name('delete.property');
        Route::get('/details/property/{id}', 'DetailsProperty')->name('details.property');
        Route::post('/inactive/property', 'InactiveProperty')->name('inactive.property');
        Route::post('/active/property', 'ActiveProperty')->name('active.property');

        Route::get('/admin/package/history', 'AdminPackageHistory')->name('admin.package.history');
        Route::get('/admin/package/invoice/{id}', 'AdminPackageInvoice')->name('admin.package.invoice');

        Route::get('/admin/property/message', 'AdminPropertyMessage')->name('admin.property.message');
        Route::get('/admin/message/details/{id}', 'AdminMessageDetails')->name('admin.message.details');

    });

    // Admin CRUD Agent - tabla 'users' role 'agent'
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/agent', 'AllAgent')->name('all.agent');
        Route::get('/add/agent', 'AddAgent')->name('add.agent');
        Route::post('/store/agent', 'StoreAgent')->name('store.agent');
        Route::get('/edit/agent/{id}', 'EditAgent')->name('edit.agent');
        Route::post('/update/agent', 'UpdateAgent')->name('update.agent');
        Route::get('/delete/agent/{id}', 'DeleteAgent')->name('delete.agent');
        Route::get('/changeStatus', 'changeStatus');

    });

    // Admin CRUD estados (Entidad Federativa) - tabla 'states'
    Route::controller(StateController::class)->group(function(){

        Route::get('/all/state', 'AllState')->name('all.state');
        Route::get('/add/state', 'AddState')->name('add.state');
        Route::post('/store/state', 'StoreState')->name('store.state');
        Route::get('/edit/state/{id}', 'EditState')->name('edit.state');
        Route::post('/update/state', 'UpdateState')->name('update.state');
        Route::get('/delete/state/{id}', 'DeleteState')->name('delete.state');

    });

    // Admin CRUD Users - Lista Todos los usuarios tabla 'users'
    Route::controller(UsersController::class)->group(function () {
        Route::get('/admin/all/users', 'AdminAllUsers')->name('admin.all.users');
    });

    // Admin CRUD Testimonials - tabla 'testimonials'
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/all/testimonials', 'AllTestimonials')->name('all.testimonials');
        Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    });

    // Admin CRUD Blog Category - tabla 'blog_categories'
    Route::controller(BlogController::class)->group(function(){
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/blog/category/{id}', 'EditBlogCategory');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });

    // Admin CRUD Blog Post - tabla 'blog_posts'
    Route::controller(BlogController::class)->group(function () {
        Route::get('/all/post', 'AllPost')->name('all.post');
        Route::get('/add/post', 'AddPost')->name('add.post');
        Route::post('/store/post', 'StorePost')->name('store.post');
        Route::get('/edit/post/{id}', 'EditPost')->name('edit.post');
        Route::post('/update/post', 'UpdatePost')->name('update.post');
        Route::get('/delete/post/{id}', 'DeletePost')->name('delete.post');
    });

     // Admin CRUD Blog Comments - tabla 'comments'
     Route::controller(BlogController::class)->group(function () {

        Route::get('/changeStatusApproved', 'UpdateCommentApproved');
        Route::get('/changeStatusLeido', 'UpdateCommentLeido');
        Route::get('/comment/edit/response/{id}', 'EditCommentResponse');
        Route::post('/update/comments/response', 'UpdateCommentsResponse')->name('update.comments.response');
        Route::get('/delete/comment/response/{id}', 'DeleteCommentResponse')->name('delete.comment.response');

    });

    // Admin CRUD Smtp Settings - tabla 'smtp_settings'
    Route::controller(SettingController::class)->group(function () {
        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting');
        Route::post('/update/smtp/setting', 'UpdateSmtpSetting')->name('update.smtp.setting');
    });

    // Admin CRUD Site Settings - tabla 'site_settings'
    Route::controller(SettingController::class)->group(function () {
        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/update/smtp/setting', 'UpdateSmtpSetting')->name('update.smtp.setting');
    });

});


/**** AGENT **************************************************************
* Agent
* Pagina de inicio de sesión: resources/views/agent/agent_login.blade.php
*************************************************************************/

// Agent group middleware
Route::middleware(['auth','role:agent'])->group(function(){

    // Agent group middleware (AgentController) - Dashboard, Logout, Profile, Change Password
    Route::controller(AgentController::class)->group(function(){
        Route::get('/agent/dashboard', 'AgentDashboard')->name('agent.dashboard');
        Route::get('/agent/logout', 'AgentLogout')->name('agent.logout');
        Route::get('/agent/profile', 'AgentProfile')->name('agent.profile');
        Route::post('/agent/profile/store', 'AgentProfileStore')->name('agent.profile.store');
        Route::get('/agent/change/password', 'AgentChangePassword')->name('agent.change.password');
        Route::post('/agent/update/password', 'AgentUpdatePassword')->name('agent.update.password');
    });

    // Agent Grupo de Rutas (AgentPropertyController) - Propiedades
    Route::controller(AgentPropertyController::class)->group(function(){

        Route::get('/agent/all/property', 'AgentAllProperty')->name('agent.all.property');
        Route::get('/agent/add/property', 'AgentAddProperty')->name('agent.add.property');
        Route::post('/agent/store/property', 'AgentStoreProperty')->name('agent.store.property');
        Route::get('/agent/edit/property/{id}', 'AgentEditProperty')->name('agent.edit.property');
        Route::post('/agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');
        Route::post('/agent/update/property/thumbnail', 'AgentUpdatePropertyThumbnail')->name('agent.update.property.thumbnail');
        Route::post('/agent/update/property/multi-image', 'AgentUpdatePropertyMultiImage')->name('agent.update.property.multi-image');
        Route::get('/agent/delete/property/multi-image/{id}', 'AgentDeletePropertyMultiImage')->name('agent.delete.property.multi-image');
        Route::post('/agent/store/new/multi-image', 'AgentStoreNewMultiImage')->name('agent.store.new.multi-image');
        Route::post('/agent/update/property/facilities', 'AgentUpdatePropertyFacilities')->name('agent.update.property.facilities');
        Route::get('/agent/details/property/{id}', 'AgentDetailsProperty')->name('agent.details.property');
        Route::get('/agent/delete/property/{id}', 'AgentDeleteProperty')->name('agent.delete.property');

        Route::get('/agent/property/message', 'AgentPropertyMessage')->name('agent.property.message');
        Route::get('/agent/message/details/{id}', 'AgentMessageDetails')->name('agent.message.details');

        // Schedule Request, llamado de resources/views/agent/body/sidebar.blade.php
        Route::get('/agent/schedule/request', 'AgentScheduleRequest')->name('agent.schedule.request');
        Route::get('/agent/details/schedule/{id}', 'AgentDetailsSchedule')->name('agent.details.schedule');
        Route::post('/agent/update/schedule', 'AgentUpdateSchedule')->name('agent.update.schedule');
        Route::get('/agent/delete/schedule/{id}', 'AgentDeleteSchedule')->name('agent.delete.schedule');

    });

    // Agent Grupo de Rutas (AgentPropertyController) - Buy Package
    Route::controller(AgentPropertyController::class)->group(function(){
        Route::get('/buy/package', 'BuyPackage')->name('buy.package');
        Route::get('/buy/business/plan', 'BuyBusinessPlan')->name('buy.business.plan');
        Route::post('/store/business/plan', 'StoreBusinessPlan')->name('store.business.plan');
        Route::get('/buy/professional/plan', 'BuyProfessionalPlan')->name('buy.professional.plan');
        Route::post('/store/professional/plan', 'StoreProfessionalPlan')->name('store.professional.plan');
        Route::get('/package/history', 'PackageHistory')->name('package.history');
        Route::get('/agent/package/invoice/{id}', 'AgentPackageInvoice')->name('agent.package.invoice');
    });

});



