<?php

namespace App\Http\Controllers\Admin\Tailwind;

use App\Http\Requests\Tailwind;
use App\Http\Controllers\Controller;
use App\Repositories\Tailwind\CategoryRepository;
use App\Repositories\Tailwind\ComponentRepository;
use App\Services\Tailwind\CategoryService;

class ComponentController extends Controller
{
    private CategoryService $service;
    private CategoryRepository $categoryRepository;
    private ComponentRepository $componentRepository;

    public function __construct(
        CategoryService $service,
        CategoryRepository $categoryRepository,
        ComponentRepository $componentRepository
    )
    {
        $this->service = $service;
        $this->categoryRepository = $categoryRepository;
        $this->componentRepository = $componentRepository;
    }

    public function index()
    {
        $title = 'Tailwind component';

        $components = $this->componentRepository->getAllQuery()->paginate();

        return view('admin.tailwind.component.index', [
            'title' => $title,
            'components' => $components,
        ]);
    }

    public function create()
    {
        $title = 'Tailwind component create';

        $categories = $this->categoryRepository->getForSelect('name');

        return view('admin.tailwind.component.create', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function store(Tailwind\ComponentCreate $request)
    {
        dd($request->all());

        try {
            $this->service->create($request->all());

            return redirect()->route('tailwind.category.index')
                ->with('success', 'User create');

        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}

