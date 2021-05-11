<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>


    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('quizzes.update' , $quiz->id) }}">
                @method('PUT') <!-- güncelleme işlemi -->
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" class="form-control" name="title" value="{{ $quiz->title }}">
                </div>
                <div class="form-group mb-3">
                    <label for="title">Quiz Açıklama</label>
                    <textarea row="4" class="form-control" name="description">{{ $quiz->description }}</textarea>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="isFinished" @if ($quiz->finished_at) checked @endif>
                    <label class="form-check-label" for="isFinished">
                        Bitiş Tarihi Oluşturmak İstiyor musunuz?
                    </label>
                </div>
                <div class="form-group mb-3" id="isFinish" @if (!$quiz->finished_at) style="display: none;" @endif>
                    <label for="title">Bitiş Tarihi</label>
                    <input type="datetime-local" class="form-control" name="finished_at"
                       @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i' , strtotime($quiz->finished_at)) }}" @endif>
                </div>
                <div class="form-group mb-3 text-right">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Güncelle</button>
                </div> 

            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function() {
                if ($('#isFinished').is(':checked')) {
                    $('#isFinish').show(500);
                } else {
                    $('#isFinish').hide(800);
                }
            });

        </script>
    </x-slot>
</x-app-layout>
