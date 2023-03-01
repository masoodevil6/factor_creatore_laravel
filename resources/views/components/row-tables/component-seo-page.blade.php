<section id="seo-tabs" class="row col-12 mx-auto  border rounded bg-dark">

    <section class=" col-12 mx-auto row my-2">

        <section class="col-3 p-0">
            <section v-on:click="showTab = 0" v-bind:class="(showTab == 0) ? classSelected : ''"  class="d-block mx-1 text-white text-center p-1 cursor-pointer btn btn-info border-white">
                عنوان title
            </section>
        </section>

        <section class="col-3 p-0">
            <section v-on:click="showTab = 1" v-bind:class="(showTab == 1) ? classSelected : ''"  class="d-block mx-1 text-white text-center p-1 cursor-pointer btn btn-info border-white">
                توصیف description
            </section>
        </section>

        <section class="col-3 p-0">
            <section v-on:click="showTab = 2" v-bind:class="(showTab == 2) ? classSelected : ''"  class="d-block mx-1 text-white text-center p-1 cursor-pointer btn btn-info border-white">
                کلمات کلیدی keywords
            </section>
        </section>

        <section class="col-3 p-0">
            <section v-on:click="showTab = 3" v-bind:class="(showTab == 3) ? classSelected : ''"  class="d-block mx-1 text-white text-center p-1 cursor-pointer btn btn-info border-white">
                رباطها robots
            </section>
        </section>

    </section>


    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==0">

        <section class="col-12 mt-2">

            <label for="label-for-title" class="d-block text-right font-size-12">
                عنوان TITTLE
            </label>

            <input v-model="title" v-on:input="setTitle"  id="label-for-title" name="title" type="text" placeholder="عنوان TITTLE"  class="form-control form-control-sm form-text font-size-12">

        </section>


        <div class="col-12 my-1">
            <div class="col-12 border rounded bg-white p-0" style="height: 15px; overflow: hidden">
                <div class="float-left " v-bind:class="titleBgColor" v-bind:style="{'width': titlePercent + '%'}" style="height: 100%" ></div>
            </div>
            <p class="my-1" v-text="'وضعیت: ' + titleStatus + ' [ ' + titleLength + ' ] '"></p>
        </div>

    </section>





    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==1">
        <section class="col-12 mt-2">

            <label for="label-for-description" class="d-block text-right font-size-12">
                عنوان DESCRIPTION
            </label>

            <textarea v-model="description" v-on:input="setDescription"  id="label-for-description" name="description" class="form-control form-control-sm form-text font-size-12">

            </textarea>

            {{--<input  type="text" placeholder="عنوان DESCRIPTION"  >--}}

        </section>


        <div class="col-12 my-1">
            <div class="col-12 border rounded bg-white p-0" style="height: 15px; overflow: hidden">
                <div class="float-left " v-bind:class="descriptionBgColor" v-bind:style="{'width': descriptionPercent + '%'}" style="height: 100%" ></div>
            </div>
            <p class="my-1" v-text="'وضعیت: ' + descriptionStatus + ' [ ' + descriptionLength + ' ] '"></p>
        </div>
    </section>




    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==2">
        <p>tab3</p>
    </section>

    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==3">
        <p>tab4</p>
    </section>

</section>




<script src="{{asset("public/js/vue.js")}}"></script>
<script>

    var vueSeoTabs = new Vue({
        el:"#seo-tabs" ,
        data: {
            showTab:0 ,
            classSelected: 'bg-warning text-dark' ,
            //----------------------
            title:'{{$title}}' ,
            titlePercent: 0 ,
            titleBgColor: 'bg-danger' ,
            titleLength: 0 ,
            titleStatus: 'خالی' ,
            //----------------------
            description:'{{$description}}' ,
            descriptionPercent: 0 ,
            descriptionBgColor: 'bg-danger' ,
            descriptionLength: 0 ,
            descriptionStatus: 'خالی' ,
            //----------------------
        } ,
        methods:{
            setTitle: function () {
                this.titleLength =  this.title.length;
                if (this.titleLength > 0 && this.titleLength<=15 ){
                    this.titleStatus = "بسیار کم";
                    this.titleBgColor = "bg-danger";
                }
                else if (this.titleLength > 15 && this.titleLength<=30 ){
                    this.titleStatus = " کم";
                    this.titleBgColor = "bg-warning";
                }
                else if (this.titleLength > 30 && this.titleLength<=55 ){
                    this.titleStatus = " خوب";
                    this.titleBgColor = "bg-success";
                }
                else if (this.titleLength > 55 && this.titleLength<=60 ){
                    this.titleStatus = " خوب به زیاد";
                    this.titleBgColor = "bg-warning";
                }
                else if (this.titleLength > 60  ){
                    this.titleStatus = " خیلی زیاد";
                    this.titleBgColor = "bg-danger";
                }

                this.titlePercent = Math.floor((this.titleLength/60)*100);
                if (this.titlePercent > 100){
                    this.titlePercent = 100;
                }
            },

            setDescription: function () {
                this.descriptionLength =  this.description.length;
                if (this.descriptionLength > 0 && this.descriptionLength<=30 ){
                    this.descriptionStatus = "بسیار کم";
                    this.descriptionBgColor = "bg-danger";
                }
                else if (this.descriptionLength > 30 && this.descriptionLength<=60 ){
                    this.descriptionStatus = " کم";
                    this.descriptionBgColor = "bg-warning";
                }
                else if (this.descriptionLength > 60 && this.descriptionLength<=120 ){
                    this.descriptionStatus = " خوب";
                    this.descriptionBgColor = "bg-success";
                }
                else if (this.descriptionLength > 120 && this.descriptionLength<=150 ){
                    this.descriptionStatus = " خوب به زیاد";
                    this.descriptionBgColor = "bg-warning";
                }
                else if (this.descriptionLength > 150  ){
                    this.descriptionStatus = " خیلی زیاد";
                    this.descriptionBgColor = "bg-danger";
                }

                this.descriptionPercent = Math.floor((this.descriptionLength/150)*100);
                if (this.descriptionPercent > 100){
                    this.descriptionPercent = 100;
                }
            }
        },
        beforeMount() {
            this.setTitle() ,
            this.setDescription()
        },
    });



</script>