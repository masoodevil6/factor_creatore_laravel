<header class="header-main">

    <section class="sidebar-header bg-grey ">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
            <span id="sidebar-toggle-hide" class="d-inline d-md-none ">
                <i class="fas fa-toggle-off"></i>
            </span>
            <span id="sidebar-toggle-show" class="d-none d-md-inline ">
                <i class="fas fa-toggle-on"></i>
            </span>

            <span class="logo">
                <a class="text-decoration-none mr-2 pt-1" href="{{route("customer.home")}}">
                    <img id="logo-site" src="{{getLocationLogoSite()}}" alt="logo">
                </a>
            </span>

            <span id="body-header-show" class="d-md-none">
                <i class="fas fa-ellipsis-h"></i>
            </span>
        </section>

    </section>

    <section id="body-header" class="body-header">
        <section class="d-flex justify-content-between">

            <section class="mx-3">

                <span class=" ml-3 ml-md-5 position-relative">

                    <span id="header-profile-toggle" class="pointer">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="header-username"> {{Auth::user()->fullName}} </span>
                        <i class="fas fa-angle-down"></i>
                    </span>

                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">

                            <a href="{{route("admin.public.setting.index")}}" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-cog"></i>
                                </span>
                                <span class="header-profile-title">تنظیمات</span>
                            </a>

                            <a href="{{route("customer-panel.home")}}" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="header-profile-title">پنل کاربری</span>
                            </a>

                            <a href="{{route("admin.tickets.ticket.index")}}" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <span class="header-profile-title">پیام ها</span>
                            </a>

                            <a href="{{route("admin.password.change-password")}}" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <span class="header-profile-title">تغییر رمز</span>
                            </a>

                            <a href="{{route("admin-auth.logout")}}" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span class="header-profile-title">خروج</span>
                            </a>
                        </section>
                    </section>

                </span>

            </section>

            <section class="mx-3">
                <span class=" mr-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fas fa-times pointer"></i>
                        <input id="search-area-input" name="search-box-panel" type="text" class="search-input" value="@if(isset($panelSearch)){{$panelSearch}}@endif">
                        <i class="fas fa-search pointer" onclick="searchPanel('{{route("admin.home")}}')"></i>
                    </span>
                    <i id="search-area-show" class="fas fa-search p-1 d-none d-inline pointer"></i>
                </span>

                <span  id="full-screen" class="pointer p-1 d-none d-md-inline mr-5">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand"></i>
                </span>

            </section>

        </section>
    </section>

</header>