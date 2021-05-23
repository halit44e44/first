<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with tüm soruları JSON olarak getiriyor. withCount Kaç soru olduğunu gösteriyor.
        $quizzes = Quiz::withCount('questions');

        if (request()->get('title')) {
            $quizzes = $quizzes->where('title','LIKE',"%".request()->get('title')."%");
        }
        if (request()->get('status')) {
            $quizzes = $quizzes->where('status',request()->get('status'));
        }
        $quizzes = $quizzes->paginate(5);
        return view('admin.quiz.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        if ($_REQUEST) {
            Quiz::create($request->post());
            return redirect()->route('quizzes.index')->withSuccess('Quiz Başarı ile Oluşturuldu');
        }
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
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404, 'Quiz Bulunamadı');
        if ($quiz) {
            return view('admin.quiz.edit', compact('quiz'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        if (isset($request, $id)) {
            /**
             * Burada except diyerek => kayıt esanasında post ile gelen _method ve _token bilgilerini kayıt etmiyoruz. Çünkü DB'de ilgili alanlar bulunmuyor.
             */
            $query = $request->except('_token' , '_method');
            $query['slug'] = Str::slug($query['title']);
            Quiz::where('id', $id)->update($query);
            return redirect()->route('quizzes.index')->withSuccess('Quiz Başarılı bir şekilde güncellendi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        if (isset($id)) {
            Quiz::find($id)->delete();
            return redirect()->route('quizzes.index')->withSuccess('Quiz Başarılı Bir Şekilde Silindi');
        }
    }
}
