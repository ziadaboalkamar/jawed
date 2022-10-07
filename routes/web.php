<?php

use App\Http\Controllers\ControlPanel\AboutUsController;
use App\Http\Controllers\ControlPanel\AchievementController;
use App\Http\Controllers\ControlPanel\BlogController;
use App\Http\Controllers\ControlPanel\ClientOpinionController;
use App\Http\Controllers\ControlPanel\ConsultationsController;
use App\Http\Controllers\ControlPanel\ContactController as ControlPanelContactController;
use App\Http\Controllers\ControlPanel\CoursesController;
use App\Http\Controllers\ControlPanel\DashboardController;
use App\Http\Controllers\ControlPanel\DiplomasController;
use App\Http\Controllers\ControlPanel\FaqsController;
use App\Http\Controllers\ControlPanel\InitiativesController;
use App\Http\Controllers\ControlPanel\LibrariesController;
use App\Http\Controllers\ControlPanel\MembershipsController;
use App\Http\Controllers\ControlPanel\PartnersController;
use App\Http\Controllers\ControlPanel\PhotoAlbumController;
use App\Http\Controllers\ControlPanel\PoliciesController;
use App\Http\Controllers\ControlPanel\ProductsController;
use App\Http\Controllers\ControlPanel\ReportsController;
use App\Http\Controllers\ControlPanel\ServicesController;
use App\Http\Controllers\ControlPanel\TeamController;
use App\Http\Controllers\ControlPanel\UserController;
use App\Http\Controllers\ControlPanel\SliderController;
use App\Http\Controllers\ControlPanel\StatisticsController;
use App\Http\Controllers\ControlPanel\StructureController;
use App\Http\Controllers\ControlPanel\UsersCourseController;
use App\Http\Controllers\ControlPanel\UsersDiplomasController;
use App\Http\Controllers\ControlPanel\VedioAlbumController;
use App\Http\Controllers\ControlPanel\VolunteersController;
use App\Http\Controllers\ControlPanel\WebsitController;
use App\Http\Controllers\DashboardClientController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CoursesController as FrontCourseController;
use App\Http\Controllers\Front\DiplomaController as FrontDiplomaController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\MobadaraController;
use App\Http\Controllers\Front\AlbumController;
use App\Http\Controllers\Front\ConsultationsController as FrontConsultationsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\MembershipController;
use App\Http\Controllers\Front\VolunteersController as FrontVolunteersController;
use App\Http\Controllers\Front\EcommerceController;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/foo', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
});



// Route::get('/dashbourd', function () {
//     dd('hello');
//     return view('control-panel.dashboard');
// });

