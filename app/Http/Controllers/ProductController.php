<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\View\Factory;
use Illuminate\Foundation\Application;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function viewIndex() {
        $products = Product::query()->get();

        return view('dashboard.pages.products.index', compact(
            'products'
        ));
    }

    public function viewCreate(): Factory|View|Application {
        $categories = Category::query()->get();
        
        return view('dashboard.pages.products.create', compact(
            'categories'
        ));
    }

    public function viewEdit(Product $product): Factory|View|Application {
        $categories = Category::query()->get();
        return view('dashboard.pages.products.edit', compact(
            'product',
            'categories'
        ));
    }

    public function create(ProductRequest $request): RedirectResponse {
        $data = $request->only([
            'name',
            'category_id',
            'price'
        ]);
        $product = Product::query()->create($data);
        return redirect()->route('products.viewIndex');
    }

  

    public function update(ProductRequest $request, Product $product): RedirectResponse {
        $data = $request->only([
            'name',
            'category_id',
            'price'
        ]);
        $product->update($data);
        
        return redirect()->route('products.viewIndex');
    }

    public function delete(Product $product): RedirectResponse {
        $product->delete();
        return redirect()->route('products.viewIndex');
    }
}
