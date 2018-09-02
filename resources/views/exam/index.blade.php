@extends('layout')

@section('content')
    <div id="modalViewQues" class="modal" >
        <div class="modal-content">
            <div class="card-">
                <h4 class="header2">View question</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">

                                <div class="img_res card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{url('theme')}}/images/img1.jpg" alt="office">
                                </div>

                                <div class="card-reveal quesTitle">
                                    <p>Here is some more information about this product that is only revealed once
                                        clicked on.  this product that is only revealed once
                                        clicked on.</p>
                                </div>
                            <div class="answersList">
                                <div class="row">
                                    <div class="col l12 s12">

                                    </div>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section resultPage" style="display: none;">
        <div class="row">
            <div class="col s12 m4 l3">
                <h4 class="header">Hazard recognition</h4>
            </div>
            <div class="col s12 m8 l9">
                @foreach ($quesNormal as $key=>$qu)
                    <div class="col s3 m2 l2 firstPartItem clickResult" data-json='{{$qu->json}}'>
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('theme')}}/images/img1.jpg" alt="office">
                            </div>
                            <div class="card-content NumQues">
                                <p class="">
                                    {{ $key+1 }}
                                </p>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l3">
                <h4 class="header">Traffic rules</h4>
            </div>
            <div class="col s12 m8 l9">


                @foreach ($quesRuls as $key=>$qu )
                    <div class="col s3 m2 l1 secondPartItem clickResult" data-json='{{$qu->json}}'>
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('theme')}}/images/img1.jpg" alt="office">
                            </div>
                            <div class="card-content NumQues">
                                <p class="">
                                    {{ $key+1 }}
                                </p>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="card-alert" class="card blue-grey warrningMessage" style="display: none">
        <div class="card-content white-text">
            <span class="card-title white-text darken-1"><i class="mdi-social-notifications"></i> Hazard recognition done</span>
            <p>You have completed the first part, do you want to continue to the second part?</p>
        </div>
        <div class="card-action blue-grey  darken-2">
            <a class="btn-flat waves-effect light-blue white-text btnContinue"><i class="mdi-navigation-check left"></i>
                Continue</a>
            <a class="btn-flat waves-effect red accent-2 white-text"><i class="mdi-content-clear left"></i> stop</a>
        </div>
        <button type="button" class="close white-text " data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div id="raised-buttons" class="section" style="opacity: 0">
        <div class="row">
            <div class="col s12 l7">

                <div class="card">
                    <div class="card-image">
                        <img class="imgQues" src="{{url('theme')}}/images/office.jpg"
                             alt="sample image">

                        <span class="card-title quesNumber"></span>
                    </div>
                    <div class="card-content">
                        <p>5/40</p>
                    </div>
                    <!--<div class="card-action">-->
                    <!--<a href="#">This is a link</a>-->
                    <!--<a href="#">This is a link</a>-->
                    <!--</div>-->
                </div>

            </div>
            <div class="col s12 l5">
                <ul id="task-card" class="collection with-header">
                    <li class="collection-header cyan">
                        <p class="task-card-date quesTxt">The raised button is a standard button that signify
                            actions and seek to give depth to a
                            mostly flat page. The floating circular action button is meant for very
                            important
                            functions. Flat buttons are usually used within elements that already have depth
                            like
                            cards or modals.</p>
                    </li>


                </ul>
                <div class="divider"></div>

                <div class="row">
                    <div class="col l8">&nbsp</div>
                    <div class="col l4">
                        <button class="btn waves-effect waves-light btnNext" type="submit" name="action">Next
                            <i class="mdi-av-play-arrow iconNext"></i>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>




@endsection

