<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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

    // Send Redacted Cv To Providers
    Route::resource('send-redacted-cv-to-providers', 'SendRedactedCvToProviderController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Providers Messages
    Route::resource('view-providers-messages', 'ViewProvidersMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Zoom Links
    Route::resource('view-zoom-links', 'ViewZoomLinksController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Providers
    Route::resource('chat-with-providers', 'ChatWithProviderController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Update Informations
    Route::resource('update-informations', 'UpdateInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Contact With Admins
    Route::resource('contact-with-admins', 'ContactWithAdminController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Doctors Messages
    Route::resource('view-doctors-messages', 'ViewDoctorsMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Admin Messages
    Route::resource('view-admin-messages', 'ViewAdminMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Select Meeting Times
    Route::resource('select-meeting-times', 'SelectMeetingTimeController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Admins
    Route::resource('chat-with-admins', 'ChatWithAdminController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Doctors
    Route::resource('chat-with-doctors', 'ChatWithDoctorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Meeting Links
    Route::resource('view-meeting-links', 'ViewMeetingLinksController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Agreement Completions
    Route::resource('agreement-completions', 'AgreementCompletionController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

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

    // Send Redacted Cv To Providers
    Route::resource('send-redacted-cv-to-providers', 'SendRedactedCvToProviderController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Providers Messages
    Route::resource('view-providers-messages', 'ViewProvidersMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Zoom Links
    Route::resource('view-zoom-links', 'ViewZoomLinksController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Providers
    Route::resource('chat-with-providers', 'ChatWithProviderController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Update Informations
    Route::resource('update-informations', 'UpdateInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Contact With Admins
    Route::resource('contact-with-admins', 'ContactWithAdminController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Doctors Messages
    Route::resource('view-doctors-messages', 'ViewDoctorsMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Admin Messages
    Route::resource('view-admin-messages', 'ViewAdminMessagesController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Select Meeting Times
    Route::resource('select-meeting-times', 'SelectMeetingTimeController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Admins
    Route::resource('chat-with-admins', 'ChatWithAdminController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Chat With Doctors
    Route::resource('chat-with-doctors', 'ChatWithDoctorController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // View Meeting Links
    Route::resource('view-meeting-links', 'ViewMeetingLinksController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Agreement Completions
    Route::resource('agreement-completions', 'AgreementCompletionController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});


Route::get('registration', 'FrontendController@registration')->name('registration');


Route::post('doctors/registration/media', 'DoctorRegistrationController@storeMedia')->name('doctors.registration.storeMedia');
Route::post('doctors/registration/ckmedia', 'DoctorRegistrationController@storeCKEditorImages')->name('doctors.registration.storeCKEditorImages');
Route::post('doctors/registration/store', 'DoctorRegistrationController@store')->name('doctors.registration.store');
