<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('quizzes.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group mb-3">
                    <label for="title">Quiz Açıklama</label>
                    <textarea row="4" class="form-control" name="description"></textarea>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="isFinished">
                    <label class="form-check-label" for="isFinished">
                        Bitiş Tarihi Oluşturmak İstiyor musunuz?
                    </label>
                </div>
                <div class="form-group mb-3" id="isFinish">
                    <label for="title">Bitiş Tarihi</label>
                    <input type="datetime-local" class="form-control" name="finished_at">
                </div>
                <div class="form-group mb-3 text-right">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Oluştur</button>
                </div>

            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinish').hide();
            $('#isFinished').change(function(){

                if ($('#isFinished').is(':checked')) {
                    $('#isFinish').show(500);
                }
                else{
                    $('#isFinish').hide(800);
                }
            });
            
        </script>
    </x-slot>
</x-app-layout>

