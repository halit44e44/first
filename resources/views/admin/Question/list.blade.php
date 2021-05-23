<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Quizine ait sorular</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-right mb-3">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Geri</a>
                <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                    Yeni Soru</a>
            </h5>

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Soru</th>
                        <th scope="col">Fotoğraf</th>
                        <th scope="col">1. Cevap</th>
                        <th scope="col">2. Cevap</th>
                        <th scope="col">3. Cevap</th>
                        <th scope="col">4. Cevap</th>
                        <th scope="col">5. Cevap</th>
                        <th scope="col">Cevap</th>
                        <th scope="col" style="width: 80px;">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $item)
                        <tr>
                            <td>{{ $item->question }}</th>
                            <td>
                                @if ($item->image)
                                    <a href="{{ asset($item->image) }}" class="btn btn-light btn-sm"
                                        target="_blank">Görüntüle</a>
                                @endif
                            </td>
                            <td>{{ $item->answer1 }}</td>
                            <td>{{ $item->answer2 }}</td>
                            <td>{{ $item->answer3 }}</td>
                            <td>{{ $item->answer4 }}</td>
                            <td>{{ $item->answer5 }}</td>
                            <td class="text-success">
                                {{ substr($item->correct_answer, -1) }}.Cevap
                            </td>
                            <td class="text-center">
                                <a href="{{ route('questions.edit', [$item->quiz_id, $item->id]) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                <a href="{{ route('questions.destroy', [$item->quiz_id, $item->id]) }}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
