<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('courses', 'CoursesController');
    Route::apiResource('lessons', 'LessonsController');
    Route::apiResource('coursescategories', 'CoursescategoriesController');
    Route::apiResource('trails', 'TrailsController');
    Route::apiResource('trailscategories', 'TrailscategoriesController');
    Route::apiResource('datacourses', 'DatacoursesController');
    Route::apiResource('datatrails', 'DatatrailsController');
});
