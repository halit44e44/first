<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quiz_id) 
    {
        /**
         * Hem İd'si gelen quiz bilgisine jhemde o id'ye ait sorulara ulaşıyoruz.
         * with('questions') => Quiz Modelinin içerisindeki yazdığımız fonksiyonu çağırıyoru
         */
        $quiz = Quiz::whereId($quiz_id)->with('questions')->first() ?? abort(404,'Quiz veya soru bulunamadı. '); 
        if ($quiz) {
            return view('admin.question.list', compact('quiz'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return view('admin.question.create' , compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(QuestionCreateRequest $request, $quiz_id)
    {
        if ($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload = 'img/'.$fileName;
            $request->image->move(public_path('img'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Quiz::find($quiz_id)->questions()->create($request->post());
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru Başarı ile Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
