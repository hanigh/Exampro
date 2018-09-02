<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\exam as Exam;
use App\question as Question;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('exam.index');

    }

    public function listExam()
    {
        $exams = Exam::all();

        $data["exams"] = $exams;

        return view('exam.admin.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addExam($id)
    {

        $exam = Exam::find($id);

        $questionsRuls = Question::where("exams_id", $id)->where("type","ruls");
        $questionsHazar = Question::where("exams_id", $id)->where("type","normal");


        $data['qRuls'] = $questionsRuls->get();

        $data['qHazar'] = $questionsHazar->get();
        $data['exam'] = $exam;
        return view('exam.admin.add', $data);
    }

    public function addNewExamID()
    {
        //
        $allExams = Exam::count();

        $exam = new Exam();

        $exam->name = "New Exam" . $allExams;
        $exam->info = "Here information about this Question";
        $exam->save();
        return redirect()->route('exam.add', ['id' => $exam->id]);
    }
    public function changeExamName(Request $request)
    {
        $exam= Exam::find($request->get("id"));

        $exam->name= $request->get("name");

        $exam->save();
        return 1;

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function UserlistExam()
    {
        $exams=Exam::all();
        $data["exams"] =$exams;

        return view("exam.list",$data);
        //عرض جميع الامتحانات للطالب
    }
    public function UserStartExam($id)
    {
        $jsonQues[]="";
        $exam=Exam::find($id);
        $quesNor = Question::where('exams_id',$id)->where("type","normal")->get();
        $quesRul=  Question::where('exams_id',$id)->where("type","ruls")->get();


        $data["quesNormal"] = $quesNor;
        $data["quesNormalCount"]=count($quesNor);
        $data["quesRuls"]=$quesRul;
        $data["quesRulsCount"]=count($quesRul);



        return view("exam.index",$data);
        //عرض  الامتحان للتقديم على حسب رقم الامتحان
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