// Control Panel Routs
Route::middleware(['admin.auth','check_role:2,1'])
        ->prefix('control-panel')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
            Route::get('users', [UserController::class, 'index'])->name('all-users');
            Route::get('users/create', [UserController::class, 'create'])->name('create-users');
            Route::post('users/create', [UserController::class, 'store'])->name('store-users');
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit-users');
            Route::put('users/{user}', [UserController::class, 'update'])->name('update-users');
            Route::delete('users', [UserController::class, 'destroy'])->name('delete-users');

            Route::get('setting/website-setting', [WebsitController::class, 'edit'])->name('setting-website-edit');
            Route::post('setting/website-setting', [WebsitController::class, 'update'])->name('setting-website-update');

            Route::get('memdership-description', [MembershipsController::class, 'membershipDescription'])->name('memdership-description');
            Route::post('memdership-description', [MembershipsController::class, 'membershipDescriptionStore']);

            Route::get('about-us', [AboutUsController::class, 'edit'])->name('about-us-edit');
            Route::post('about-us', [AboutUsController::class, 'update'])->name('about-us-update');

            Route::get('structure', [StructureController::class, 'edit'])->name('structure-edit');
            Route::post('structure', [StructureController::class, 'update'])->name('structure-update');

            Route::get('achievement', [AchievementController::class, 'edit'])->name('achievement-edit');
            Route::post('achievement', [AchievementController::class, 'update'])->name('achievement-update');

            Route::resource('blogs', BlogController::class);

            Route::resource('reports', ReportsController::class);
            Route::delete('reports/selectors/bulk-delete',[ReportsController::class,'bulkDelete'])->name('reports.bulk-delete');

            Route::resource('policies', PoliciesController::class);
            Route::delete('policies/selectors/bulk-delete',[PoliciesController::class,'bulkDelete'])->name('policies.bulk-delete');

            Route::resource('services', ServicesController::class);
            Route::delete('services/selectors/bulk-delete',[ServicesController::class,'bulkDelete'])->name('services.bulk-delete');

            Route::resource('faqs', FaqsController::class);
            Route::delete('faqs/selectors/bulk-delete',[FaqsController::class,'bulkDelete'])->name('faqs.bulk-delete');

            Route::resource('client-opinions', ClientOpinionController::class);
            Route::delete('client-opinions/selectors/bulk-delete',[ClientOpinionController::class,'bulkDelete'])->name('client-opinions.bulk-delete');

            Route::resource('partners', PartnersController::class);
            Route::delete('partners/selectors/bulk-delete',[PartnersController::class,'bulkDelete'])->name('partners.bulk-delete');

            Route::resource('statistics', StatisticsController::class);
            Route::delete('statistics/selectors/bulk-delete',[StatisticsController::class,'bulkDelete'])->name('statistics.bulk-delete');

            Route::resource('volunteers', VolunteersController::class)->except(['edit', 'update', 'store', 'create', 'show']);
            Route::delete('volunteers/selectors/bulk-delete',[VolunteersController::class,'bulkDelete'])->name('volunteers.bulk-delete');
            Route::post('volunteer/update-status/{volunteer}', [VolunteersController::class, 'updateStatus'])->name('volunteers.updateStatus');

            Route::resource('memberships', MembershipsController::class)->except(['edit', 'update', 'store', 'create', 'show']);
            Route::delete('memberships/selectors/bulk-delete',[MembershipsController::class,'bulkDelete'])->name('memberships.bulk-delete');
            Route::post('memberships/update-status/{membership}', [MembershipsController::class, 'updateStatus'])->name('memberships.updateStatus');

            Route::resource('consultations', ConsultationsController::class)->except(['edit', 'update', 'store', 'create', 'show']);
            Route::delete('consultations/selectors/bulk-delete',[ConsultationsController::class,'bulkDelete'])->name('consultations.bulk-delete');
            Route::post('consultations/update-status/{consultation}', [ConsultationsController::class, 'updateStatus'])->name('consultations.updateStatus');

            Route::resource('initiatives', InitiativesController::class);
            Route::delete('initiatives/selectors/bulk-delete',[InitiativesController::class,'bulkDelete'])->name('initiatives.bulk-delete');

            Route::resource('libraries', LibrariesController::class);
            Route::delete('libraries/selectors/bulk-delete',[LibrariesController::class,'bulkDelete'])->name('libraries.bulk-delete');

            Route::resource('products', ProductsController::class);
            Route::delete('products/selectors/bulk-delete',[ProductsController::class,'bulkDelete'])->name('products.bulk-delete');

            Route::resource('courses', CoursesController::class);
            Route::delete('courses/selectors/bulk-delete',[CoursesController::class,'bulkDelete'])->name('courses.bulk-delete');

            Route::get('course-users/{course}', [UsersCourseController::class, 'index'])->name('course-users.index');
            Route::resource('course-users', UsersCourseController::class)->except(['index', 'store', 'show', 'create', 'edit']);
            Route::delete('course-users/selectors/bulk-delete',[UsersCourseController::class,'bulkDelete'])->name('course-users.bulk-delete');

            Route::resource('diplomas', DiplomasController::class);
            Route::delete('diplomas/selectors/bulk-delete',[DiplomasController::class,'bulkDelete'])->name('diplomas.bulk-delete');

            Route::get('diploma-users/{diploma}', [UsersDiplomasController::class, 'index'])->name('diploma-users.index');
            Route::resource('diploma-users', UsersDiplomasController::class)->except(['index', 'store', 'show', 'create', 'edit']);
            Route::delete('diploma-users/selectors/bulk-delete',[UsersDiplomasController::class,'bulkDelete'])->name('diploma-users.bulk-delete');

            Route::resource('teams', TeamController::class);

            Route::get('contacts',[ControlPanelContactController::class,'index'])->name('contacts.index');
            Route::post('contacts/{contact}',[ControlPanelContactController::class,'show'])->name('contacts.show');
            Route::delete('contacts/selectors/bulk-delete',[ControlPanelContactController::class,'bulkDelete'])->name('contacts.bulk-delete');

            Route::delete('contacts/{contact}',[ControlPanelContactController::class,'destroy'])->name('contacts.destroy');
            Route::resource('sliders', SliderController::class);


            Route::resource('photo-album',PhotoAlbumController::class);
            Route::put('photo-album/{photo_album}/photos',[PhotoAlbumController::class,'updatePhotos'])->name('photo-album.updatePhotos');
            Route::resource('vedio-album',VedioAlbumController::class);

        });


 Route::as('view.')
     ->group(function () {
         Route::get('/',[HomeController::class,'index'])->name('index');
         Route::get('/structure',[HomeController::class,'structure'])->name('structure');
         Route::get('/achievement',[HomeController::class,'achievement'])->name('achievement');
         Route::get('/policies',[HomeController::class,'policies'])->name('policies');
         Route::get('/reports',[HomeController::class,'reports'])->name('reports');
         Route::get('/library',[HomeController::class,'library'])->name('library');
         Route::get('/partner',[HomeController::class,'partner'])->name('partner');
         Route::get('/faq',[HomeController::class,'faqs'])->name('faqs');

         Route::as('client.')
         ->middleware(['auth', 'check_role:3'])
         ->group(function () {
             Route::get('/dashboard',[DashboardClientController::class,'index'])->name('dashboard');

         });
         Route::as('courses.')
             ->group(function () {
                 Route::get('/courses',[FrontCourseController::class,'index'])->name('index');
                 Route::post('/courses/search',[FrontCourseController::class,'search'])->name('search');
                 Route::get('/courses/view/{id}',[FrontCourseController::class,'show'])->name('show');
                 Route::get('/courses/payment/{id}',[FrontCourseController::class,'paymentView'])->name('paymentView')->middleware("auth");
                 Route::post('/courses/payment/{id}',[FrontCourseController::class,'paymentStore'])->middleware("auth");


             });
         Route::as('diploma.')
             ->group(function () {
                 Route::get('/diploma',[FrontDiplomaController::class,'index'])->name('index');
                 Route::post('/diploma/search',[FrontDiplomaController::class,'search'])->name('search');
                 Route::get('/diploma/view/{id}',[FrontDiplomaController::class,'show'])->name('show');
                 Route::get('/diploma/payment/{id}',[FrontDiplomaController::class,'paymentView'])->name('paymentView')->middleware("auth");
                 Route::post('/diploma/payment/{id}',[FrontDiplomaController::class,'paymentStore'])->middleware("auth");

             });
         Route::as('aboutus.')
             ->group(function () {
                 Route::get('/aboutUs',[HomeController::class,'aboutUs'])->name('aboutUs');

             });
         Route::as('news.')
             ->group(function () {
                 Route::get('/news',[NewsController::class,'index'])->name('index');
                 Route::post('/news/search',[NewsController::class,'search'])->name('search');
                 Route::get('/news/view/{id}',[NewsController::class,'show'])->name('show');

             });
         Route::as('Initiative.')
             ->group(function () {
                 Route::get('/Initiative',[MobadaraController::class,'index'])->name('index');
                 Route::post('/Initiative/search',[MobadaraController::class,'search'])->name('search');
                 Route::get('/Initiative/view/{id}',[MobadaraController::class,'show'])->name('show');

             });

         Route::as('album.')
             ->group(function () {
                 Route::get('/album',[AlbumController::class,'index'])->name('index');
                 Route::post('/album/search',[AlbumController::class,'search'])->name('search');
                 Route::get('/album/view/{id}',[AlbumController::class,'show'])->name('show');

             });

         Route::as('contact.')
             ->group(function () {
                 Route::get('/contact',[ContactController::class,'index'])->name('index');
                 Route::post('/contact',[ContactController::class,'store']);

             });

         Route::as('consultation.')
             ->group(function () {
                 Route::get('/consultation',[FrontConsultationsController::class,'index'])->name('index');
                 Route::post('/consultation',[FrontConsultationsController::class,'store']);

             });

         Route::as('volunteer.')
             ->group(function () {
                 Route::get('/volunteer',[FrontVolunteersController::class,'index'])->name('index');
                 Route::post('/volunteer',[FrontVolunteersController::class,'store']);

             });

         Route::as('membership.')
             ->group(function () {
                 Route::get('/membership/description',[MembershipController::class,'description'])->name('description');
                 Route::get('/membership',[MembershipController::class,'index'])->name('index');
                 Route::post('/membership',[MembershipController::class,'store']);
             });
         Route::as('ecommerce.')
             ->group(function () {
                 Route::get('/ecommerce',[EcommerceController::class,'index'])->name('index');
                 Route::post('/ecommerce/search',[EcommerceController::class,'search'])->name('search');
                 Route::get('/ecommerce/view/{id}',[EcommerceController::class,'show'])->name('show');
             });
     });


require __DIR__.'/auth.php';
