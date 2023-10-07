<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::post('/signupAjax', 'UserController@signupAjax');



//Route::middleware(['can:isUser','verified'])->prefix('panel')->group(function () {
Route::middleware(['can:isUser'])->prefix('panel')->group(function () {

    // ROUTE USER

    Route::get('/profile','UserController@profile');
    Route::post('/profile/deleteImageProfile','UserController@deleteImageProfile');
//    Route::get('/user/contacts','UserController@contacts');
//    Route::get('/user/introduction','UserController@introduction');
//    Route::get('/user/contract','UserController@contract');
    Route::patch('/profile/update/{user}','UserController@update');
    Route::get('/userAjax/{user}','UserController@introducedUserAjax');
    Route::get('/user/password','AdminController@changePasswordViewUser')->middleware('password.confirm');
    Route::patch('/user/updatePassword','UserController@updatePasswordUser');

    //messages
//    Route::get('/messages/','MessageController@index');
//    Route::get('/messages/show/{message}','MessageController@show');
//    Route::get('/messages/new','MessageController@create');
//    Route::post('/messages/send','MessageController@store');
    Route::post('/message/reply','MessageController@reply');
    Route::post('/message/send','MessageController@sendMessage');
    Route::resource('message','MessageController');



    //Introduced
    Route::post('/introduced/introduced_verified','UserController@introducedVerified');
    Route::get('/introduced','UserController@listIntroducedUser');
    Route::get('/introduced/search','UserController@searchUsersIntroduced');
    Route::post('/introduced/add','UserController@addIntroducedUser');

    //Products
    Route::get('/products','AdminController@showProducts');

    //followup
    Route::get('/followup/{followup}','UserController@showFollowupIntroduced');
    Route::post('/followup/create','FollowupController@store_user');

    //Tel verify
    Route::get('/active/mobile/','VerifyController@verifyTelPanel');
    Route::post('/active/mobile/code','VerifyController@checkVerifyTelPanel');

    //Packages
    Route::get('/freepackages','AdminController@showFreePackages');


    //category_document
    Route::get('/category_document/{category_document}/show','CategoryDocumentController@category_document_show');
    Route::get('/category_document','CategoryDocumentController@list');


    //documents
//    Route::get('/documents','DocumentController@indexUser');
//    Route::get('/documents/{document}/show','DocumentController@showUser');
    Route::resource('documents','DocumentController');

    //POSTS
    Route::resource('post','PostController');

    //comments
    Route::resource('comments','CommentController');


    //category post
    Route::resource('categoryposts','CategoryPostController');

    //teachers
    Route::get('/teachers','TeacherController@listTeachers');
    Route::get('/teacher/{teacher}','TeacherController@show');

    //coaches
    Route::patch('/coach/{coach}/newrequest','CoachController@newrequest');
    Route::patch('/coach/{coach}/updateCoach','CoachController@updateCoach');
    Route::get('/coach/profile','CoachController@profile_coach');
    Route::get('/booking/report','BookingController@booking_report_byUser');

    Route::resource('coach','CoachController');

    //scholarship
    Route::get('/scholarship/me','ScholarshipController@me');
    Route::post('/scholarship/answerstatus','ScholarshipController@answerstatus');
    Route::post('/scholarship/addintroduced','UserController@addIntroducedUser_Scholarship');
    Route::post('/scholarship/store_webinarCode','RecievecodeusersController@store_webinarCode');
    Route::post('/scholarship/introductionletter','ScholarshipController@introductionletter');
    Route::post('/scholarship/introduction/answerstatus_introduction','ScholarshipController@answerstatus_introduction');
    Route::post('/scholarship/me/sendSMSIntroduce','ScholarshipController@sendSMSIntroduce');
    Route::post('/scholarship/me/sendAcceptCollabration','ScholarshipController@sendAcceptCollabration');


    //Scholarship Exam
    Route::get('/scholarship/exam/create','ScholarshipExamController@create');
    Route::post('/scholarship/exam','ScholarshipExamController@store');

    //Scholarship Payment
    Route::post('/scholarship/ajax_payment','ScholarshipPaymentController@ajax_payment');
    Route::resource('scholarship_payment','ScholarshipPaymentController');

    // collabration_category
    Route::get('/scholarship/me/collabration_category/{collabration_category}','CollabrationCategoryController@ajaxCategory');
    Route::get('/scholarship/me/collabration_details/{collabration_details}','CollabrationDetailsController@ajaxDetails');

    //Collabration accept
//    Route::post('/scholarship/me/collabration_details_accept','CollabrationDetailsController@collabration_details_accept');
    Route::get('/scholarship/me/collabrationAccept_ajax','CollabrationAcceptController@collabrationAccept_ajax');
    Route::get('/scholarship/me/collabrationAcceptEdit_ajax/{collabration_accept}','CollabrationAcceptController@collabrationAcceptEdit_ajax');
    Route::patch('/scholarship/me/collabrationAccept/{collabration_accept}','CollabrationAcceptController@update');
    Route::resource('collabration_accept','CollabrationAcceptController');




    //warranty
    Route::get('/warrany','WarranyController@show_list');
    Route::get('/warrany/{course}/create','WarranyController@create_warrany');
    Route::post('/warrany/{course}/store','WarranyController@store_warrany');
    Route::get('/warrany/{warrany}/show','WarranyController@show_warrany');
    //Route::get('/warrany','WarranyController@show_warrany');
    Route::resource('warrany','WarranyController')->only(['store']);


    //invoice
    Route::resource('invoice','InvoiceController')->except('index');
    Route::get('/invoice','InvoiceController@showinvoiceUser');
    Route::post('/invoice/checkout/{invoice}','CheckoutController@storeInvoice');

    //wallet
    Route::resource('wallet','WalletController');

    //knot
    Route::patch('/knot/updateregister/{scholarship}','ScholarshipController@updateregister');

    //Certificates
    Route::get('/level1/certificate','CertificateController@get_certificate1');
    Route::get('/scholarship/certificate/download','CertificateController@get_certificate');

    //scientific supports
    Route::resource('scientific_support','ScientificSupportController');

    //booking
    Route::get('/booking/accept','ReserveController@acceptReserve');
    Route::get('/booking/cancel','BookingController@cancelReserve');
    Route::resource('booking','BookingController');

    //booking Setting
    Route::get('/settings/booking','BookingSettingController@index');
    Route::patch('/settings/booking/{coach}','BookingSettingController@update');


    //Homework
    Route::resource('homework','HomeworkController');




    //coupon
    Route::resource('coupon','CouponController');

    //Reserves
    Route::get('/reserve/accept_reserve_user','ReserveController@accept_reserve_user');
    Route::patch('/reserve/{reserve}/update','ReserveController@result_coach');
    Route::get('/reserve/{reserve}','ReserveController@show');
    Route::PATCH('/reserve/{reserve}','ReserveController@update');

    //feedback Coach
    Route::resource('feedbackcoach','FeedbackCoachingController');

    //integrity
    Route::resource('integrityTest','IntegrityTestController');

    //effectiveListenings
    Route::resource('effectiveListenings','EffectivelisteningController');

    // communication skill
    Route::get('/communication_skill','AssessmentController@communicationSkill_create');

    //Download video webinar Integrity
    Route::get('/integrity/files',function()
    {
       return view('panelUser.integrity_webinarDownload');
    });

    //Gift Certificates
    Route::get('/gift/certificate',function()
    {
        return view('panelUser.gift_certificate');
    });


    //Psychological
    Route::get('/psychological/create','PsychologicalController@create');
    Route::post('/psychological','PsychologicalController@store');

    //download Course
    Route::get('/course/{course}/download/{file}','CourseController@download');



    //Event Reserves
    Route::resource('eventreserve','EventreserveController');

    //Order
    Route::post('/order','OrderController@store');
    Route::post('/order/aghsat','OrderController@storeAghsat');

    //checkout
    Route::get('/checkout/transaction','CheckoutController@transactionsUser');
    Route::post('/faktor/checkout/pardakhtaghsat','CheckoutController@storeAghsat');

    //faktors
    Route::resource('faktor','FaktorController');

    //Clinic
    route::get('/coach_request/requests','CoachRequestController@requests');
    route::get('/coach_request/requests/{coach_request}/pending','CoachRequestController@pending_user');
    route::resource('coach_request','CoachRequestController');

    Route::get('/clinic_basic_info/speciality/{clinic_basic_info}','ClinicBasicInfoController@ajax');




});


