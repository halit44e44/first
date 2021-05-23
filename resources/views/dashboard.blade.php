<x-app-layout>
    <x-slot name="header">Ana Sayfa</x-slot>

    <div class="alert alert-danger text-center">Uyarı Mesajı</div>
    <div class="row">
        <div class="col-md-9">
            <div class="list-group">
                @foreach ($quizzes as $item)
                    <a href="{{ route('quiz.detail', $item->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start"> <!-- active class -->
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $item->title }}</h5>
                            <small>{{ $item->finished_at ? $item->finished_at->diffForHumans().' bitiyor' : null }}</small>
                        </div>
                        <p class="mb-1">{{ Str::limit($item->description,100) }}</p>
                        <small>{{ $item->questions_count }} Soru</small>
                    </a>
                @endforeach
                <div class="mt-3">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            REİS
        </div>
    </div>




</x-app-layout>
