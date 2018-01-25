<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/about-us', 'AboutController@getIndex');

Route::get('/{skill}/top-10', 'HomeController@getTopSkill');

Route::get('/search', 'HomeController@getSearch');
Route::get('/s-search', 'HomeController@getSSearch');

Route::get('/skills', 'HomeController@getSkill');

Route::get('/add-user', 'HomeController@getAdd');

Route::get('/logout/{user}', 'Auth\UserController@getLogout');

Route::group(['prefix' => 'tests'], function (){

    Route::get('/start/{name}/{id}', 'TestController@getTest');
    Route::get('/result/{name}/{result}/{id}', 'TestController@getResult');
});

Route::group(['middleware' => ['guest']], function (){

    Route::get('/login', 'Auth\UserController@getLogin');
    Route::post('/login', 'Auth\UserController@postLogin');

    Route::get('/register', 'Auth\UserController@getRegister');

    Route::post('/user-register', 'Auth\UserController@postRegisterUser');

    Route::post('/company-register', 'Auth\UserController@postRegisterCompany');
});

Route::group(['middleware' => ['admin']], function (){

    Route::group(['prefix' => 'dashboard'], function (){

        Route::get('/home', 'Admin\FormController@getHome');

        // ---------------------- Form -------------------------

        Route::get('/view-admins', 'Admin\FormController@getAdmin');

        Route::get('/delete-admin/{id}', 'Admin\FormController@getDelete');

        Route::get('/add-admin', 'Admin\FormController@getAddAdmin');
        Route::post('/add-admin', 'Admin\FormController@postAddAdmin');

        // ----------------------- Tables -------------------------

        Route::get('/view-users', 'Admin\TableController@getUser');
        Route::get('/delete-user/{id}', 'Admin\TableController@getDeleteUser');
        Route::get('/view-user-port', 'Admin\TableController@getPort');
        Route::get('/view-user-cert', 'Admin\TableController@getCert');
        Route::get('/view-user-edu', 'Admin\TableController@getEdu');
        Route::get('/view-user-skill', 'Admin\TableController@getSkill');
        Route::get('/view-user-test', 'Admin\TableController@getTest');

        Route::get('/delete-user-port/{id}', 'Admin\TableController@getDeleteUserPort');
        Route::get('/delete-user-cert/{id}', 'Admin\TableController@getDeleteUserCert');
        Route::get('/delete-user-edu/{id}', 'Admin\TableController@getDeleteUserEdu');
        Route::get('/delete-user-skill/{id}', 'Admin\TableController@getDeleteUserSkill');
        Route::get('/delete-user-test/{id}', 'Admin\TableController@getDeleteUserTest');

        Route::get('/view-companies', 'Admin\TableController@getCompany');
        Route::get('/view-com-port', 'Admin\TableController@getComPort');

        Route::get('/delete-company/{id}', 'Admin\TableController@getDeleteCompany');
        Route::get('/delete-company-port/{id}', 'Admin\TableController@getDeleteCompanyPort');

        Route::get('/view-posts', 'Admin\TableController@getPost');
        Route::get('/view-post-comment', 'Admin\TableController@getComment');

        Route::get('/delete-post/{id}', 'Admin\TableController@getDeletePost');
        Route::get('/delete-comment/{id}', 'Admin\TableController@getDeleteComment');

        // ---------------------------- Pages ---------------------------

        Route::get('/admin-profile', 'Admin\PageController@getProfile');
        Route::post('/admin-profile', 'Admin\PageController@postProfile');
        Route::post('/admin-change-pass', 'Admin\PageController@postPass');
    });
});

