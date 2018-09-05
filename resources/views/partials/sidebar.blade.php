@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('course_management_access')">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>@lang('quickadmin.course-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('course_access')">
                        <router-link :to="{ name: 'courses.index' }">
                            <i class="fa fa-list-alt"></i>
                            <span>@lang('quickadmin.courses.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('lesson_access')">
                        <router-link :to="{ name: 'lessons.index' }">
                            <i class="fa fa-certificate"></i>
                            <span>@lang('quickadmin.lessons.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('coursescategory_access')">
                        <router-link :to="{ name: 'coursescategories.index' }">
                            <i class="fa fa-list-ol"></i>
                            <span>@lang('quickadmin.coursescategories.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('trail_management_access')">
                <a href="#">
                    <i class="fa fa-road"></i>
                    <span>@lang('quickadmin.trail-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('trail_access')">
                        <router-link :to="{ name: 'trails.index' }">
                            <i class="fa fa-train"></i>
                            <span>@lang('quickadmin.trails.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('trailscategory_access')">
                        <router-link :to="{ name: 'trailscategories.index' }">
                            <i class="fa fa-list-ol"></i>
                            <span>@lang('quickadmin.trailscategories.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('configuration_access')">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.configurations.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('datacourse_access')">
                        <router-link :to="{ name: 'datacourses.index' }">
                            <i class="fa fa-gear"></i>
                            <span>@lang('quickadmin.datacourses.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('datatrail_access')">
                        <router-link :to="{ name: 'datatrails.index' }">
                            <i class="fa fa-gear"></i>
                            <span>@lang('quickadmin.datatrails.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
