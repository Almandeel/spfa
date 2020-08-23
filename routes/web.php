<?php




Route::get('lang/{locale}', 'LocalizationController@index');

/*
* links on Website up 
*/
Route::group(['middleware' => 'maintenance'], function () {
    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/about', 'SiteController@about')->name('about');
    Route::get('/courses', 'SiteController@courses')->name('courses');
    Route::get('detiles/course/{id}', 'SiteController@course')->name('detiles');
    Route::post('/course/booking', 'CourseBookingController@store');
    Route::get('/blog', 'SiteController@blog')->name('blog');
    Route::get('/post/{id}', 'SiteController@post');
    Route::get('/news/category/{id}', 'SiteController@categoryPost');
    Route::get('/share/facebook/{id}', 'SiteController@share')->name('share-facebook');
    Route::get('/contact', 'SiteController@contact')->name('contact');
    Route::post('sendmail', 'SiteController@sendMail')->name('sendmail');
    Route::get('get/comments/{id}', 'SiteController@getComments')->name('comments.index');
    Route::post('comments', 'SiteController@comment')->name('comments.store');
    Route::get('profile', 'SiteController@profile')->name('profile')->middleware('auth');
    Route::get('/logout', function () {
        return back();
    });


    //maneg news
    Route::get('/create/news', 'SiteController@createNews')->name('create.news');
    Route::post('/create/news', 'SiteController@storeNews')->name('store.news');
});



/*
* links on Website Down (Maintenance) 
*/
Route::group(['prefix' => 'maintenance', 'middleware' => 'OffMaintenance'], function () {
    // Route::get('/', 'SiteController@maintenance');
    // Route::get('/home', 'SiteController@index')->name('home');
    // Route::get('/about', 'SiteController@about')->name('about');
    // Route::get('/courses', 'SiteController@courses')->name('courses');
    // Route::get('detiles/course/{id}', 'SiteController@course')->name('detiles');
    // Route::post('/course/booking', 'CourseBookingController@store');
    // Route::get('/blog', 'SiteController@blog')->name('blog');
    // Route::get('/post/{id}', 'SiteController@post');
    // Route::get('/share/facebook/{id}', 'SiteController@share')->name('share-facebook');
    // Route::get('/contact', 'SiteController@contact')->name('contact');
    // Route::post('sendmail', 'SiteController@sendMail')->name('sendmail');
    // Route::get('profile', 'SiteController@profile')->name('profile')->middleware('auth');
    // Route::get('/logout', function () {
    //     return back();
    // });
});



/*
* links Dashboard 
*/
Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        Route::resource('users', 'UserController');
        Route::post('status', 'UserController@status')->name('status');

        Route::get('membersdetiles', 'UserController@membersDetiels')->name('report.members');

        Route::put('profile', 'UserController@profile')->name('users.profile');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('services', 'ServiceController');
        Route::resource('works', 'WorkController');
        Route::resource('teams', 'TeamController');
        Route::resource('contacts', 'ContactController');
        Route::resource('sliders', 'SliderController');
        Route::resource('studios', 'StudioController');
        Route::resource('informations', 'InformationController');
        Route::resource('networks', 'NetworkController');
        Route::resource('news', 'NewsController');
        Route::resource('courses', 'CourseController');
        Route::get('course/{id}', 'CourseController@course')->name('course');
        Route::resource('settings', 'SettingController');
        Route::resource('categories','CategoryController');
        Route::resource('teachers','TeacherController');


        Route::get('course/studentdetiels/{id}', 'CourseController@studentDetiels')->name('studentdetiels');
    });
});



Auth::routes();
