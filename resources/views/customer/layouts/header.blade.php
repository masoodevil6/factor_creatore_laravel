<header class="header mb-4">

    <section class="top-header">
        <section class="container-xxl ">

            <section id="form-section-header">
                <section id="section-header" class="color-family-c-1 pt-1 shadow position-fixed">

                    <section id="nav-top" class="row justify-content-center mx-0 pt-1 w-100 ">

                        <section class="col-12 col-lg-10 row justify-content-between">

                            <section class="row justify-content-start  col-10  ">
                                <section class="col-12 col-lg-10 align-center  position-relative mx-0 px-0">
                                <span id="icon-main-search-box" class="position-absolute">
                                    <i class="fa fa-search text-white"></i>
                                </span>
                                    <input id="main-search-box" type="text" class="text-white w-100 d-block  color-family-c-2" placeholder="نام آهنگ، خواننده و بخشی از متن ..." autocomplete="off">
                                    <span id="btn-main-search-box" class="position-absolute btn btn-danger" onclick="doSearchClient()">
                                        <i class="fa fa-search text-white"></i>
                                    </span>
                                </section>
                            </section>

                            <section class="d-lg-none row justify-content-end col-2">

                                <button class="btn  shadow navbar-toggler border-white " type="button" data-toggle="collapse" data-target="#form-navigation" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fa fa-bars font-size-xlg text-white"></i>
                                </button>

                            </section>

                            <section class="row justify-content-lg-end col-lg-2 text-end d-none d-lg-flex ">

                                <section class="d-flex justify-content-center">
                                    <a class="text-decoration-none mr-2" href="{{route("home")}}">
                                        <img id="logo-site" src="{{getLocationLogoSite()}}" alt="logo">
                                    </a>
                                </section>

                            </section>

                        </section>

                        <section id="form-progress-scroll-bar" class="float-right w-100 shadow-sm  bg-white mt-1">
                            <div id="progress-scroll-bar" class="rounded "  style="width: 0"></div>
                        </section>

                    </section>

                    <section id="form-navigation" class="collapse navbar-collapse d-lg-block orver">

                        <section id="inside-form-navigation" class="row justify-content-center mx-0  pt-1  color-family-c-2 border-bottom ">

                            <section class="col-lg-10 row mt-3 mt-lg-0">


                                <section class="row col-12 col-lg-4 justify-content-lg-end justify-content-center mb-1 p-0 m-0 order-lg-last">
                                    @guest
                                        <a href="{{route("auth.customer.loginRegisterForm")}}" title="ورود/ثبت نام" class="btn btn-warning shadow py-1 border-none rounded text-decoration-none text-dark profile-button float-lg-left  ">
                                            <i class="fa fa-user-lock text-white  "></i>
                                            <span class="pr-3 border-right border-secondary  font-size-md">
                                                ورود/ثبت نام
                                            </span>
                                        </a>
                                    @endguest

                                    @auth
                                        <section class="btn-group d-inline px-3 ">
                                            <button class="btn btn-warning   shadow  py-1 border-none rounde dropdown-toggle text-decoration-none text-dark profile-button text-dark" type="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="true">
                                                <i class="fa fa-user text-white "></i>
                                                <span class="pr-3 border-right border-secondary  font-size-md ">
                                                    {{Auth::user()->fullName}}
                                                </span>
                                            </button>
                                            <section class="dropdown-menu">
                                                <section>
                                                    <a class="dropdown-item" href="{{route("customer-panel.home")}}">
                                                        <i class="fa fa-user-circle"></i>
                                                        <span class="pr-2  font-size-md">
                                                            پروفایل کاربری
                                                        </span>
                                                    </a>
                                                </section>
                                                <section>
                                                    <a class="dropdown-item" href="{{route("customer-panel.home" , "my-playlist")}}">
                                                        <i class="fa fa-play-circle-o"></i>
                                                        <span class="pr-2  font-size-md">
                                                            لیست پخش من
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


                                        <a class="btn btn-warning py-1 border-none round mr-2" href="{{route("music-player.index")}}">
                                            <i class="fa fa-play-circle text-white "></i>
                                            <span class="pr-2  font-size-md border-right border-dark" >موزیک پلیر</span>
                                        </a>

                                </section>

                                <section  class="row col-lg-6 mt-lg-1 row mt-2 m-0">

                                    <section id="form-items-nav" class=" col-12 col-lg-10 row justify-content-lg-start justify-content-center color-family-c-1 p-0 m-0">
                                        @include("public.link-nav-location")
                                    </section>

                                </section>

                                @include("public.social-site")

                            </section>

                        </section>

                    </section>

                </section>
            </section>

        </section>
    </section>

</header>