Route::middleware('can:isEducation')->group(function () {

});



Route::middleware('can:isAdmin')->prefix('admin')->group(function () {
//Route::group(['middleware' => ['can:isEducation','can:isAdmin']], function() {

    // user
    //Route::get('/admin/panel/','AdminController@index')->name('panelAdmin');
    Route::get('/users','UserController@index');
    Route::get('/user/{user}','UserController@show')->name('showUserForAdmin');
    Route::patch('/profile/update/{user}','UserController@update');
    Route::patch('/user/{id}/changeType','UserController@changeType');
    Route::get('/user/{user}/login','UserController@loginWithUser');
    Route::get('/users/all','UserController@showAll');
    Route::get('/users/all/category/','UserController@showCategoryAllUsers');




    Route::get('/users/search/','UserController@searchUsers');
    Route::get('/users/search/advance','UserController@advanceSearchUsers');
    Route::get('/add','UserController@showRegister');
    Route::post('/register','UserController@register');
    Route::get('/user/{user}/delete','UserController@destroy');
    Route::get('/users/category/','UserController@showCategoryUsersAdmin');
//    Route::get('/users/categoryTags/','UserController@showCategoryTagsAdmin');
//    Route::get('/users/categorybyAdmin/','UserController@categorybyAdmin');
//    Route::get('/users/list_user_gettingknow','UserController@list_user_gettingknow');
//    Route::get('/users/advancesearch','UserController@advancesearch');
//    Route::get('/users/export_excel','UserController@export_excel');


    Route::get('/user/{tel}/password','AdminController@changePasswordView');
    Route::patch('/user/{tel}/updatePassword','UserController@updatePassword');
    Route::get('/users/excel','UserController@createExcel');
    Route::post('/users/storeExcel','UserController@storeExcel');
    Route::post('/user/ajax/search','UserController@userAjax');

    //Route Scholarship
    Route::post('/scholarship/{scholarship}/changestatus','ScholarshipController@changeStatus');
    Route::get('/scholarship/exportExcel','ScholarshipController@exportExcel');
    Route::get('/scholarship/sendSMS_incompleteProfile','ScholarshipController@sendSMS_incompleteProfile');
//    Route::get('/scholarship/webinar_accept','ScholarshipController@webinar_accept');
    Route::post('/scholarship/{scholarship}/confirm_webinar','ScholarshipController@confirm_webinar');
    Route::post('/scholarship/{scholarship}/type_payment','ScholarshipController@type_payment');
//    Route::get('/scholarship/exam_accept','ScholarshipController@exam_accept');
    Route::get('/scholarship/dont_prticipate_in_the_exam','ScholarshipController@dontParticipateIntheExam');
    Route::get('/scholarship/financial','ScholarshipController@financial');
    Route::get('/scholarship/result/report','ScholarshipController@report_result');
    Route::post('/scholarship/{scholarship}/score_store','ScholarshipController@scoreStore');
    Route::post('/scholarship/{scholarship}/changestatusIntroductionLetter','ScholarshipController@changestatusIntroductionLetter');
    Route::post('/scholarship/{scholarship}/register/financial','ScholarshipController@register_financial');
    Route::resource('scholarship','ScholarshipController');

    //Certificates
    Route::post('/certificates/acsth/{student}','CertificateController@get_certificate_acsth');
    Route::post('/certificates/fcc/{student}','CertificateController@get_fcc');
    Route::post('/certificates/fc1/{student}','CertificateController@get_fc1byAdmin');

    //Route Scholarship Interview
    Route::resource('scholarship_interview','ScholarshipInterviewController');

    //scholarship Exam
    Route::get('/scholarship/certificate/{user}/download','CertificateController@get_certificateByAdmin');

    //Scholarship setting
    Route::resource('collabration_category','CollabrationCategoryController');
    Route::resource('collabration_details','CollabrationDetailsController');
    Route::patch('/scholarship/{collabration_accept}/update','CollabrationAcceptController@collabrationUpdate_byAdmin');
    Route::get('/scholarship/{scholarship}/detail_collabration/{collabration_details}/create','CollabrationDetailsController@create_addCollabration_byAdmin');
    Route::post('/scholarship/{user}/detail_collabration/{collabration_details}/store','CollabrationAcceptController@store_addCollabration_bydAdmin');
    Route::resource('collabration_accept','CollabrationAcceptController');

    //scholarship collabration
    Route::get('/users/collabrations','ScholarshipController@collabrations');

    //warranty
    Route::resource('warrany','WarranyController');

    //invoice
    Route::get('/invoice/{user}/create','InvoiceController@create');
    Route::post('/invoice/{user}/store','InvoiceController@store');
    Route::get('/invoice/course/{course}','InvoiceController@course');
    Route::resource('invoice','InvoiceController');




    //  ROUTE SETTINGS
    Route::prefix('settings/')->group(function ()
    {
        Route::post('/problemfollowup/store', 'ProblemfollowupController@store');
        Route::get('/problemfollowup/delete/{problemfollowup}', 'ProblemfollowupController@destroy');
        Route::get('/problemfollowup/edit/{problemfollowup}', 'ProblemfollowupController@edit');
        Route::patch('/problemfollowup/update/{problemfollowup}', 'ProblemfollowupController@update');
        Route::get('/', 'AdminController@showSettings');
        Route::get('/problemfollowup/new', function () {
            return view('panelAdmin.insertProblemFollowup');
        });



        // *** Tags Setting
        Route::get('/tags/new','TagController@create');
        Route::post('/tags/store','TagController@store');
        Route::get('/tags/delete/{tag}','TagController@destroy');
        Route::get('/tags/edit/{tag}','TagController@edit');
        Route::patch('/tags/update/{tag}','TagController@update');
        Route::get('/settingtags/{data}','TagController@ajaxsettingstag');
        Route::patch('/updatetags','TagController@updateAllTags');
        //*** Category Tags Settings
        Route::get('/categorytags/new','CategoryTagController@index');
        Route::post('/categorytags/store','CategoryTagController@store');
        Route::get('/categorytags/edit/{categoryTag}','CategoryTagController@edit');
        Route::patch('/categorytags/update/{categoryTag}','CategoryTagController@update');
        Route::get('/categorytags/delete/{categoryTag}','CategoryTagController@destroy');
        Route::get('/subcategorytags/{data}','CategoryTagController@ajaxsubcategory');

        //usertypes
        Route::resource('user_type','UserTypeController');

        //Answer Line

        Route::resource('answerline','AnswerlineController');
    });

    //scientific_support
    Route::patch('/scientific_support/{scientific_support}/changestatus','ScientificSupportController@changeStatus');
    Route::resource('scientific_support','ScientificSupportController');


    Route::resource('category_document','CategoryDocumentController');


    //Route Messages
//    Route::get('/messages/','MessageController@index');
//    Route::get('/messages/show/{message}','MessageController@show');
//    Route::get('/messages/new','MessageController@create');
//    Route::post('/messages/send','MessageController@store');
    Route::post('/message/reply','MessageController@reply');
    Route::post('/message/send','MessageController@sendMessage');
    Route::resource('message','MessageController');

    // Route Admin Followup
    Route::post('/followup/create','FollowupController@store');

    Route::get('/followup/excel/create','FollowupController@createExcel');
    Route::post('followup/excel/store','FollowupController@storeExcel');

    // File Manager
    Route::get('/filemanager',function()
    {
        return view('admin/fileManager');
    });

    //Route reports
    Route::get('/reports/',function()
    {
        return view('panelAdmin.reports');
    });

    //Teachers
    Route::resource('teachers','TeacherController');

    //coaches
    Route::get('/booking/{coach}/report','BookingController@coach_report');
    Route::get('/booking/reportallcoach','BookingController@reportAllCoach');
    Route::get('/coach/reject','CoachController@coach_reject');
    Route::get('/coach/request','CoachController@coach_request');
    Route::resource('coach','CoachController');

    //Category Coaches
    Route::resource('category_coach','CategoryCoachController');

    //Courses
    Route::get('/courses/test','CourseController@course_test');
    Route::get('/courses/{course}/students','CourseController@showStudents');
    Route::get('/courses/{course}/students/add','CourseController@createAddStudent');
    Route::resource('courses','CourseController');

    //CourseType
    Route::resource('coursetype','CoursetypeController');

    //SMS
    Route::get('/sms/countrecieve','SmsController@countRecieve');
    Route::get('/sms/recieve','SmsController@recieve');
    Route::resource('sms','SmsController');
    Route::post('/sms/createajax','SmsController@createAjax');

    //Setting SMS
    Route::resource('settingsms','SettingsmsController');



    //score
    Route::resource('settingscore','SettingscoreController');








    //documents
    Route::resource('documents','DocumentController');

    //options
    Route::get('/settingreserve','OptionController@settingReserve');
    Route::get('/options/coaching','OptionController@optionsCoaching');
    Route::patch('/settingreserve/update','OptionController@updateSettingReserve');
    Route::patch('/options/booking','OptionController@updateOptionsBooking');
    Route::resource('options','OptionController');



    //booking

    Route::get('/booking/bookingListAdmin','BookingController@bookingListAdmin');
    Route::get('/booking/accept','ReserveController@acceptReserve');
    Route::resource('booking','BookingController');

    //coupon
    Route::resource('coupon','CouponController');

    //reserve
    Route::get('/booking/{reserve}/showadminbooking','ReserveController@showAdminBooking');
    Route::get('/reserve/notification/incomplete','ReserveController@sendNotificationIncomplete');
    Route::get('/reserve/waiting','ReserveController@waiting');

    //Notification
    Route::get('user/notification/login_without_reserve','UserController@login_without_reserve');

    //feedback Coach
    Route::resource('feedbackcoach','FeedbackCoachingController');

    //type Coaches
    Route::resource('type_coach','TypeCoachController');

    //categorygettingknows
    Route::resource('category_gettingknow','CategoryGettingknowController');

    //Checkout
    route::resource('/checkout','CheckoutController');

    //financial

    //faktor
    route::get('/faktor/all','FaktorController@faktorAdmin');
    Route::get('/faktor/{user}/create','FaktorController@create');
    route::resource('faktor','FaktorController');

    // Page Builder
    Route::get('/pagebuilder',function()
    {
        return view('panelAdmin.pageBuilder');
    });


    //Students
    Route::prefix('education/')->group(function ()
    {
        Route::prefix('students')->group(function () {
            Route::get('search','StudentController@search');
            Route::get('advancesearch','StudentController@advancesearch');
        });

        Route::resource('students', 'StudentController');
    });

    //psychological
    Route::get('/psychological/export/{psychological}','PsychologicalController@export_excel');
    Route::resource('psychological','PsychologicalController');


    //EVENTS
    Route::get('/event/isfahan/list','landingController@isfahanList');

    //Events
    Route::Patch('/event/{event}/updateStatus','EventController@updateStatus');
    Route::get('/event/all','EventController@eventsListAdmin');
    Route::get('/event/{event}/users','EventController@usersEvent');
    Route::get('/event/{event}/export','EventController@exportExcel');
    Route::get('/event/organizers','EventController@organizers');
    Route::post('/event/organizers/store','EventController@organizers_store');
    Route::post('/event/organizers/{user}/destroy','EventController@organizers_destroy');


    Route::resource('event','EventController');

    //reportAdmin
    Route::get('/reports/statistic/{user}','ReportAdminController@show');
    Route::get('/reports/allreport','ReportAdminController@allReportsUsers');
    Route::get('/reports/advance/create','ReportAdminController@advanceReport_create');
    Route::get('/reports/advance','ReportAdminController@advanceReport');
    Route::get('/reports/allreport/exportexcel','ReportAdminController@exportExcel_allReportsUsers');

    //Tweets
    Route::resource('tweet','TweetController');


    //clinic ajax route
    route::get('/clinic_basic_info/create_orientations','ClinicBasicInfoController@ajax_data');

    //Clinic _ admin route
    Route::get('/clinic_basic_info/create_speciality','ClinicBasicInfoController@create_speciality');
    Route::post('/clinic_basic_info/store_speciality','ClinicBasicInfoController@store_speciality');
    Route::get('/clinic_basic_info/create_orientation','ClinicBasicInfoController@create_orientation');
    Route::get('/clinic_basic_info/edit_speciality/{ClinicBasicInfo}/edit','ClinicBasicInfoController@edit_speciality');
    Route::get('/clinic_basic_info/edit_orientation/{ClinicBasicInfo}/edit','ClinicBasicInfoController@edit_orientation');
    Route::patch('/clinic_basic_info/update_speciality/{ClinicBasicInfo}','ClinicBasicInfoController@update_speciality');
    Route::patch('/clinic_basic_info/update_orientation/{ClinicBasicInfo}','ClinicBasicInfoController@update_orientation');

    //request coach
    route::resource('coach_request','CoachRequestController');




    Route::resource('clinic_basic_info','ClinicBasicInfoController');

    //clinic _ User route



    //Landing
    Route::get('/jashn/list','LandPageController@index');
    Route::get('/jashn/list/exportexcel','LandPageController@exportExcel');
    Route::get('/jashn/user/options/{landPage}','LandPageController@optionsUser');
    Route::patch('/jashn/user/options/{landPage}/update','LandPageController@optionsUserUpdate');


});