@section('script')

    <script>


        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });
            var Qnumber = 0;
            var sum = 0;
            var firstTime = null;
            var currentType = "Speedy";
            var dataJsonResult = [];
            var firstPart = {{$quesNormalCount}};
            var secondPart ={{$quesRulsCount}};
            ;
            var url = "{{url('theme')}}";
            var json = [
                // {
                //     "ques": {"en": "wat doet u", "ar": "ماذا تفعل"},
                //     "answer": [
                //         {"id": "A", "en": "remmen", "ar": "فرامل"},
                //         {"id": "B", "en": "gas los laten", "ar": "حرر البانزين"},
                //         {"id": "C", "en": "niets", "ar": "لاشيئ"}
                //     ],
                //     "correct": "A",
                //     "type": "speedy",
                //     "image": "images/img1.jpg"
                // },
                // {
                //     "ques": {"en": "wat doet u", "ar": "ماذا تفعل"},
                //     "answer": [
                //         {"id": "A", "en": "remmen", "ar": "فرامل"},
                //         {"id": "B", "en": "gas los laten", "ar": "حرر البانزين"},
                //         {"id": "C", "en": "niets", "ar": "لاشيئ"}
                //     ],
                //     "correct": "C",
                //     "type": "speedy",
                //     "image": "images/img2.jpg"
                // },
                // {
                //     "ques": {"en": "Lorem Ipsum is simply dummy text of the printing", "ar": "ماذا تفعل"},
                //     "answer": [
                //         {"id": "A", "en": "anser1", "ar": "فرامل"},
                //         {"id": "B", "en": "ansr2", "ar": "حرر البانزين"},
                //         {"id": "C", "en": "amsr3", "ar": "لاشيئ"}
                //     ],
                //     "correct": "C",
                //     "type": "normal",
                //     "image": "images/img3.jpg"
                // },
                // {
                //     "ques": {"en": "simply dummy text of the printing", "ar": "ماذا تفعل"},
                //     "answer": [
                //         {"id": "A", "en": "anser1111", "ar": "فرامل"},
                //         {"id": "B", "en": "ansr22222", "ar": "حرر البانزين"},
                //         {"id": "C", "en": "amsr33333", "ar": "لاشيئ"}
                //     ],
                //     "correct": "C",
                //     "type": "normal",
                //     "image": "images/img3.jpg"
                // }
                    @foreach ($quesNormal as $qu)


                {
                    "ques": {!! $qu->ques  !!},
                    "answer":

                    {!! $qu->answers  !!}
                    ,
                    "correct": {!! $qu->correct !!},
                    "type": "{!! $qu->type !!}",
                    "image": "images/img1.jpg"
                },
                    @endforeach
                    @foreach ($quesRuls as $qu)


                {
                    "ques": {!! $qu->ques  !!},
                    "answer":


                    {!! $qu->answers  !!}
                    ,
                    "correct": {!! $qu->correct !!},
                    "type": "{!! $qu->type !!}",
                    "image": "images/img1.jpg"
                },
                @endforeach
            ];
            var totalQues = firstPart + secondPart;
            var firstPartQ = firstPart;

            //Check if the answer is true or false
            function checkQuesByNum(num, userAnswer) {
                var isTrue;
                var newNum = num - 1;
                var trueAnswer = json[newNum].correct;
             //   console.log(userAnswer + "++++ true:" + trueAnswer);

                // console.log(json[newNum].answer + "--"+newNum+"---" + userAnswer)
                if (trueAnswer == userAnswer) {
                    isTrue = 1
                    sum++;
                }
                else {
                    isTrue = 0
                }
                if (userAnswer != null) {
                    dataJsonResult[newNum] = {"user-answer": userAnswer, "isTrue": isTrue};
                }
                else {
                    dataJsonResult[newNum] = {"user-answer": "none", "isTrue": "0"};
                    isTrue = 0;
                }

                // console.log(sum); gevaarherkenning ---Verkeersregels

            }

            // $.ajax({
            //     url: "",
            //     type: 'post',
            //     dataType: 'text',
            //     data: {
            //         files: files,
            //         folders: folders
            //     },
            //     success: function (data) {
            //         $('.custom-alerts.alert.alert-success.fade.in').remove()
            //         $('.message-bar').append('<div class="custom-alerts alert alert-success fade in">Files/Folders removed <a href="#" class="undo_btn">Undo </a></div>');
            //
            //     }
            // });


