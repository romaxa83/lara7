<?php

namespace App\Http\Controllers\Site\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Tailwind\Category;
use App\Models\Tailwind\Component;
use App\Repositories\Tailwind\CategoryRepository;

class TailwindController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $title = 'Tailwind components';

        $categories = $this->categoryRepository->getAll();

        return view('site.tailwinds.index', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function componentList($slug)
    {
        $title = 'Tailwind components';

        $categories = $this->categoryRepository->getAllWithCount(['components']);
        $model = $this->categoryRepository->getOneBy('slug', $slug, ['components']);

        return view('site.tailwinds.index', [
            'title' => $title,
            'model' => $model,
            'categories' => $categories,
        ]);
    }
}
