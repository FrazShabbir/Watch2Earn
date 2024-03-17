<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'adminDashboard'])->name('admin.dashboard');


        Route::prefix('module')->group(function () {
            Route::get('/create', [App\Http\Controllers\Backend\DashboardController::class, 'createModule'])->name('module.create');
            Route::post('/store', [App\Http\Controllers\Backend\DashboardController::class, 'storeModule'])->name('module.store');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\General\GeneralSettingController::class, 'index'])->name('general.settings');
            Route::post('/store', [App\Http\Controllers\Backend\General\GeneralSettingController::class, 'store'])->name('general.settings.store');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\General\GeneralSettingController::class, 'index'])->name('general.settings');
            Route::post('/store', [App\Http\Controllers\Backend\General\GeneralSettingController::class, 'store'])->name('general.settings.store');
        });

        Route::group(["prefix" => "permissions", "as" => "permissions."], function () {
            Route::get('/', [App\Http\Controllers\Backend\User\PermissionController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\Backend\User\PermissionController::class, 'store'])->name('store');
            Route::match(["get", "post"], 'dt', [App\Http\Controllers\Backend\User\PermissionController::class, 'datatable'])->name('dt');
            Route::get('get', [App\Http\Controllers\Backend\User\PermissionController::class, 'show'])->name('show');
            Route::post('update', [App\Http\Controllers\Backend\User\PermissionController::class, 'update'])->name('update');
            Route::post('delete-multiple', [App\Http\Controllers\Backend\User\PermissionController::class, 'deleteMultiple'])->name('multi.delete');
        });

        Route::group(["prefix" => "users", "as" => "users."], function () {
            Route::get('/', [App\Http\Controllers\Backend\User\UserController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\Backend\User\UserController::class, 'store'])->name('store');
            Route::match(["get", "post"], 'dt', [App\Http\Controllers\Backend\User\UserController::class, 'datatable'])->name('dt');
            Route::get('get', [App\Http\Controllers\Backend\User\UserController::class, 'show'])->name('show');
            Route::post('update', [App\Http\Controllers\Backend\User\UserController::class, 'update'])->name('update');
            Route::post('delete-multiple', [App\Http\Controllers\Backend\User\UserController::class, 'deleteMultiple'])->name('multi.delete');
            Route::post('update-password', [App\Http\Controllers\Backend\User\UserController::class, 'updatePassword'])->name('update.password');
            Route::post('update-status', [App\Http\Controllers\Backend\User\UserController::class, 'updateStatus'])->name('change.status');

        });

        Route::group(["prefix" => "roles", "as" => "roles."], function () {
            Route::get('/', [App\Http\Controllers\Backend\User\RoleController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\Backend\User\RoleController::class, 'store'])->name('store');
            Route::match(["get", "post"], 'dt', [App\Http\Controllers\Backend\User\RoleController::class, 'datatable'])->name('dt');
            Route::get('get', [App\Http\Controllers\Backend\User\RoleController::class, 'show'])->name('show');
            Route::post('update', [App\Http\Controllers\Backend\User\RoleController::class, 'update'])->name('update');
            Route::post('delete-multiple', [App\Http\Controllers\Backend\User\RoleController::class, 'deleteMultiple'])->name('multi.delete');
        });

        Route::group(["prefix" => "sources", "as" => "sources."], function () {
            Route::get('/', [App\Http\Controllers\Backend\Source\SourceController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\Backend\Source\SourceController::class, 'store'])->name('store');
            Route::match(["get", "post"], 'dt', [App\Http\Controllers\Backend\Source\SourceController::class, 'datatable'])->name('dt');
            Route::get('get', [App\Http\Controllers\Backend\Source\SourceController::class, 'show'])->name('show');
            Route::post('update', [App\Http\Controllers\Backend\Source\SourceController::class, 'update'])->name('update');
            Route::post('delete-multiple', [App\Http\Controllers\Backend\Source\SourceController::class, 'deleteMultiple'])->name('multi.delete');
            Route::post('update-status', [App\Http\Controllers\Backend\Source\SourceController::class, 'updateStatus'])->name('change.status');
        });

        Route::group(["prefix" => "medias", "as" => "media."], function () {
            Route::get('/', [App\Http\Controllers\Backend\Media\MediaController::class, 'index'])->name('index');
            Route::get('/fetch-images', [App\Http\Controllers\Backend\Media\MediaController::class, 'fetchImages'])->name('fetchImages');
            Route::post('/store', [App\Http\Controllers\Backend\Media\MediaController::class, 'store'])->name('store');
            Route::post('/edit', [App\Http\Controllers\Backend\Media\MediaController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\Backend\Media\MediaController::class, 'update'])->name('update');
            Route::post('/handle-uploads', [App\Http\Controllers\Backend\Media\MediaController::class, 'handleUpload'])->name('handleUpload');
            Route::post('/handle-deletes', [App\Http\Controllers\Backend\Media\MediaController::class, 'handleDelete'])->name('handleDelete');
            Route::post('get-tags-related-images', [App\Http\Controllers\Backend\Media\MediaController::class, 'getTagRelatedImages'])->name('tags.getImages'); // get gallery images via tag search

        });

        // Route::group(["prefix" => "ajax"], function () {
        //     Route::get('/get-users', [App\Http\Controllers\Ajax\AjaxController::class, 'getUsers'])->name('get.users');
        //     Route::get('/get-nationality', [App\Http\Controllers\Ajax\AjaxController::class, 'getNationalities'])->name('get.nationalities');
        //     Route::get('/get-tags', [App\Http\Controllers\Ajax\AjaxController::class, 'getTags'])->name('get.tags');
        //     Route::post('/update-bulk-statuses', [App\Http\Controllers\Ajax\AjaxController::class, 'bulkUpdateStatus'])->name('bulk.status.update');
        //     Route::post('/bulk-archive', [App\Http\Controllers\Ajax\AjaxController::class, 'bulkArchive'])->name('bulk.archive');
        //     Route::post('/get-activity-log', [App\Http\Controllers\Ajax\AjaxController::class, 'getActivityLog'])->name('getActivityLog');
        // });
    });

    Route::middleware('auth')->prefix('user')->group(function () {
        Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'userDashboard'])->name('user.dashboard');
        Route::post('start-mining', [App\Http\Controllers\User\Wallet\MiningController::class, 'startMining'])->name('start.mining');

        Route::group(["prefix" => "invites", "as" => "invites."], function () {
            Route::get('/', [App\Http\Controllers\User\Invite\InviteController::class, 'index'])->name('index');
            Route::post('/', [App\Http\Controllers\User\Invite\InviteController::class, 'store'])->name('store');
            Route::match(["get", "post"], 'dt', [App\Http\Controllers\User\Invite\InviteController::class, 'datatable'])->name('dt');
            Route::get('get', [App\Http\Controllers\User\Invite\InviteController::class, 'show'])->name('show');
            Route::post('update', [App\Http\Controllers\User\Invite\InviteController::class, 'update'])->name('update');
            Route::post('delete-multiple', [App\Http\Controllers\User\Invite\InviteController::class, 'deleteMultiple'])->name('multi.delete');
        });

    });
});