//-----------ON CLICK NEXT--------------
            $(".btnNext").click(function () {
                console.log("(firstPart="+firstPart +") == (Qnumber + 1) ="+(Qnumber + 1))

                console.log("----------");
                console.log(Qnumber);
                console.log("----------");


                if ((firstPart == (Qnumber + 1)) && firstTime!=null ) {
                    $("#raised-buttons").hide("slow");
                    $(".warrningMessage").show("slow");
                    firstPart = 0;

                    return false;
                }

                firstTime ? ++Qnumber : "none";

                console.log("----------");
                console.log(Qnumber);
                console.log("----------");

                $("#raised-buttons").animate({'opacity': '0'}).show().promise().done(function () {
                    var newJson = json[Qnumber];
                    var radioAnswer = $("input[name='Answer']:checked").parent().attr("data-id");
                    firstTime ? checkQuesByNum(Qnumber, radioAnswer) : "";
                    if ((totalQues) == Qnumber) {
                        generateResultPage();
                        return false;
                    }

                    var ques = newJson.ques.en;
                    var options = newJson.answer;
                    //   console.log(radioAnswer);
                    $(".collection-item").hide().remove();
                    $(".imgQues").hide();
                    $(".imgQues").show().attr("src", url + "/" + newJson.image).one("load", function () {
                      //  console.log("click");

                        $("#raised-buttons").animate({'opacity': '1'});
                        $(".quesTxt").text(ques);

                        if (Qnumber < firstPart) {
                            $(".quesNumber").text((Qnumber + 1) + "/" + firstPart);
                        }
                        else {
                            $(".quesNumber").text(((Qnumber + 1) - firstPartQ) + "/" + secondPart);

                        }
                        $.each(options, function (index, value) {
                            $("#task-card").append(" <li data-id='" + value.id + "' class=\"collection-item \"\n" +
                                "                        style=\"touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">\n" +
                                "                        <input class=\"inputRadio\" name=\"Answer\" type=\"radio\" id=\"test" + (index + 1) + "\" value=\"" + value.id + "\"/>\n" +
                                "                        <label class=\"quesOption" + (index + 1) + " labelQues\" for=\"test" + (index + 1) + "\">" + value.en + "</label>\n" +
                                "                    </li>");
                            //     console.log(value);
                        });
                        firstTime = 1;
                    });


                //    console.log(dataJsonResult);

                });

            })

            $(".clickResult").click(function (){
               json =$(this).attr("data-json");
               ques= JSON.parse(json);

                // ques.answer;
                // ques.ques.en;
                // ques.ques.ar;
                // ques.correct;

                $(".answersList .row .col").html("");
                //fetch data to view them
                $.each(ques.answer, function (index, value) {
                    var isTrue="";
           //         console.log(value)

                    if(value.id==ques.correct)
                    {
                        isTrue="true";
                    }

                    $(".answersList .row .col").append('<div class="itemQ '+isTrue+'">\n' +value.en +
                        '                                        </div>');

                });
                //language
                $(".quesTitle p").text(ques.ques.en)

                $("#modalViewQues").openModal();


            });
            $(".btnContinue").click(function () {
                $(".warrningMessage").hide("slow");
                $(".btnNext").click();
            });

            //   console.log(json[0].ques1.en);

            $(".btnNext").click();
//----------END CLICK NEXT---------
            moveIcon();

//------------------------
            function moveIcon() {
                setTimeout(function () {
                    if ($(".iconNext").css("left") == "0px") {
                        $(".iconNext").animate({left: '7px', opacity: "1"}, 300);
                    }
                    else {
                        $(".iconNext").animate({left: '0px', opacity: "0.6"}, 300);

                    }
                    moveIcon();
                }, 400);
            }

           // console.log();

            //generate result
            function generateResultPage() {
                $("#raised-buttons").hide();
                $(".resultPage").show();

                $(".firstPartItem ").each(function (index) {

                    switch (dataJsonResult[index].isTrue) {
                        case 0:
                            $(this).addClass("false");
                            break;
                        case 1:
                            $(this).addClass("true");
                            break;
                        default:
                            $(this).addClass("none");
                    }

                });
                $(".secondPartItem").each(function (index) {
                    switch (dataJsonResult[(firstPartQ + index)].isTrue) {
                        case 0:
                            $(this).addClass("false");
                            break;
                        case 1:
                            $(this).addClass("true");
                            break;
                        default:
                            $(this).addClass("none");

                    }


                });
            }


//------------------
        })


    </script>

@endsection
