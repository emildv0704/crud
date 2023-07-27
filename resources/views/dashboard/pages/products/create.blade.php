@extends('dashboard.layouts.app')

@section('title', 'Создать товар')

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#select_categories').select2();
        });
    </script>
@endpush

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
    <div class="card">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('products.viewIndex') }}" class="btn btn-success">Назад</a>
            </div>
        </div>
        <div class="card-header"><strong>Создать товар</strong></div>
        <form class="form-horizontal" action="{{ route('products.create_product') }}" method="POST"
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
                                    placeholder="Введите название товара">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="select_categories">Выберите категорию</label>
                                <select id="select_categories"
                                        class="form-control @error('category_id') is-invalid @enderror"
                                        type="text" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Цена:</label>
                                <input id="price"
                                       class="form-control @error('price') is-invalid @enderror"
                                       type="text" name="price" value="{{ old('price') }}"
                                       placeholder="Введите цену товара">
                                @error('price')
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
