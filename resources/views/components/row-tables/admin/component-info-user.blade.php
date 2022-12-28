<section class="border-bottom col-12 row m-0 p-0">

    <span class="col-3 line-height-40 text-center bg-grey-shine">
        کاربر
    </span>

    <a href="{{route("admin.users.user.show" , $userId)}}" class="col-9 line-height-40 text-center bg-white">
        {{$userFullName}}
    </a>

</section>