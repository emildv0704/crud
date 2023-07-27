@extends('dashboard.layouts.app')

@section('title', 'Редактировать товара ' . $product->name)

@section('content')
    <div class="card">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('products.viewIndex') }}" class="btn btn-success">Назад</a>
            </div>
        </div>
        <form class="form-horizontal" action="{{ route('products.update', $product) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12 mb-3">
                <div class="nav-tabs-boxed">
                <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input
                                    class="form-control @error('name') is-invalid @enderror"
                                    type="text" name="name" value="{{ old('name') ?? $product->name }}"
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
                                        <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
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
                                       type="text" name="price" value="{{ old('price') ?? $product->price }}"
                                       placeholder="Введите цену товара">
                                @error('price')
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
