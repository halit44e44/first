<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            @if ($quiz->finished_at)
                                <li title="{{ $quiz->finished_at }}" class="list-group-item">Son Katılım Tarihi -
                                    {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }}</li>
                            @endif
                            <li class="list-group-item">Soru Sayısı - {{ $quiz->questions_count }}</li>
                            <li class="list-group-item">Katılımcı Sayısı</li>
                            <li class="list-group-item">Ortalama Puan</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                </div>
            </div>


            </p>

        </div>
        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block btn-sm">Quize Katıl</a>
    </div>
</x-app-layout>
