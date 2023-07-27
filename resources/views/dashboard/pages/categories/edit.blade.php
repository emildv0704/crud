@extends('dashboard.layouts.app')

@section('title', 'Редактировать категорию ' . $category->name)

@section('content')
    <div class="card">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('categories.viewIndex') }}" class="btn btn-success">Назад</a>
            </div>
        </div>
        <form class="form-horizontal" action="{{ route('categories.update', $category) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12 mb-3">
                <div class="nav-tabs-boxed">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text" name="name" value="{{ old('name') ?? $category->name }}"
                                    placeholder="Введите категорию">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit"> Сохранить и закрыть</button>
                    <button type="submit" class="btn btn-success" name="save_edit">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
