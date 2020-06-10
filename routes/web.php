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


Route::namespace('user')->group(function(){

    Route::get('/' , 'HomePageController@index')->name('homePage');

    Route::prefix('user')->group(function(){

        Route::get('/courses/cat/{id}' , 'CourseController@CoursesCat');    

        Route::get('/courses/cat/{id}/course/{c_id}' , 'CourseController@CoursesDet');    

        Route::get('/contact' , 'ContactController@show');

    });
    
    //forms
    Route::prefix('message')->group(function(){

        Route::Post('/newsletter' , 'MessageController@newsletter');

        Route::Post('/contact' , 'MessageController@contact');

        Route::Post('/enroll' , 'MessageController@enroll');

    });
    
});


Route::namespace('admin')->group(function(){

    Route::prefix('admin')->group(function(){

        //auth
        Route::get('/loginform' , 'AuthController@loginForm');

        Route::POST('/handleLogin' , 'AuthController@handleLogin');

        Route::get('/logout' , 'AuthController@logout');

    
        //middleware
        Route::group(['middleware' => ['AdminAuth']], function () {
            
            Route::get('/' , 'HomePageController@index')->name('homePage');

            //categories crud
                Route::get('/category' , 'CategoryController@index');

                Route::get('/category/create' , 'CategoryController@create');
                Route::post('/category/store' , 'CategoryController@store');

                Route::get('/category/edit/{id}' , 'CategoryController@edit');
                Route::post('/category/update/{id}' , 'CategoryController@update');
                
                Route::get('/category/delete/{id}' , 'CategoryController@delete');

            
            //trainers crud
                Route::get('/trainer' , 'TrainerController@index');

                Route::get('/trainer/create' , 'TrainerController@create');
                Route::post('/trainer/store' , 'TrainerController@store');

                Route::get('/trainer/edit/{id}' , 'TrainerController@edit');
                Route::post('/trainer/update/{id}' , 'TrainerController@update');
                
                Route::get('/trainer/delete/{id}' , 'TrainerController@delete');


            //courses crud
                Route::get('/course' , 'CourseController@index');

                Route::get('/course/create' , 'CourseController@create');
                Route::post('/course/store' , 'CourseController@store');

                Route::get('/course/edit/{id}' , 'CourseController@edit');
                Route::post('/course/update/{id}' , 'CourseController@update');
                
                Route::get('/course/delete/{id}' , 'CourseController@delete');


            //students crud
                Route::get('/student' , 'StudentController@index');

                Route::get('/student/create' , 'StudentController@create');
                Route::post('/student/store' , 'StudentController@store');

                Route::get('/student/edit/{id}' , 'StudentController@edit');
                Route::post('/student/update/{id}' , 'StudentController@update');
                
                Route::get('/student/delete/{id}' , 'StudentController@delete');
        
                
                //Show Courses
                Route::get('/student/showCourses/{id}', 'StudentController@showCourses');
                Route::get('/student/{id}/Courses/{c_id}/approve', 'StudentController@approve');
                Route::get('/student/{id}/Courses/{c_id}/reject', 'StudentController@reject');

                Route::get('/student/{id}/addCourse' , 'StudentController@addCourse');
                Route::post('/student/{id}/storeCourse' , 'StudentController@storeCourse');
                    
        });

    });
    
});