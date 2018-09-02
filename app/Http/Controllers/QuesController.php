<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam as Exam;
use App\question as Question;


class quesController extends Controller
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeQues(Request $request)
    {
        $files = $request->get('');

        $examID = $request->get('examID');
        $json=  $request->get('json');
        $ques = $request->get('ques');
        $type = $request->get('type');
        $answersQues = $request->get('answers');
        $correctQues = $request->get('correct');
        $imageQues = $request->get('image');


        $Question = new Question();
        $Question->exams_id = 1;
        $Question->ques = $ques;
        $Question->type = $type;
        $Question->answers = $answersQues;
        $Question->correct = $correctQues;
        $Question->image = $imageQues;
        $Question->json = $json;

        $Question->save();

        return $Question->id;
        //
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateQues(Request $request)
    {
        $QuesID=$request->get('quesID');
        $examID = $request->get('examID');
        $json=  $request->get('json');
        $ques = $request->get('ques');
        $type = $request->get('type');
        $answersQues = $request->get('answers');
        $correctQues = $request->get('correct');
        $imageQues = $request->get('image');


        $Question = Question::find($QuesID);
        $Question->exams_id = 1;
        $Question->ques = $ques;
        $Question->type = $type;
        $Question->answers = $answersQues;
        $Question->correct = $correctQues;
        $Question->image = $imageQues;
        $Question->json = $json;
        $Question->save();

        return $Question;
        //
    }
    public function deleteQues(Request $request)
    {
        $quesID=$request->id;
        Question::find($quesID)->delete();
        return $quesID;
    }

    public function postUpload(Request $request)
    {

        $size = Input::file('file')->getSize();

        if(Self::checkSize($size)){
            return "library full";
            die();
        }

        $whitelist = ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "jp2", "j2k", "jpf", "jpx", "jpm", "mj2", "jxr", "hdp", "wdp", "webp", "gif", "png", "apng", "tiff", "tif", "svg", "svgz", "xbm", "bmp", "dib", "mp4", "m4a", "m4p", "m4b", "m4r", "m4v", "webm", "ogv", "oga", "ogx", "ogg", "pdf", "mp3"];

        $img_ext = ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "jp2", "j2k", "jpf", "jpx", "jpm", "mj2", "jxr", "hdp", "wdp", "webp", "gif", "png", "apng", "tiff", "tif", "svg", "svgz", "xbm", "bmp", "dib"];
        $mp4_ext = ["mp4", "m4a", "m4p", "m4b", "m4r", "m4v"];
        $webm_ext = ["webm"];
        $ogg_ext = ["ogv", "oga", "ogx", "ogg"];

        $path = 'library/'; //folder name where it should be stored
        $name = $name_old = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', str_replace('.' . Input::file('file')->getClientOriginalExtension(), '', $name_old = Input::file('file')->getClientOriginalName())));
        $extension = Input::file('file')->getClientOriginalExtension();
        $duration = 0;

        if(in_array(strtolower($extension), $whitelist)){

            //check if the file exist or not, otherwise add a number to the document until it dont exist.
            if(Storage::has($path . $name . '.' . $extension)){
                $teller = 0;
                while (true) { //loop if exist
                    if(Storage::has($path . $name . '.' . $extension)){
                        $name = $teller . '-' . $name_old;
                        $teller++;
                    } else {
                        break;
                    }
                }
            }

            Input::file('file')->move(public_path('storage/').$path, $name.'.'.$extension);
            if (in_array(strtolower($extension), $img_ext)) {
                //generate thumbnail
                $img = Image::make(Storage::get($path.$name.'.'.$extension));

                $img->resize(200, 150, function($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->resizeCanvas(200, 150, 'center', false, "#ffffff");

                Storage::put('thumbnail/'.$path.$name.'.'.$extension, $img->stream());
            }
//            else if (in_array(strtolower($extension), $mp4_ext) OR in_array(strtolower($extension), $webm_ext) OR in_array(strtolower($extension), $ogg_ext)) {
//                $in = public_path('storage/').$path.$name.'.'.$extension;
//                $out = public_path('storage/thumbnail/').$path.$name.'.jpg';
//
//                $ffprobe = \FFMpeg\FFProbe::create();
//                $duration = $ffprobe->format($in)->get('duration'); // get duration of video.
//
//                $ffmpeg = \FFMpeg\FFMpeg::create();
//                $video = $ffmpeg->open($in);
//
//                //create thumbnail and save it.
//                $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($duration / 4));
//                $frame->save($out);
//
//                exec(env('FFMPEG_PATH')." -itsoffset -4  -i ".$in." -vcodec mjpeg -vframes 90 -an -f rawvideo -s 200x150 ".$out." 2>&1", $output, $return_var);
//            }

            //set file into library
            $library = New Library;
            $library->name = $name;
            $library->name_shown = $name;
            $library->extension = $extension;
            $library->size = $size;
            $library->duration = $duration;

            if (in_array(strtolower($extension), $img_ext)) {
                $library->thumbnail = 'thumbnail/'.$path.$name.'.'.$extension;
            }
            else if (in_array(strtolower($extension), $mp4_ext) OR in_array(strtolower($extension), $webm_ext) OR in_array(strtolower($extension), $ogg_ext)) {
                $library->thumbnail = 'thumbnail/'.$path.$name.'.jpg';
            }
            $library->owner_id = Auth::id();
            $library->save();

            return $library->toJson();
        }

        return "whitelist error";

    }

}
