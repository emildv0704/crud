@extends('dashboard.layouts.app')

@section('title', 'Создать категорию')

@section('content')
    <div class="card">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('categories.viewIndex') }}" class="btn btn-success">Назад</a>
            </div>
        </div>
        <div class="card-header"><strong>Создать категорию</strong></div>
        <form class="form-horizontal" action="{{ route('categories.create_category') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 my-3">

                <div class="nav-tabs-boxed">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text" name="name"
                                    placeholder="Введите категорию">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" name="create">Сохранить и закрыть</button>
                </div>
            </div>
        </form>
    </div>
@endsection
