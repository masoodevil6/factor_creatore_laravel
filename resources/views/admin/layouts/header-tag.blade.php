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
                <img src="admin-assets/images/logo.png" alt="">
            </span>

            <span id="body-header-show" class="d-md-none">
                <i class="fas fa-ellipsis-h"></i>
            </span>
        </section>

    </section>

    <section id="body-header" class="body-header">
        <section class="d-flex justify-content-between">

            <section>
                <span class=" mr-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fas fa-times pointer"></i>
                        <input id="search-area-input" type="text" class="search-input">
                        <i class="fas fa-search pointer"></i>
                    </span>
                    <i id="search-area-show" class="fas fa-search p-1 d-none d-inline pointer"></i>
                </span>

                <span  id="full-screen" class="pointer p-1 d-none d-md-inline mr-5">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand"></i>
                </span>

            </section>

            <section >

                {{--<span class="ml-2 ml-md-4 position-relative">

                    <span id="header-notification-toggle" onclick="openFormNotification('{{route("admin.notification.readAll")}}' , '{{ csrf_token() }}')" class="pointer">
                        <i class="far fa-bell"></i>
                        @if($notification->count() > 0)
                            <sup class="badge badge-danger"> {{$notification->count()}} </sup>
                        @endif
                    </span>

                    <section id="header-notification" class="header-notification rounded ">
                        <section class="d-flex justify-content-between ">
                            <span class="px-2">
                                نوتیفیکیشن ها
                            </span>

                             <span class="px-2">
                                    <span class="badge badge-danger">
                                        @if($notification->count() > 0)
                                            جدید
                                        @else
                                            خالی
                                        @endif
                                    </span>
                                </span>

                        </section>

                        <ul class="list-group  p-0 ">

                             @foreach($notification As $itemNotification)

                                <li class="list-group-item list-group-item-action pointer">
                                    <section class="media">
                                        <i class="far fa-bell"></i>
                                        <h5 class="notification-user pr-2">
                                            {{$itemNotification["data"]["message"]}}
                                        </h5>
                                    </section>
                                </li>

                            @endforeach

                        </ul>

                    </section>

                </span>

                <span class="ml-2 ml-md-4 position-relative">

                    <span id="header-comment-toggle" class="pointer">
                        <i class="far fa-comment-alt"></i>
                        @if($unseenComment->count() > 0)
                            <sup class="badge badge-danger"> {{$unseenComment->count()}} </sup>
                        @endif
                    </span>

                    <section id="header-comment" class="header-comment rounded">

                        <section class="d-flex justify-content-between ">
                          <span class="px-2">
                                نظرات
                            </span>
                           <span class="px-2">
                               <span class="badge badge-danger">
                                   @if($unseenComment->count() > 0)
                                       جدید
                                   @else
                                       خالی
                                   @endif
                               </span>
                           </span>
                        </section>

                        <section class="header-comment-wrapper">
                            <ul class="list-group rounded px-0">
                                @foreach($unseenComment As $itemComment)


                                    <li class="list-group-item list-group-item-action pointer">
                                        <a href="@if($itemComment->typeComment == "product") {{route("admin.market.comment.edit" , $itemComment-> id) }} @elseif($itemComment->typeComment == "post")  {{route("admin.content.comment.edit" , $itemComment-> id) }} @endif" class="text-black-50">
                                           <section class="media">
                                            <i class="far fa-comment-alt float-right"></i>
                                            <section class="comment-user line-highlight pr-1 ">
                                                <h5 class="comment-user">{{$itemComment->user->fullName}}</h5>
                                                <span class="comment-user">
                                                    {{$itemComment->body}}
                                                </span>
                                            </section>
                                        </section>
                                        </a>

                                    </li>

                                @endforeach


                            </ul>
                        </section>


                    </section>

                </span>--}}

                {{--<span class=" ml-3 ml-md-5 position-relative">

                    <span id="header-profile-toggle" class="pointer">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="header-username"> {{Auth::user()->fullName}} </span>
                        <i class="fas fa-angle-down"></i>
                    </span>

                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">
                            <a href="#" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-cog"></i>
                                </span>
                                <span class="header-profile-title">تنظیمات</span>
                            </a>
                            <a href="#" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="header-profile-title">کاربر</span>
                            </a>
                            <a href="#" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <span class="header-profile-title">پیام ها</span>
                            </a>
                            <a href="#" class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">
                                <span class="header-profile-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span class="header-profile-title">قفل صفحه</span>
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

                </span>--}}

            </section>

        </section>
    </section>

</header>