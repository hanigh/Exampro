@extends('layout')

@section('content')

    <input id="file-input" type="file" multiple name="files[]" style="display: none;">

    <div id="modalAddAnswer" class="modal">
        <div class="modal-content">
            <div class="card-">
                <h4 class="header2">Add answer</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="AnswerFirstLang" type="text">
                                <label for="first_name" class="">Answer</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="AnswerSecondLang" type="text">
                                <label for="first_name" class="">Answer(AR)</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right addAnswerPost" type="button"
                                        name="action">
                                    save
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modalQues" class="modal">
        <div class="modal-content">
            <div class="card-">
                <h4 class="header2">Add question</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="name" class="quesEN" type="text">
                                <label for="first_name">Question(EN)</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="name" class="quesAR" type="text">
                                <label for="first_name">Question(AR)</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">


                                <div class="col s12 ">
                                    <h7>Antword</h7>
                                    <ul class="collection AntwordList">

                                    </ul>
                                    <a href="#modalAddAnswer"
                                       class="btn-floating modal-trigger  btn-move-up waves-effect waves-light darken-2 right addAnswer"><i
                                                class="mdi-content-add activator"></i></a>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class=" col s12">
                                <form action="#">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" placeholder="Uploadfile" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right editQues" type="button"
                                            name="action">Edit
                                    </button>
                                    <button class="btn cyan waves-effect waves-light right addQues" type="button"
                                            name="action">
                                        Add
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <p class="caption">Forms are the standard way to receive user inputted data. The transitions and smoothness of these
        elements are very important because of the inherent user interaction associated with forms.</p>
    <div class="divider"></div>

    <div id="activeSection">
        <h4 class="header">Options</h4>
        <div class="row">
            <div class="col s12 m4 l3">
                <p></p>
            </div>
            <div class="col s12 m8 l9">
                <!-- Switch -->
                <div class="input-field ">
                    <input id="exam_name" type="text" value="{{$exam->name}}">
                    <label for="exam" class="">Exam name</label>
                </div>
                <br>
                <div class="switch">
                    Enabled :
                    <label>
                        Off
                        <input type="checkbox">
                        <span class="lever"></span> On
                    </label>
                </div>

                <br>
                <!-- Disabled Switch -->

            </div>
        </div>
    </div>
    <div class="divider"></div>
    <a href="#modalQues"
       class="modal-trigger btn-floating btn-move-up waves-effect waves-light darken-2 right plus_add addNewQues "><i
                class="mdi-content-add activator"></i></a>


    <div id="hazardRecognition">
        <h4 class="header">Hazard recognition</h4>
        <div class="row">
            <div class="col s12 m4 l3">
                <p>Text fields allow user input. The border should light up simply and clearly indicating which field
                    the user is currently editing. You must have a <code class="  language-markup">.input-field</code>
                    div wrapping your input and label. This
                    helps our jQuery animate the label. This is only used in our Input and Textarea form elements.</p>
                <p>If you don't want the Green and Red validation states, just remove the <code
                            class="  language-markup">validate</code> class from your inputs.</p>
            </div>
            <div class="col s12 m8 l9">
                <div class="row">

                    @foreach($qHazar as $key=>$rul)

                        <div data-id="{{$rul->id}}" data-type="{{$rul->type}}" class="col s3 m2 l1 itemQues">
                            <input type="hidden" class="jsonQuesInfo"
                                   value="{{  $rul->encodeURIComponent($rul->json)  }}">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{url('theme')}}/images/img1.jpg"
                                         alt="office">
                                </div>
                                <div class="delete"><i class="mdi-action-delete"></i></div>
                                <div class="card-content NumQues">
                                    <p class="">
                                        {{$key+1}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="divider"></div>

    <a href="#modalQues"
       class="modal-trigger btn-floating plus_add btn-move-up waves-effect waves-light darken-2 right  modalAddRulsQues"><i
                class="mdi-content-add activator"></i></a>
    <div id="TrafficRules">
        <h4 class="header">Traffic rules</h4>
        <div class="row">
            <div class="col s12 m4 l3">
                <p>Text fields allow user input. The border should light up simply and clearly indicating which field
                    the user is currently editing. You must have a <code class="  language-markup">.input-field</code>
                    div wrapping your input and label. This
                    helps our jQuery animate the label. This is only used in our Input and Textarea form elements.</p>
                <p>If you don't want the Green and Red validation states, just remove the <code
                            class="  language-markup">validate</code> class from your inputs.</p>
            </div>
            <div class="col s12 m8 l9">
                <div class="row">

                    @foreach($qRuls as $key=>$rul)

                        <div data-id="{{$rul->id}}" data-type="{{$rul->type}}" class="col s3 m2 l1 itemQues">
                            <input type="hidden" class="jsonQuesInfo"
                                   value="{{  $rul->encodeURIComponent($rul->json)  }}">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{url('theme')}}/images/img1.jpg"
                                         alt="office">
                                </div>
                                <div class="delete"><i class="mdi-action-delete"></i></div>
                                <div class="card-content NumQues">
                                    <p class="">
                                        {{$key+1}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--@foreach($qRuls as $rul)--}}
                    {{--<p> {{ $rul->ques }} xxxx</p>--}}
                    {{--@endforeach--}}

                    {{--<div data-id="1" class="col s3 m2 l1 itemQues">--}}
                    {{--<div class="card">--}}
                    {{--<input type="hidden" class="jsonQuesInfo"--}}
                    {{--value="%7B%22ques%22%3A%7B%22en%22%3A%22qweq%22%2C%22ar%22%3A%22qweqe%22%7D%2C%22answer%22%3A%5B%7B%22id%22%3A%22A%22%2C%22en%22%3A%22qw%22%2C%22ar%22%3A%22123%22%7D%5D%2C%22type%22%3A%22normal%22%2C%22image%22%3A%22%22%7D">--}}
                    {{--<div class="card-image waves-effect waves-block waves-light">--}}
                    {{--<img class="activator" src="http://localhost:8000/theme/images/img1.jpg" alt="office">--}}
                    {{--</div>--}}
                    {{--<div class="delete">--}}
                    {{--<i class="mdi-action-delete"></i>--}}
                    {{--</div>--}}
                    {{--<div class="card-content NumQues">--}}
                    {{--<p class="">--}}
                    {{--2--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--@for ($i = 1; $i <= 40; $i++)--}}

                    {{--<div class="col s3 m2 l1 itemQues" data-id="">--}}
                    {{--<div class="card">--}}
                    {{--<div class="card-image waves-effect waves-block waves-light">--}}

                    {{--<img class="activator" src="http://localhost:8000/theme/images/img1.jpg"--}}
                    {{--alt="office">--}}

                    {{--</div>--}}
                    {{--<div class="delete"><i class="mdi-action-delete"></i></div>--}}
                    {{--<div class="card-content NumQues">--}}
                    {{--<p class="">--}}
                    {{--{{ $i }}--}}
                    {{--</p>--}}
                    {{--</div>--}}

                    {{--</div>--}}

                    {{--</div>--}}
                    {{--@endfor--}}

                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn cyan waves-effect waves-light right addQues saveExam" type="button" name="action">
                        save
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')


    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });


            var indexAntword = 0;
            var alfa = ["A", "B", "C", "D", "E", "F"];
            var typeQues = "";
            //Add answer post
            $(".addAnswerPost").click(function () {
                var answer1 = $("#AnswerFirstLang");
                var answer2 = $("#AnswerSecondLang");
                $(".AntwordList").append(' <li  en="' + answer1.val() + '" ar="' + answer2.val() + '" class="collection-item dismissable antwordItem">\n' +
                    '                                            <div><span>' + answer1.val() + '</span>    <p class="radioCorret">\n' +
                    '        <input class="inputAnswer" name="Answer" type="radio" id="r' + indexAntword + '" value="' + alfa[indexAntword] + '">\n' +
                    '        <label for="r' + indexAntword + '"></label>\n' +
                    '    </p> <a href="#!" class="secondary-content btnsAntw btnDeleteAnswer"><i class="mdi-action-delete "></i></a><a href="#!" class="secondary-content btnsAntw btnEditAnswer"><i class="mdi-action-settings-ethernet "></i></a></div>\n' +
                    '                                            </li>');
                indexAntword++;
                answer1.val("");
                answer2.val("");
                $("#modalAddAnswer").closeModal();
            })

            //DELETE ANSWER FROM OPTION
            $(document).on("click", ".btnDeleteAnswer", function () {
                $(this).parent().parent().remove();
            })
            var QuesWithAntwords = [];

            //Add *postAdd ques
            $(document).on("click", ".addQues", function () {

                var Antwords = [];
                var ques = {"ques": {"en": "", "ar": ""}, "answer": "", "correct": "", "type": "normal", "image": ""};
                var quesEN = $(".quesEN").val();
                var quesAR = $(".quesAR").val();
                var quesParent = "";

                // console.log(ques);

                $(".antwordItem").each(function (index) {

                    var AntwordEN = $(this).attr("en");
                    var AntwordAR = $(this).attr("ar");
                    Antwords.push({"id": alfa[index], "en": AntwordEN, "ar": AntwordAR})
                    /*
                   var quesAntword={"ques":{"en":"","ar":""},
                                    "answer":[{"id":"A","en":""},
                                           {"id":"B","en":""},
                                           {"id":"C","en":""},
                                       ]}
   */
                })
                ques.answer = Antwords;
                ques.ques.en = quesEN;
                ques.ques.ar = quesAR
                ques.correct = $("input[name='Answer']:checked").val();
              //  alert($("input[name='Answer']:checked").val());
                ques.image = "1";
                $.ajax({
                    url: "{{route('ques.postAdd')}}",
                    type: 'post',
                    dataType: 'text',
                    data: {
                        examID: {{ $exam->id }},// هنا رقم الامتحان من الداتا بيز
                        ques: JSON.stringify(ques.ques),
                        type: typeQues,
                        answers: JSON.stringify(ques.answer),
                        correct: JSON.stringify(ques.correct),
                        image: "1",
                        json: JSON.stringify(ques)
                    },
                    success: function (data) {
                        console.log(data);// يجب تعديل الايدي الجديد تبع السؤوال
                        if (typeQues == "ruls") {
                            quesParent = $("#TrafficRules > .row > .col > .row");

                        }
                        else {
                            quesParent = $("#hazardRecognition > .row > .col > .row");
                        }
                        QuesWithAntwords.push(ques);
                        var numq = quesParent.children().last().find(".NumQues").text();
                        (numq == 0 || numq == null) ? numq = 0 : "";
                        console.log(numq);
                        quesParent.append('<div data-id="'+data+'"  class="col s3 m2 l1 itemQues">\n' +
                            '                           <input type="hidden" class="jsonQuesInfo" value="' + encodeURIComponent(JSON.stringify(ques)) + '" > <div class="card">\n' +
                            '                                <div class="card-image waves-effect waves-block waves-light">\n' +
                            '                                    <img class="activator" src="http://localhost:8000/theme/images/img1.jpg" alt="office">\n' +
                            '                                </div>\n' +
                            '                                <div class="delete"><i class="mdi-action-delete"></i></div>\n' +
                            '                                <div class="card-content NumQues">\n' +
                            '                                    <p class="">\n' +
                            '                                        ' + (parseInt(numq) + 1) + '\n' +
                            '                                    </p>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                        </div>');
                        $("#modalQues").closeModal();

                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                });
                // console.log("traffic::" +typeQues);


            });

            // Change name of Exam
            $("#exam_name").focusout(function () {
                $.ajax({
                    url: "{{route('exam.changeName')}}",
                    type: 'post',
                    dataType: 'text',
                    data: {
                        id:{{$exam->id}},
                        name: $("#exam_name").val(),

                    },
                    success: function (data) {
                        console.log(data)
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                });

                //do somethin

            })

            //Add hazard ques
            $(document).on("click", ".addNewQues", function () {
                $(".AntwordList").html("");
                $(".addAnswer").hide();
                $(".addQues").show();
                $(".editQues").hide();
                typeQues = "normal";

                $(".AntwordList").append('<li en="remmen" ar="" class="collection-item dismissable antwordItem">\n' +
                    '                                            <div> <span>remmen</span>  <p class="radioCorret">\n' +
                    '                                                <input class="inputAnswer" name="Answer" type="radio" id="r0"  value="A"> <label for="r0"> </label> </p>\n' +
                    '                                               </div>\n' +
                    '                                            </li>\n' +
                    '                                        <li en="gas los laten" ar="" class="collection-item dismissable antwordItem">\n' +
                    '                                            <div>   <span>gas los laten</span>  <p class="radioCorret">\n' +
                    '                                                <input class="inputAnswer" name="Answer" type="radio" id="r1"  value="B"> <label for="r1"> </label> </p>\n' +
                    '                                           </div>\n' +
                    '                                        </li>\n' +
                    '                                        <li en="niets" ar="" class="collection-item dismissable antwordItem">\n' +
                    '                                            <div> <span>niets</span>  <p class="radioCorret">\n' +
                    '                                                <input class="inputAnswer" name="Answer" type="radio" id="r2"  value="C"> <label for="r2"> </label> </p>\n' +
                    '                                            </div>\n' +
                    '                                        </li>');
            });

            //button open page to add RULS new ques
            $(document).on("click", ".modalAddRulsQues", function () {
                $(".AntwordList").html("");
                $(".addAnswer").show();
                $(".addQues").show();
                $(".editQues").hide();
                typeQues = "ruls";

            });

            //button Edit quesItem
            $(document).on("click", ".itemQues .card-image", function () {
                $("#modalQues").openModal();
                $(".antwordItem").remove();
                $(".editQues").show();
                $(".addQues").hide();
                var dataType=$(this).closest(".itemQues").attr("data-type");
                if(dataType=="normal")
                {
                    $(".addAnswer").hide();
                }
                else
                {
                    $(".addAnswer").show();
                }
                var quesEN = $(".quesEN");
                var quesAR = $(".quesAR");
                quesEN.val("");
                quesAR.val("");

                var json = decodeURIComponent($(this).closest(".itemQues").find(".jsonQuesInfo").attr("value"));
                var QuesInfo = JSON.parse(json);
                var IdQues = $(this).closest(".itemQues").attr("data-id");
                var typeQues = dataType;



                $(".editQues").attr("data-id", IdQues);// يجب عمل طريقة للمعرفة اي عنصر سيتم تعديله
                $(".editQues").attr("data-type", typeQues);// يجب عمل طريقة للمعرفة اي عنصر سيتم تعديله

                //console.log(json);

                // $("input[name='Answer']").val(QuesInfo.correct);
                if (QuesInfo.ques.en) {
                    quesEN.val(QuesInfo.ques.en);
                    quesEN.next().addClass("active");
                }
                ;
                if (QuesInfo.ques.ar) {
                    quesAR.val(QuesInfo.ques.ar);
                    quesAR.next().addClass("active");
                }
                ;

                $.each(QuesInfo.answer, function (index, value) {

                    $(".AntwordList").append(' <li  en="' + value.en + '" ar="' + value.ar + '" class="collection-item dismissable antwordItem">\n' +
                        '                                            <div><span>' + value.en + '</span>    <p class="radioCorret">\n' +
                        '        <input class="inputAnswer" name="Answer" type="radio" id="r' + index + '" value="' + alfa[index] + '">\n' +
                        '        <label for="r' + index + '"></label>\n' +
                        '    </p> <a href="#!" class="secondary-content btnsAntw btnDeleteAnswer"><i class="mdi-action-delete "></i></a><a href="#!" class="secondary-content btnsAntw btnEditAnswer"><i class="mdi-action-settings-ethernet "></i></a></div>\n' +
                        '                                            </li>');

                });

                $('input:radio[name=Answer][value=' + QuesInfo.correct + ']').attr('checked', true);
                // QuesInfo.answer
                //
                // QuesInfo.ques.ar
                // QuesInfo.correct

            });

            //button Edit Post quesItem
            $(document).on("click", ".editQues", function () {

                var Antwords = [];
                var ques = {"ques": {"en": "", "ar": ""}, "answer": "", "correct": "", "type": "normal", "image": ""};
                var quesEN = $(".quesEN").val();
                var quesAR = $(".quesAR").val();
                var quesParent = ""
                var QuesId = $(this).attr("data-id");
                var QuesType = $(this).attr("data-type");

                // console.log(ques);

                $(".antwordItem").each(function (index) {

                    var AntwordEN = $(this).attr("en");
                    var AntwordAR = $(this).attr("ar");
                    Antwords.push({"id": alfa[index], "en": AntwordEN, "ar": AntwordAR})

                })
                ques.answer = Antwords;
                ques.ques.en = quesEN;
                ques.ques.ar = quesAR
                ques.correct = $("input[name='Answer']:checked").val();
                ques.image = "1";
                $.ajax({
                    url: "{{route('ques.postUpdate')}}",
                    type: 'post',
                    dataType: 'text',
                    data: {
                        quesID: QuesId,
                        examID: {{ $exam->id }},
                        ques: JSON.stringify(ques.ques),
                        type: QuesType,
                        answers: JSON.stringify(ques.answer),
                        correct: JSON.stringify(ques.correct),
                        image: "1",
                        json: JSON.stringify(ques)
                    },
                    success: function (data) {
                        console.log(data);
                        $("#modalQues").closeModal();

                    },
                    error: function (request, status, error) {
                        //console.log(request.responseText);
                    }
                });
                // console.log("traffic::" +typeQues);
                if (typeQues == "ruls") {
                    quesParent = $("#TrafficRules > .row > .col > .row");

                }
                else {
                    quesParent = $("#hazardRecognition > .row > .col > .row");
                }
                QuesWithAntwords.push(ques);
                var numq = quesParent.children().last().find(".NumQues").text();
                (numq == 0 || numq == null) ? numq = 0 : "";


                $(".itemQues[data-id=" + QuesId + "]").find(".jsonQuesInfo").attr("value", encodeURIComponent(JSON.stringify(ques)));


            });

            // button delete exam
            $(document).on("click", ".delete", function () {
                quesID=$(this).closest(".itemQues");
                $.ajax({
                    url: "{{route('ques.deleteQues')}}",
                    type: 'post',
                    dataType: 'text',
                    data: {
                        id:quesID.attr("data-id")
                    },
                    success: function (data) {
                        console.log(data);
                        quesID.hide("slow");


                    },
                    error: function (request, status, error) {
                        //console.log(request.responseText);
                    }
                });
            })


            {{--$('#library-drop').dmUploader({--}}
                {{--url: '{{route("upload")}}',--}}
                {{--extraData: {--}}
                    {{--_token: '{{ csrf_token() }}',--}}
                    {{--'folder': ''--}}
                {{--},--}}
                {{--onFallbackMode: function (message) {--}}
                    {{--console.log("faild");--}}
                {{--},--}}
                {{--onBeforeUpload: function (id) {--}}
                    {{--$(".progress").hide();--}}
                    {{--console.log("faild");--}}

                    {{--$('.progressbar-popup').show();--}}
                    {{--$(".progress").append('<div class="progress-bar progress-uploud" id="progressbar-' + id + '" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" ></div>');--}}
                    {{--uploadbar[id] = id;--}}
                {{--},--}}
                {{--onUploadProgress: function (id, percent) {--}}
                    {{--$('.progress-uploud').width(percent + '%');--}}

                {{--},--}}
                {{--onUploadSuccess: function (id, data) {--}}
                    {{--$(".progress").hide();--}}
                    {{--var DataJa=JSON.parse(data);--}}
                    {{--var url="{{env('STORAGE_PATH')}}/{{$_SESSION['cmsKey']}}/storage/library/" +DataJa['name']+"."+ DataJa['extension'];--}}
                    {{--console.log(DataJa);--}}

                    {{--$('#libraryModal').modal('hide');--}}
                    {{--$('#'+fileSelector).attr('value', url);--}}
                    {{--$('#'+fileSelector).closest('.form-input').find('.fileInputPreview').attr('src',url);--}}
                    {{--$('#mediaid').val(DataJa['id']);--}}


                    {{--//  console.log(url);--}}

                {{--},--}}
                {{--onUploadError: function (id, message) {--}}
                    {{--console.log("error");--}}

                    {{--$('.message-bar').append('<div class="custom-alerts alert alert-danger fade in">Error trying to upload #' + id + ': ' + message + '</div>');--}}
                {{--},--}}
                {{--onFileSizeError: function (file) {--}}
                    {{--$('.message-bar').append('<div class="custom-alerts alert alert-danger fade in">File size of ' + file.name + ' exceeds the limit</div>');--}}
                {{--},--}}
            {{--});--}}



            //  $('.modal').leanModal();
            // $("#modalQues").openModal();
            function getQuesNum() {
                var index = 1;
                $(".itemQues").each(function () {
                    index++;
                })
            }
        });
    </script>
    <script type="text/javascript" src="{{URL::asset('theme/js/dmuploader.js')}}"></script>

@endsection
