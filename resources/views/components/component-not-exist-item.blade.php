<style>
    #icon-not-exist{
        font-size: 25pt;
    }
    #icon-not-exist , #text-not-exist{
        line-height: 40px;
    }
</style>
<section class="row border border-danger shadow bg-white mt-2 mt-lg-0 mx-1 py-1 rounded">
    <section class="col-4">
        <i id="icon-not-exist" class="fa fa-times-circle text-left text-danger d-block" aria-hidden="true"></i>
    </section>
    <section class="col-8">
        <p  id="text-not-exist" class=" text-right text-danger m-0 font-weight-bold">
            {{$title}}
            یافت نشد
        </p>
    </section>
</section>