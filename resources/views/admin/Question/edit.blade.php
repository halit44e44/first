<x-app-layout>
    <x-slot name="header">{{ $question->question }} Düzenle</x-slot>


    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Soru</label>
                    <textarea row="4" class="form-control" name="question">{{ $question->question }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-2">
                            @if ($question->image)
                                <a href="{{ asset($question->image) }}" target="_blank">
                                    <img src="{{ asset($question->image) }}" style="width: 200px; height: 100%;">
                                </a>
                                @else
                                <p class="alert alert-danger">Soruya ait bir resim bulunamadı.</p>
                            @endif
                        </div>
                        <div class="col-md-10 text-center">
                            <label for="title">Fotograf</label>
                            <input type="file" name="image" class="form-comtrol"
                                value="{{ asset('img/' . $question->image) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer1">Cevap 1</label>
                            <textarea row="2" class="form-control" name="answer1">{{ $question->answer1 }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="answer2">Cevap 2</label>
                            <textarea row="2" class="form-control" name="answer2">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer3">Cevap 3</label>
                            <textarea row="2" class="form-control" name="answer3">{{ $question->answer3 }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="answer4">Cevap 4</label>
                            <textarea row="2" class="form-control" name="answer4">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group mb-3">
                            <label for="answer5">Cevap 5</label>
                            <textarea row="2" class="form-control" name="answer5">{{ $question->answer5 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="correct_answer">Doğru Cevap</label>
                    <select name="correct_answer" class="form-control">
                        <option @if ($question->correct_answer === 'answer1') selected @endif value="answer1">Cevap 1</option>
                        <option @if ($question->correct_answer === 'answer2') selected @endif value="answer2">Cevap 2</option>
                        <option @if ($question->correct_answer === 'answer3') selected @endif value="answer3">Cevap 3</option>
                        <option @if ($question->correct_answer === 'answer4') selected @endif value="answer4">Cevap 4</option>
                        <option @if ($question->correct_answer === 'answer5') selected @endif value="answer5">Cevap 5</option>
                    </select>
                </div>
                <div class="form-group mb-3 text-right">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Soruyu Güncelle</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
