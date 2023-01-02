<section class="border border-dark shadow color-family-1 rounded">
    @foreach($listPanels As $itemPanel)
        <section data-title="{{$itemPanel->getTitleEn()}}" onclick="selectItemPanelCustomer(this)" class="item-customer-panel  border border-dark rounded m-2 cursor-pointer btn-warning  text-hover-white @if($panelTitle == $itemPanel->getTitleEn())selected-item-customer @endif">
            <i class="icon-item-customer-panel float-right  px-2 border-left border-white   {{$itemPanel->getIcon()}}" aria-hidden="true"></i>
            <span class="title-item-customer-panel pr-2 font-size-md font-weight-bold">
                {{$itemPanel->getTitleFa()}}
            </span>
        </section>
    @endforeach


        <a href="{{route("auth.customer.logout")}}" class="item-customer-panel text-hover-white d-block rounded m-2 cursor-pointer btn-danger text-decoration-none">
            <i class="icon-item-customer-panel float-right  px-2 border-left border-white fa fa-sign-out-alt" aria-hidden="true"></i>
            <span class="title-item-customer-panel pr-2 font-size-md font-weight-bold">
                خروج
            </span>
        </a>


        @if(!empty(\Illuminate\Support\Facades\Auth::user()->admin))
            <section class="mt-5 d-block border-top border-white ">

                @if(auth("admin")->check())
                    <a href="{{route("admin.home")}}" class="d-block  text-hover-white border border-dark rounded m-2 cursor-pointer btn-warning  text-decoration-none">
                        <i class="icon-item-customer-panel fa fa-unlock float-right  px-2 border-left " aria-hidden="true"></i>
                        <span class="title-item-customer-panel pr-2 font-size-md font-weight-bold">
                            پنل مدیریت
                        </span>
                    </a>
                @else
                    <a href="{{route("admin-auth.form-login")}}" class="d-block  text-hover-white border border-dark rounded m-2 cursor-pointer btn-warning  text-decoration-none">
                        <i class="icon-item-customer-panel fa fa-lock float-right px-2 border-left " aria-hidden="true"></i>
                        <span class="title-item-customer-panel pr-2 font-size-md font-weight-bold">
                            ورود به پنل مدیریت
                        </span>
                    </a>
                @endif
            </section>
        @endif

</section>