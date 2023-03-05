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
                توصیف DESCRIPTION
            </label>

            <textarea v-model="description" v-on:input="setDescription"  id="label-for-description" name="description" class="form-control form-control-sm form-text font-size-12">

            </textarea>

        </section>


        <div class="col-12 my-1">
            <div class="col-12 border rounded bg-white p-0" style="height: 15px; overflow: hidden">
                <div class="float-left " v-bind:class="descriptionBgColor" v-bind:style="{'width': descriptionPercent + '%'}" style="height: 100%" ></div>
            </div>
            <p class="my-1" v-text="'وضعیت: ' + descriptionStatus + ' [ ' + descriptionLength + ' ] '"></p>
        </div>
    </section>



    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==2">

        <p class="bg-secondary rounded col-12 text-white px-2 py-0 m-0">
            کلمات کلیدی ثبت شده:
        </p>
        <ul class="list-group col-12 border  border-dark rounded">
            <li class="list-group-item p-1 m-1" v-for="(value , key) in keywords">
                <label for="label-for-keyword-n" class="d-block text-right font-size-12" v-text= "' کلمه کلیدی ' + (key+1)"></label>

                <input v-model="keywords[key]" id="label-for-keyword-n" name="keywords[]"  type="text" placeholder="'کلمه کلیدی' + key"  class="form-control form-control-sm form-text font-size-12">

                <a class="btn btn-danger text-white my-1" v-on:click="removeKeyword(key)"> حذف </a>
            </li>
        </ul>



        <section class="col-12 mt-5 border border-dark rounded p-1">
            <label for="label-for-keyword-n" class="d-block text-white px-2 text-right font-size-12 bg-secondary rounded">
                کلمه کلیدی جدید
            </label>

            <input v-model="newKeyword" id="label-for-keyword-n"  type="text" placeholder="کلمه کلیدی جدید"  class="form-control form-control-sm form-text font-size-12">

            <a class="btn btn-success text-white my-1" v-on:click="addKeyword"> افزودن </a>
        </section>

    </section>



    <section class="col-12 mx-auto row border rounded my-2 p-2 bg-white" v-show="showTab==3">

        <p class="bg-secondary rounded col-12 text-white px-2 py-0 m-0">
            ربات های ثبت شده:
        </p>
        <ul class="list-group col-12 border  border-dark rounded">
            <li class="list-group-item p-1 m-1" v-for="(value , key) in robots">
                <p  class="d-block text-right font-size-12" v-text= "' ربات ' + (key+1)"></p>
                <p class="form-control form-control-sm form-text font-size-12"  v-text="value"></p>
                <input type="hidden" v-model="value" name="robots[]">
                <a class="btn btn-danger text-white my-1" v-on:click="removeRobot(key)"> حذف </a>
            </li>
        </ul>


        <section class="col-12 mt-5 border border-dark rounded p-1">
            <label for="label-for-robot-n" class="d-block text-white px-2 text-right font-size-12 bg-secondary rounded">
                ربات جدید
            </label>

            <select id="label-for-robot-n" v-model="newRobot" v-on:change="changeRobotSelected" class="form-control form-control-sm form-text font-size-12">
                @foreach($robots as $key=>$value)
                    <option value="{{$value["title"]}}" >{{$value["title"]}}</option>
                @endforeach
            </select>

            <p class="border mt-2 bg-warning text-dark p-2 rounded" v-text="descriptionRobot"></p>

            <a class="btn btn-success text-white my-1" v-on:click="addRobot"> افزودن </a>
        </section>

    </section>

</section>


<script src="{{asset("public/js/vue.js")}}"></script>
<script>

    new Vue({
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
            keywords: {!!  json_encode($listKeywords) !!} ,
            newKeyword: "" ,
            //----------------------
            robots: {!!  json_encode($listRobots) !!} ,
            newRobot: "" ,
            descriptionRobot: "" ,
            listRobots: {!! json_encode($robots) !!}
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

            //----------------------
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
            } ,

            //----------------------
            addKeyword: function () {
                if (this.newKeyword != "" && this.newKeyword != null){
                    this.keywords.push(this.newKeyword);
                    this.newKeyword = "";
                }
                else {
                    alert("فیلد مربوطه خالی می باشد")
                }
            } ,

            removeKeyword: function (key) {
                delete this.keywords[key];

                var listKeywords = [];
                for (var i=0; i < this.keywords.length ; i++){
                    if (this.keywords[i] != "" && this.keywords[i] != null){
                        listKeywords.push(this.keywords[i]);
                    }
                }
                this.keywords = listKeywords;
            } ,

            //----------------------
            addRobot: function () {
                if (this.newRobot != "" && this.newRobot != null){
                    this.robots.push(this.newRobot);
                    this.newRobot = "";
                    this.descriptionRobot = "";
                }
                else {
                    alert("فیلد مربوطه خالی می باشد")
                }
            } ,

            removeRobot: function (key) {
                delete this.robots[key];

                var listRobots = [];
                for (var i=0; i < this.robots.length ; i++){
                    if (this.robots[i] != "" && this.robots[i] != null){
                        listRobots.push(this.robots[i]);
                    }
                }
                this.robots = listRobots;
            } ,

            changeRobotSelected: function () {
                this.descriptionRobot = "";
                for (var i=0; i < this.listRobots.length ; i++){
                    if (this.listRobots[i]["title"] == this.newRobot){
                        this.descriptionRobot=this.listRobots[i]["description"];
                        break;
                    }
                }
            }

        },
        beforeMount() {
            this.setTitle() ,
            this.setDescription()
        },
    });



</script>