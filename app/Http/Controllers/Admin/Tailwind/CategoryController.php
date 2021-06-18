<?php

namespace App\Http\Controllers\Admin\Tailwind;

use App\Http\Requests\Tailwind;
use App\Http\Controllers\Controller;
use App\Models\Tailwind\Category;
use App\Services\Tailwind\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $title = 'Tailwind category';

        $categories = Category::query()->paginate();

        return view('admin.tailwind.category.index', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $title = 'Tailwind category create';

        $categories = Category::all()->pluck('name', 'id')->toArray();

        return view('admin.tailwind.category.create', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function store(Tailwind\CategoryCreate $request)
    {
        try {
            $this->service->create($request->all());

            return redirect()->route('tailwind.category.index')
                ->with('success', 'User create');

        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