Auth::routes(['verify'=>true]);


Route::post('/crm/user/insert','UserController@store');

Route::get('/signup crm','BaseController@signupForm');
Route::get('/check/user/{tel}','UserController@checkUserAjax');

Route::get('/panel','AdminController@index')->name('panel');
Route::get('/panel/state/{state}','BaseController@citiesAjax');
Route::get('/active/mobile/{tel}', 'VerifyController@store');
Route::get('/active/mobile/verify/{code}','VerifyController@checkCode');
Route::get('/loginSMS','AdminController@loginSMS');
Route::post('/panel/storeCodewithoutPass','VerifyController@storeCodewithoutPass');
Route::post('/panel/checkCodewithoutPass','VerifyController@checkCodewithoutPass');
Route::post('/loginOrStoreUser','VerifyController@loginOrStoreUser');
Route::post('/checkLoginOrStoreUser','VerifyController@checkLoginOrStoreUser');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Verify Tel landings
Route::get('/verify/active/tel', 'VerifyController@store_landings');
Route::get('/verify/active/tel/check/{code}','VerifyController@checkCode_landings');

// Landing Page
//Route::get('/landingPage','landingController@index');
//Route::post('/landing/store','landingController@store_landing_gift');
//Route::get('/showPackageDownload', 'landingController@showPackageDownload')->name('freePackageLanding');

