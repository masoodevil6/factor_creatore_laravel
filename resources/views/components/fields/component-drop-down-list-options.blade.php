<style>
    .form-selectection-{{$titleEn}}{
        width: fit-content
    }

    .list-option-{{$titleEn}}{
        left: 10%;
        width: 13rem;
        top: 30px;
        right: 0;
        z-index: 1000;
        display: none;
    }
    .list-option-{{$titleEn}}-active{
        display: block !important;
    }

    .list-option span{
        color: #000000;
    }

    .form-icon-item-drop-down{
        line-height: 0.5rem;
    }
    .form-title-item-drop-down{
        line-height: 0.5rem;
    }
</style>

<div class="form-selectection-{{$titleEn}} font-size-12 position-relative">

    <section  class="btn btn-success w-10-rem btn-sm" onclick="showListOption{{$titleEn}}(this)" >

        <i class="fa fa-cog"></i>
        <span>
            {{$titleFa}}
        </span>

    </section>

    <section  class="list-option-{{$titleEn}} position-absolute rounded">
        <section class="list-group rounded">
            {{$slot}}
        </section>
    </section>
</div>

<script>
    function showListOption{{$titleEn}}(element){

        var listOption = $(".list-option-{{$titleEn}}");
        var myListOption = $(element).parent().find(".list-option-{{$titleEn}}");


        if (!myListOption.hasClass("list-option-{{$titleEn}}-active")){
            listOption.removeClass("list-option-{{$titleEn}}-active");
            myListOption.addClass("list-option-{{$titleEn}}-active");
        }
        else {
            listOption.removeClass("list-option-{{$titleEn}}-active");
        }

    }
</script>
