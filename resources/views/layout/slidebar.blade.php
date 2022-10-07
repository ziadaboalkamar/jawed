<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('storage/' . (App\Models\Websit::latest()->first()->logo ?? ' ')) }}"
                            alt="">
                    </span>
                    <h2 class="brand-text font-small-4">{{ App\Models\Websit::latest()->first()->websit_title ?? '' }}
                    </h2>
                </a>
            </li>

            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{-- <li class="nav-label first">{{ __('Main Menu') }}</li> --}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('Dashboard') }}</span></a>
            </li>
            @if(Auth::user()->role_id == 1)

            <li class="@if(\Request::route()->getName() == 'all-users') active @endif nav-item"><a class="d-flex align-items-center" href="{{ route('all-users') }}"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('Users') }}</span></a>

            </li>

            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">{{ __('إدارة المحتوى') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-more-horizontal">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                data-feather="edit"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('عن الجمعية') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'about-us-edit') active @endif"><a class="d-flex align-items-center" href="{{ route('about-us-edit') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('من نحن؟') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'structure-edit') active @endif"><a class="d-flex align-items-center" href="{{ route('structure-edit') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الهيكل التنظيمي') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'policies.index') active @endif"><a class="d-flex align-items-center" href="{{ route('policies.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('اللوائح والسياسات') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'achievement-edit') active @endif"><a class="d-flex align-items-center" href="{{ route('achievement-edit') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('انجازات الجمعية') }}</span></a>
                    </li>

                    <li class="@if(\Request::route()->getName() == 'partners.index') active @endif"><a class="d-flex align-items-center" href="{{ route('partners.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('شركاء النجاح') }}</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item @if(\Request::route()->getName() == 'initiatives.index') active @endif"><a class="d-flex align-items-center" href="{{ route('initiatives.index') }}"><i
                        data-feather="align-center"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('مبادرات جوٍد') }}</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                data-feather="grid"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('خدمات جود') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'courses.index') active @endif"><a class="d-flex align-items-center" href="{{ route('courses.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الدورات التدريبية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'diplomas.index') active @endif"><a class="d-flex align-items-center" href="{{ route('diplomas.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الدبلومات المهنية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'memberships.index') active @endif"><a class="d-flex align-items-center" href="{{ route('memberships.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('طلبات العضوية') }}</span>
                                <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{ count(App\Models\Membership::where('status', '0')->get()) }}</span>
                            </a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'volunteers.index') active @endif"><a class="d-flex align-items-center" href="{{ route('volunteers.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('طلبات التطوع') }}</span>
                                <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{ count(App\Models\Volunteer::where('status', '0')->get()) }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'consultations.index') active @endif"><a class="d-flex align-items-center" href="{{ route('consultations.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الاستشارات') }}</span>
                                <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{ count(App\Models\Consultation::where('status', '0')->get()) }}</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                data-feather="book-open"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('مركز المعرفة') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'libraries.index') active @endif"><a class="d-flex align-items-center" href="{{ route('libraries.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('المكتبة') }}</span></a>
                    </li>

                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                data-feather="image"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('المركز الاعلامي') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'blogs.index') active @endif"><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الاخبار') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'reports.index') active @endif"><a class="d-flex align-items-center" href="{{ route('reports.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('التقارير السنوية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'photo-album.index') active @endif"><a class="d-flex align-items-center" href="{{ route('photo-album.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الصور') }}</span></a>
                    </li>

                </ul>
            </li>


            <li class=" nav-item @if(\Request::route()->getName() == 'products.index') active @endif"><a class="d-flex align-items-center" href="{{ route('products.index') }}"><i
                data-feather="shopping-bag"></i><span class="menu-title text-truncate"
                data-i18n="order">{{ __('المتجر الالكتروني') }}</span></a>
            </li>


            <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                data-feather="tool"></i><span class="menu-title text-truncate"
                data-i18n="order">{{ __('اعدادات الصفحة الرئيسية') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'services.index') active @endif"><a class="d-flex align-items-center" href="{{ route('services.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('خدمات الجمعية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'faqs.index') active @endif"><a class="d-flex align-items-center" href="{{ route('faqs.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الاسئلة الشائعة') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'client-opinions.index') active @endif"><a class="d-flex align-items-center" href="{{ route('client-opinions.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('قالو عنا') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'statistics.index') active @endif"><a class="d-flex align-items-center" href="{{ route('statistics.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('احصائيات الجمعية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'teams.index') active @endif"><a class="d-flex align-items-center" href="{{ route('teams.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('الهيكلية الادارية') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'sliders.index') active @endif"><a class="d-flex align-items-center" href="{{ route('sliders.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('السلايدر الرئيسي') }}</span></a>
                    </li>

                </ul>
            </li>


            @endif


            @if(Auth::user()->role_id == 1)
            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="headphones"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('Contacts') }}</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">{{ count(App\Models\Contact::where('status', '0')->get()) }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'contacts.index') active @endif"><a class="d-flex align-items-center" href="{{ route('contacts.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('All Contacts') }}</span></a>
                    </li>


                </ul>
            </li>
            @endif

            @if(Auth::user()->role_id == 1)
            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="order">{{ __('Setting') }}</span></a>
                <ul class="menu-content">
                    <li class="@if(\Request::route()->getName() == 'setting-website-edit') active @endif"><a class="d-flex align-items-center" href="{{ route('setting-website-edit') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('Website Setting') }}</span></a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'memdership-description') active @endif"><a class="d-flex align-items-center" href="{{ route('memdership-description') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">{{ __('اعدادات العضوية') }}</span></a>
                    </li>


                </ul>
            </li>
            @endif


        </ul>
    </div>
</div>
<!-- END: Main Menu-->
