<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Quizine ait s orular</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-right mb-3">
                <a href="{{ route('questions.create',$quiz->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Yeni Soru</a>
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
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->answer1 }}</td>
                            <td>{{ $item->answer2 }}</td>
                            <td>{{ $item->answer3 }}</td>
                            <td>{{ $item->answer4 }}</td>
                            <td>{{ $item->answer5 }}</td>
                            <td class="text-success">
                                {{ substr($item->correct_answer,-1) }}.Cevap
                            </td>
                            <td class="text-center">
                                <a href="{{ route('quizzes.edit' , $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy' ,$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
