<?php
/**
 * Laravel Warehex-boilerplate
 * User: Kylrad
 * Company: Warehex
 * http://studioweb.pro
 * Date: 02.05.2017
 * Time: 0:30
 */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'],
//    ['prefix' => 'admin', 'as' => 'admin.'],
    function () {
        /*
         * These routes need view-backend permission
         * (good if you want to allow more than one group in the backend,
         * then limit the backend features by different roles or permissions)
         *
         * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
         */

        /**
         * All route names are prefixed with 'admin.access'.
         */
        Route::group(
            [
                'prefix'    => 'access',
                'as'        => 'access.',
                'namespace' => 'Access\Back\User\Controllers',
            ],
            function () {

                /*
                * User CRUD
                */
                Route::resource('user', 'UserController');
            }
        );
        // =========    END  access prefix group
    }
);