Route::get('/password/sendcode','VerifyController@sendResetCode');
Route::post('/password/reset/update','VerifyController@checkResetCode');

//landing Booking coaching
Route::get('/what-is-coaching/', 'landingController@bookOffCreate');
Route::post('/what-is-coaching/bookOffStore', 'landingController@bookOffStore');

//Verify Codes
Route::post('/verify', 'VerifyController@verifyCreate');
Route::post('/verifyCode', 'VerifyController@verifyStore');


Route::get('/register2',function()
{
    return view('register_landingPage');
});

// Landing Register
Route::post('/register/land','UserController@register_landing');
Route::resource('landPage','LandPageController');

//scholarship
Route::get('/scholarship/register','ScholarshipController@create');
Route::post('/scholarship/storeCodewithoutPass','VerifyController@storeBeforeScholarship');
Route::post('/scholarship/checkCode_Scholarship','VerifyController@checkCode_Scholarship');

Route::post('/scholarship/update/user','ScholarshipController@register_Scholarship');
Route::post('/scholarship/register/final','ScholarshipController@store');
Route::get('/scholarship/cleartel','ScholarshipController@cleartel');

//Knot
Route::get('/knot/register','ScholarshipController@create_knot');
Route::post('/knot/checkCode_knot','VerifyController@checkCode_knot');


