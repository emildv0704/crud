@extends('dashboard.layouts.app')

@section('title', 'Список товаров')

@section('content')
    <div class="card">
        <div class="card-header"><strong>Товары</strong></div>
        <div class="card-body">
            <a href="{{ route('products.viewCreate') }}" class="btn btn-success">Создать</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table id="services_table" class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th class="text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr @if($loop->last) style="border: none" @endif>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="d-flex justify-content-center flex-wrap">
                                <a href="{{ route('products.viewEdit', $product) }}"
                                   class="btn btn-warning mx-3 mb-1" style="float: left">
                                    Редактировать
                                </a>
                                <form action="{{ route('products.delete', $product) }}" method="post"
                                      class="mb-1">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Вы уверены?')">Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
