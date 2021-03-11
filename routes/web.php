<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Doctors
    Route::delete('doctors/destroy', 'DoctorController@massDestroy')->name('doctors.massDestroy');
    Route::post('doctors/media', 'DoctorController@storeMedia')->name('doctors.storeMedia');
    Route::post('doctors/ckmedia', 'DoctorController@storeCKEditorImages')->name('doctors.storeCKEditorImages');
    Route::resource('doctors', 'DoctorController');

    // Providers
    Route::delete('providers/destroy', 'ProviderController@massDestroy')->name('providers.massDestroy');
    Route::post('providers/media', 'ProviderController@storeMedia')->name('providers.storeMedia');
    Route::post('providers/ckmedia', 'ProviderController@storeCKEditorImages')->name('providers.storeCKEditorImages');
    Route::resource('providers', 'ProviderController');

    // Agreement Progresses
    Route::resource('agreement-progresses', 'AgreementProgressController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Doctor Matches
    Route::resource('doctor-matches', 'DoctorMatchsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Redact Doctor Cvs
    Route::resource('redact-doctor-cvs', 'RedactDoctorCvController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Redacted Cvs
    Route::resource('redacted-cvs', 'RedactedCvController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Customize Notifications
    Route::resource('customize-notifications', 'CustomizeNotificationsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Doctors Message Approvels
    Route::resource('doctors-message-approvels', 'DoctorsMessageApprovelsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Provider Messages Approvals
    Route::resource('provider-messages-approvals', 'ProviderMessagesApprovalsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Send Payment Links
    Route::resource('send-payment-links', 'SendPaymentLinkController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Send Zoom Links
    Route::resource('send-zoom-links', 'SendZoomLinkController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Settings
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Doctors
    Route::delete('doctors/destroy', 'DoctorController@massDestroy')->name('doctors.massDestroy');
    Route::post('doctors/media', 'DoctorController@storeMedia')->name('doctors.storeMedia');
    Route::post('doctors/ckmedia', 'DoctorController@storeCKEditorImages')->name('doctors.storeCKEditorImages');
    Route::resource('doctors', 'DoctorController');

    // Providers
    Route::delete('providers/destroy', 'ProviderController@massDestroy')->name('providers.massDestroy');
    Route::post('providers/media', 'ProviderController@storeMedia')->name('providers.storeMedia');
    Route::post('providers/ckmedia', 'ProviderController@storeCKEditorImages')->name('providers.storeCKEditorImages');
    Route::resource('providers', 'ProviderController');

    // Agreement Progresses
    Route::resource('agreement-progresses', 'AgreementProgressController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Doctor Matches
    Route::resource('doctor-matches', 'DoctorMatchsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Redact Doctor Cvs
    Route::resource('redact-doctor-cvs', 'RedactDoctorCvController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Redacted Cvs
    Route::resource('redacted-cvs', 'RedactedCvController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Customize Notifications
    Route::resource('customize-notifications', 'CustomizeNotificationsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Doctors Message Approvels
    Route::resource('doctors-message-approvels', 'DoctorsMessageApprovelsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Provider Messages Approvals
    Route::resource('provider-messages-approvals', 'ProviderMessagesApprovalsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Send Payment Links
    Route::resource('send-payment-links', 'SendPaymentLinkController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Send Zoom Links
    Route::resource('send-zoom-links', 'SendZoomLinkController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Settings
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
