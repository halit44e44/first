<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-right mb-3">
                <a href="{{ route('quizzes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Yeni
                    Quiz</a>
            </h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $item)
                        <tr>
                            <td>{{ $item->title }}</th>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->finished_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('quizzes.edit' , $item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy' ,$item->id) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->links() }} <!-- Sayfa Altında Sayılar. -->

        </div>
    </div>
</x-app-layout>
