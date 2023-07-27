<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\View\Factory;
use Illuminate\Foundation\Application;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function viewIndex(): Factory|View|Application {
        $categories = Category::query()->get();
        return view('dashboard.pages.categories.index', compact(
            'categories'
        ));
    }

    public function viewCreate(): Factory|View|Application {
        return view('dashboard.pages.categories.create');
    }

    public function viewEdit(Category $category): Factory|View|Application {
        return view('dashboard.pages.categories.edit', compact(
            'category',
        ));
    }

    public function create(CategoryRequest $request): RedirectResponse {
        $category = Category::query()->create($request->only('name'));
        return redirect()->route('categories.viewIndex');
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse {
        $category->update($request->only('name'));
        return redirect()->route('categories.viewIndex');
    }

    public function delete(Category $category): RedirectResponse {
        $category->delete();
        return redirect()->route('categories.viewIndex');
    }
}