Route::group(['middleware' => ['auth']], function (){

    Route::group(['prefix' => 'user'], function (){

        //--------------------- User Profile -------------

        Route::get('/profile', 'User\Profile\ProfileController@index');

        Route::post('/image', 'User\Profile\ProfileController@postImage');

        Route::post('/name', 'User\Profile\ProfileController@postName');

        Route::get('/save-overview', 'User\Profile\ProfileController@getSave');

        Route::post('/add-portfolio', 'User\Profile\PortfolioController@postPortfolio');
        Route::get('/view-portfolio', 'User\Profile\PortfolioController@getPortfolio');
        Route::post('/update-portfolio/{id}', 'User\Profile\PortfolioController@postUpdatePortfolio');
        Route::get('/delete-portfolio/{id}', 'User\Profile\PortfolioController@getDeletePortfolio');

        Route::post('/add-certification', 'User\Profile\CertificationController@postCertification');
        Route::get('/view-certification', 'User\Profile\CertificationController@getCertification');
        Route::post('/update-certification/{id}', 'User\Profile\CertificationController@postUpdateCertification');
        Route::get('/delete-certification/{id}', 'User\Profile\CertificationController@getDeleteCertification');

        Route::post('/add-education', 'User\Profile\EducationController@postEducation');
        Route::get('/view-education', 'User\Profile\EducationController@getEducation');
        Route::post('/update-education/{id}', 'User\Profile\EducationController@postUpdateEducation');
        Route::get('/delete-education/{id}', 'User\Profile\EducationController@getDeleteEducation');

        Route::post('/add-skill', 'User\Profile\SkillController@postSkill');
        Route::get('/view-skill', 'User\Profile\SkillController@getSkill');
        Route::post('/update-skill/{id}', 'User\Profile\SkillController@postUpdateSkill');
        Route::get('/delete-skill/{id}', 'User\Profile\SkillController@getDeleteSkill');

        //--------------- User Setting--------------------

        Route::get('/setting', 'User\UserSettingController@index');

        Route::get('/change-password', 'User\UserSettingController@getPassword');
        Route::get('/check-pass', 'User\UserSettingController@getPass');
        Route::post('/change-password', 'User\UserSettingController@postPassword');

        Route::get('/profile-setting', 'User\UserSettingController@getProfileSetting');
        Route::get('/save-phone', 'User\UserSettingController@getPhone');
        Route::get('/save-setting', 'User\UserSettingController@postProfileSetting');
        Route::get('/category', 'User\UserSettingController@getCategory');

        Route::get('/team', 'User\UserSettingController@getTeam');
        Route::get('/check-team', 'User\UserSettingController@getCheck');
        Route::get('/add-team', 'User\UserSettingController@postAddTeam');
        Route::get('/add-member', 'User\UserSettingController@getAddMember');

        Route::get('/delete', 'User\UserSettingController@getDelete');

        // --------------------- Views --------------------------

        Route::get('/user-profile/{id}', 'HomeController@getUserView');

        Route::get('/company-profile/{id}', 'HomeController@getCompanyView');

        //--------------------- Test --------------------------

        Route::group(['prefix' => 'tests'], function (){

            Route::get('/all-tests', 'TestController@getIndex');
            Route::get('/{id}', 'TestController@getType');
            Route::get('/start/{name}/{id}', 'TestController@getTest');
            Route::get('/result/{name}/{result}/{id}', 'TestController@getResult');
        });

        //--------------------- Rooms --------------------------

        Route::group(['prefix' => 'room'], function (){

            Route::get('/room', 'RoomController@getRoom');

            Route::post('/add-post', 'RoomController@postPost');
            Route::post('/edit-post', 'RoomController@postEditPost');
            Route::get('/delete-post', 'RoomController@getDeletePost');

            Route::post('/add-comment', 'RoomController@postComment');
            Route::post('/edit-comment', 'RoomController@postEditComment');
            Route::get('/delete-comment', 'RoomController@getDeleteComment');
        });
    });
});

Route::group(['middleware' => ['company']], function (){

    Route::group(['prefix' => 'company'], function (){

        //--------------------- Company Profile -------------

        Route::get('/profile', 'Company\Profile\ProfileController@index');

        Route::post('/image', 'Company\Profile\ProfileController@postImage');

        Route::post('/name', 'Company\Profile\ProfileController@postName');

        Route::get('/save-overview', 'Company\Profile\ProfileController@getSave');

        Route::post('/add-portfolio', 'Company\Profile\PortfolioController@postPortfolio');
        Route::get('/view-portfolio', 'Company\Profile\PortfolioController@getPortfolio');
        Route::post('/update-portfolio/{id}', 'Company\Profile\PortfolioController@postUpdatePortfolio');
        Route::get('/delete-portfolio/{id}', 'Company\Profile\PortfolioController@getDeletePortfolio');

        //--------------- Company Setting--------------------

        Route::get('/setting', 'Company\UserSettingController@index');

        Route::get('/change-password', 'Company\UserSettingController@getPassword');
        Route::get('/check-pass', 'User\UserSettingController@getPass');
        Route::post('/change-password', 'Company\UserSettingController@postPassword');

        Route::get('/profile-setting', 'Company\UserSettingController@getProfileSetting');
        Route::get('/save-phone', 'Company\UserSettingController@getPhone');
        Route::get('/save-setting', 'Company\UserSettingController@postProfileSetting');
        Route::get('/category', 'Company\UserSettingController@getCategory');

        Route::get('/team', 'Company\UserSettingController@getTeam');
        Route::get('/check-team', 'Company\UserSettingController@getCheck');
        Route::get('/add-team', 'Company\UserSettingController@postAddTeam');
        Route::get('/add-member', 'Company\UserSettingController@getAddMember');

        Route::get('/delete', 'Company\UserSettingController@getDelete');

        // --------------------- Views --------------------------

        Route::get('/user-profile/{id}', 'HomeController@getUserView');

        Route::get('/company-profile/{id}', 'HomeController@getCompanyView');
    });
});

Route::group(['prefix' => 'api'], function (){

    Route::post('/login' , 'ApiController@postLogin');

    Route::post('/search', 'ApiController@postSearch');

    Route::get('/user-profile/{email}', 'ApiController@getUserProfile');
});