//checkout
Route::get('/checkout/callback','CheckoutController@callback');
Route::resource('checkout','CheckoutController');



//gift
Route::get('/gift',function()
{
    return view('gift');
});



//integrity test
Route::get('/integrity_test',function()
{
    return view('panelUser.integrityTest');
});


//booking
Route::get('/booking/createajax','BookingController@createAjax');
Route::get('/booking/showformreserve','BookingController@showFormReserve');
Route::post('/booking/mohasebe','ReserveController@mohasebe');
Route::resource('booking','BookingController');



//reserve
Route::post('/reserve/insert', 'ReserveController@insert');
Route::resource('reserve','ReserveController');



//coaches
Route::get('/coaches/all','CoachController@viewAllCoaches');
Route::get('/coaches/category/{clinic_basic_info}','ClinicBasicInfoController@category');
Route::get('/coach/{coach}','CoachController@show');

//Cart
Route::post('/cart','CartController@store');
Route::get('/cart/all','CartController@index');
Route::post('/cart/payment','CartController@choosePaymant');
Route::get('/cart/{cart}','CartController@destroy');
Route::get('/cart','ReserveController@showCart');
Route::post('/cart/mohasebeAghsat','CartController@mohasebeAghsat');
Route::delete('/cart/{reserve}/destroy','ReserveController@destroy_cart');


