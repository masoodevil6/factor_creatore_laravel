@if($btnType == "delete")

    <form  method="post" action="{{$url}}" class="@if($floatRight == 1) float-right @else float-left @endif mx-1 my-sm-1  my-md-1 my-lg-0" >
        @csrf
        @method("delete")
        <button onclick="goToConfirmDeleteForm(this)" type="button"  class="btn {{$btnColor != "" ? $btnColor : "btn-danger"}}  btn-sm font-size-12">
            <i class="fa fa-trash-alt"></i>
            {{$title != "" ? $title : "حذف"}}
        </button>
    </form>

    <script>

        function goToConfirmDeleteForm(element , doConfirm=false) {
            if (doConfirm){
                submitForm(element)
            }
            else {
                swalConfirmDelete(submitForm , element)
            }
        }

        function submitForm(element) {
            $(element).parent().submit();
        }

        function swalConfirmDelete(callback , element) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'آیا مطمئن می باشید؟',
                text: "شما می توانید درخواست خود را لغو کنید",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
                reverseButtons: true
            }).then(function (result) {
                if (result.value == true){
                    callback(element);
                }
                else if(result.dismiss === swal.DismissReason.cancel){
                    swalWithBootstrapButtons.fire({
                        title: 'لغو درخواست',
                        text: "درخواست شما لغو شد",
                        icon: 'error',
                        confirmButtonText: 'باشه'
                    });
                }
            });

        }

    </script>

@elseif($btnType == "edit")

    <a href="{{$url}}" class="btn {{$btnColor != "" ? $btnColor : "btn-primary"}} btn-sm @if($floatRight == 1) float-right @else float-left @endif my-sm-1 my-md-1 my-lg-0 font-size-12 mx-1">
        <i class="fa fa-eye"></i>
        <span>
            {{$title != "" ? $title : "اصلاح"}}
        </span>
    </a>

@elseif($btnType == "custom")

    <a href="{{$url}}" class="btn {{$btnColor != "" ? $btnColor : "btn-success"}} btn-sm @if($floatRight == 1)  float-right @else float-left @endif my-sm-1 my-md-1 my-lg-0 font-size-12 mx-1">
        <i class="{{$btnIcon}}"></i>
        <span>
            {{$title}}
        </span>
    </a>

@endif
