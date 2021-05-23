<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right mb-3">
                <a href="{{ route('quizzes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Yeni
                    Quiz</a>
            </h5>
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Quiz Adı" value="{{ request()->get('title') }}" name="title"
                            class="form-control">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">Durum Seçiniz</option>
                            <option @if (request()->get('status') == 'publish') selected @endif value="publish">Aktif</option>
                            <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                            <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-2">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Soru Sayısı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $item)
                        <tr>
                            <td>{{ $item->title }}</th>
                            <td>{{ $item->questions_count }}</th>
                            <td>
                                @switch($item->status)
                                    @case('publish')
                                        <i class="btn btn-outline-success btn-sm d-flex justify-content-center">Aktif</i>
                                    @break
                                    @case('draft')
                                        <i class="btn btn-outline-warning btn-sm d-flex justify-content-center">Taslak</i>
                                    @break
                                    @case('passive')
                                        <i class="btn btn-outline-danger btn-sm d-flex justify-content-center">Pasif</i>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <span
                                    title="{{ $item->finished_at }}">{{ $item->finished_at ? $item->finished_at->diffForHumans() : null }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('questions.index', $item->id) }}" placeholder="Soru Ekle"
                                    class="btn btn-success btn-sm"><i class="fa fa-question"></i></a>
                                <a href="{{ route('quizzes.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy', $item->id) }}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
            <!-- Sayfa Altında Sayılar. -->

        </div>
    </div>
</x-app-layout>