//Category GettingKnow
Route::get('/showListChildGettingKnow/{id}','CategoryGettingknowController@showListChild');

//Coupon
Route::post('/coupon/check','CouponController@check');
Route::post('/coupon/checkoff','CouponController@checkOff');
Route::post('/coupon/checkCoupon','CouponController@checkCoupon');

//TWEETS
Route::resource('tweets','TweetController');

//Course
Route::get('/courses','CourseController@showCourses');
Route::get('/courses/{course}','CourseController@show');

//clinic
Route::resource('/clinic','ClinicController');


//LiKE
Route::resource('like','LikeController');

//Automatic Answer SMS and change type user
Route::get('/api/kavenegar/answer','AnswerlineController@answerLine');


//RAVANSHENASI
Route::get('/ravanshenasi',function()
{
    return view('landeRavanshenasi');
});



//Route::get('/integrity','LandPageController@create');
//Route::get('/jashn','LandPageController@create');
//Route::patch('/jashn/{landPage}/update','LandPageController@update_jashn');




//landing Isfahan
//Route::get('/events/isfahan', 'landingController@isfahanCreate');
//Route::post('/events/isfahan/store', 'landingController@isfahanStore');
//Route::get('/events/isfahan/exportexcel', 'landingController@isfahanExport');


//Pasargad Bimeh
Route::prefix('club')->group(function ()
{

        Route::get('/home',function()
        {
            return view('pasargadBimeh.club');
        });

        Route::get('bimeh',function()
        {
            return view('pasargadBimeh.bimeh');
        });


});

Route::get('/exportexcel','UserController@export_excel');

Route::resource('event','EventController');


//reserve test
Route::get('/r/test','ReserveController@test');


Route::get('/v2/home',function(){
    return view('v2.index-logout');
});


//test User
//Route::get('/test1','UserController@test1');

//blog
Route::get('/{username}','PostController@blogHomePage');
Route::get('/{username}/post/{post}','PostController@show');
Route::get('/{username}/category/{category}','PostController@categoryBlog');
Route::get('/blogs/newposts','PostController@newPosts');

