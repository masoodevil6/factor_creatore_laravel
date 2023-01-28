<header class="header mb-2">

    <section class="container-xxl ">

        <section id="form-section-header">


            <section id="section-header" class="color-family-1 shadow position-fixed">

                <section id="form-section-header" class="m-auto d-lg-flex">

                    <section id="blur-nav-mobile" onclick="CloseNavPhone()" class="bg-grey d-lg-none d-none"></section>

                    <section id="nav" class="col-lg-9 d-lg-flex color-family-1 shadow-lg">

                        <section class="d-lg-none d-flex justify-content-lg-center justify-content-center">
                            <a class="text-decoration-none mr-2 pt-1" href="{{route("customer.home")}}">
                                <img id="logo-site" src="{{getLocationLogoSite()}}" alt="logo">
                            </a>
                        </section>

                        <a href="{{route("customer.home")}}" title="خانه" class="btn-nav mx-1 my-2 text-hover-white  btn btn-warning shadow border-none rounded text-decoration-none profile-button float-lg-left  ">
                            <i  class="nav-icon fa fa-home   float-right border-left border-secondary"></i>
                            <span class="pr-2    font-size-md font-weight-bold">
                                خانه
                            </span>
                        </a>

                        <a href="{{route("customer.subscribes.list")}}" title="خرید اشتراک" class="btn-nav mx-1 my-2 text-hover-white  btn btn-warning shadow border-none rounded text-decoration-none profile-button float-lg-left  ">
                            <i  class="nav-icon fa fa-basket-shopping float-right border-left border-secondary"></i>
                            <span class="pr-2    font-size-md font-weight-bold">
                                خرید اشتراک
                            </span>
                        </a>


                        <a href="{{route("customer.create-factor.index")}}" title="فاکتور جدید" class="btn btn-nav btn-warning position-relative mx-1 text-hover-white my-2 shadow border-none rounded text-decoration-none  profile-button float-lg-left  ">
                            <i class="nav-icon fa fa-file-text float-right border-left border-secondary"></i>
                            <span class="pr-2   font-size-md font-weight-bold">
                                فاکتور جدید
                            </span>
                        </a>


                        @guest
                            <a href="{{route("auth.customer.loginRegisterForm")}}" title="ورود/ثبت نام" class="btn mx-1 my-2 text-hover-white btn-nav btn-warning shadow border-none rounded text-decoration-none profile-button float-lg-left  ">
                                <i class="nav-icon fa fa-user-lock   float-right border-left border-secondary"></i>
                                <span class="pr-2 text-hover-white  font-size-md font-weight-bold">
                                    ورود/ثبت نام
                                </span>
                            </a>
                        @endguest
                        @auth

                            <section class="btn-group d-inline px-lg-2 my-lg-2 ">
                                <button id="btn-header-client-panel" class="btn btn-warning btn-nav shadow mx-1 text-hover-white mx-lg-0 border-none rounde dropdown-toggle text-decoration-none  profile-button " type="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="true">
                                    <i class="nav-icon fa fa-user  float-right border-left border-secondary"></i>
                                    <span id="text-header-client-panel" class="pr-2  font-size-md font-weight-bold d-inline-block">
                                        {{Auth::user()->fullName}}
                                    </span>
                                </button>
                                <section class="dropdown-menu shadow">
                                    <section>
                                        <a class="dropdown-item" href="{{route("customer-panel.home")}}">
                                            <i class="fa fa-user-circle"></i>
                                            <span class="pr-2  font-size-md">
                                                پروفایل کاربری
                                            </span>
                                        </a>
                                    </section>
                                    <section>
                                        <a class="dropdown-item" href="{{route("customer-panel.home" , "factors")}}">
                                            <i class="fa fa-book"></i>
                                            <span class="pr-2  font-size-md">
                                                فاکتور ها
                                            </span>
                                        </a>
                                    </section>
                                    <section><hr class="dropdown-divider"></section>
                                    <section>
                                        <a class="dropdown-item" href="{{route("auth.customer.logout")}}">
                                            <i class="fa fa-sign-out-alt"></i>
                                            <span class="pr-2  font-size-md">
                                                خروج
                                            </span>
                                        </a>
                                    </section>
                                </section>
                            </section>

                        @endauth


                        <a href="{{route("customer.about-us")}}" title="درباره ما" class="btn-nav mx-1 my-2 text-hover-white btn btn-warning shadow border-none rounded text-decoration-none profile-button float-lg-left  ">
                            <i class="nav-icon fa fa-store   float-right  border-left border-secondary "></i>
                            <span class="pr-2 font-size-md font-weight-bold">
                                درباره ما
                            </span>
                        </a>

                        <a href="{{route("customer.about-us-download")}}" title="دانلود برنامه ها" class="btn-nav mx-1 my-2 text-hover-white btn btn-warning shadow border-none rounded text-decoration-none profile-button float-lg-left  ">
                            <i class="nav-icon fa fa-download   float-right  border-left border-secondary "></i>
                            <span class="pr-2 font-size-md font-weight-bold">
                                دانلود
                            </span>
                        </a>



                    </section>

                    <section class="d-flex col-12 col-lg-3">

                        <section class="col-8 col-lg-12">
                            <section class="d-flex justify-content-lg-center justify-content-start ml-5 ml-lg-0">
                                <a class="text-decoration-none mr-2 pt-1" href="{{route("customer.home")}}">
                                    <img id="logo-site" src="{{getLocationLogoSite()}}" alt="logo">
                                </a>
                            </section>
                        </section>

                        <section class="col-4 d-block d-lg-none ">
                            <button id="btn-show-nav-mobile" onclick="OpenOrCloseNavPhone()" class="btn  shadow navbar-toggle border-white m-2 float-left" type="button" data-toggle="collapse" data-target="#form-navigation" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars font-size-xlg text-white"></i>
                            </button>
                        </section>


                    </section>

                </section>

                <section id="form-progress-scroll-bar" class="float-right w-100 shadow-sm ">
                    <div id="progress-scroll-bar"   style="width: 0"></div>
                </section>

            </section>
        </section>

    </section>

</header>

