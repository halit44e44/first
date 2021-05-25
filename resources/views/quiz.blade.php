<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quiz.result', $quiz->slug) }}" method="POST">
                @csrf
                @foreach ($quiz->questions as $item)

                    <div class="mb-3">
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" style="width: 25%" class="img-responsive">
                        @endif

                        <strong>#{{ $loop->iteration }} </strong>{{ $item->question }}

                    </div>
                    @if ($item->answer1)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                id="quiz_{{ $item->id }}_1" value="answer1" required>
                            <label class="form-check-label" for="quiz_{{ $item->id }}_1">
                                {{ $item->answer1 }}
                            </label>
                        </div>
                    @endif
                    @if ($item->answer2)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                id="quiz_{{ $item->id }}_2" value="answer2" required>
                            <label class="form-check-label" for="quiz_{{ $item->id }}_2">
                                {{ $item->answer2 }}
                            </label>
                        </div>
                    @endif
                    @if ($item->answer3)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                id="quiz_{{ $item->id }}_3" value="answer3" required>
                            <label class="form-check-label" for="quiz_{{ $item->id }}_3">
                                {{ $item->answer3 }}
                            </label>
                        </div>
                    @endif
                    @if ($item->answer4)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                id="quiz_{{ $item->id }}_4" value="answer4" required>
                            <label class="form-check-label" for="quiz_{{ $item->id }}_4">
                                {{ $item->answer4 }}
                            </label>
                        </div>
                    @endif
                    @if ($item->answer5)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                id="quiz_{{ $item->id }}_5" value="answer5" required>
                            <label class="form-check-label" for="quiz_{{ $item->id }}_5">
                                {{ $item->answer5 }}
                            </label>
                        </div>
                    @endif
                        <hr>
                @endforeach
                <input type="submit" class="btn btn-success" value="Sınavı Sonlandır">
            </form>
        </div>
    </div>

</x-app-layout>
