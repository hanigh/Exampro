@extends('layout')

@section('content')

    <h4 class="header">List exams</h4>
    <p class="caption">Includes predefined classes for easy layout options.</p>

    <div class="divider"></div>

    <a href="{{route('exam.newidQues')}}" class="aanpas modal-trigger btn-floating btn-move-up waves-effect waves-light darken-2 right plus_add "><i
                class="mdi-content-add activator"></i></a>
    <!--Basic Form-->
    <p></p>
    <div id="basic-form" class="section">

        <div class="row">
            @foreach($exams as $exam)

            <div class="col s12 m12 l6">

                    <div class="card-panel panelExam">
                        <div class="row">
                            <div class="col s3 m2 l2">
                                <div class="exLeft">
                                    <i class="mdi-action-question-answer"></i>
                                </div>
                            </div>
                            <div class="col s5 m8 l8">
                                <h4 class="header2">Basic Form</h4>
                                <div class="row">
                                </div>
                            </div>
                            <div class="col s4 m2 l2">
                                <a href="{{route("exam.add",$exam->id)}}"><i class="editExam btnex mdi-editor-border-color"></i></a>
                                <i class="deleteExam btnex mdi-action-delete"></i>
                            </div>
                        </div>
                    </div>
            </div>
                    @endforeach

        </div>
    </div>
@endsection
