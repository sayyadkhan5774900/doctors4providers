<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('doctor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.doctors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/doctors") || request()->is("admin/doctors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.doctor.title') }}
                </a>
            </li>
        @endcan
        @can('provider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.providers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/providers") || request()->is("admin/providers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.provider.title') }}
                </a>
            </li>
        @endcan
        @can('agreement_progress_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.agreement-progresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/agreement-progresses") || request()->is("admin/agreement-progresses/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-spinner c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.agreementProgress.title') }}
                </a>
            </li>
        @endcan
        @can('doctor_match_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.doctor-matches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/doctor-matches") || request()->is("admin/doctor-matches/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-arrows-alt-h c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.doctorMatch.title') }}
                </a>
            </li>
        @endcan
        @can('redact_doctor_cv_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.redact-doctor-cvs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/redact-doctor-cvs") || request()->is("admin/redact-doctor-cvs/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-file c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.redactDoctorCv.title') }}
                </a>
            </li>
        @endcan
        @can('redacted_cv_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.redacted-cvs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/redacted-cvs") || request()->is("admin/redacted-cvs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.redactedCv.title') }}
                </a>
            </li>
        @endcan
        @can('customize_notification_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.customize-notifications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customize-notifications") || request()->is("admin/customize-notifications/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customizeNotification.title') }}
                </a>
            </li>
        @endcan
        @can('doctors_message_approvel_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.doctors-message-approvels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/doctors-message-approvels") || request()->is("admin/doctors-message-approvels/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-comment c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.doctorsMessageApprovel.title') }}
                </a>
            </li>
        @endcan
        @can('provider_messages_approval_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.provider-messages-approvals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/provider-messages-approvals") || request()->is("admin/provider-messages-approvals/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-comment-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.providerMessagesApproval.title') }}
                </a>
            </li>
        @endcan
        @can('send_payment_link_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.send-payment-links.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/send-payment-links") || request()->is("admin/send-payment-links/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-share-square c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sendPaymentLink.title') }}
                </a>
            </li>
        @endcan
        @can('send_zoom_link_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.send-zoom-links.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/send-zoom-links") || request()->is("admin/send-zoom-links/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-share-square c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sendZoomLink.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>