<?php

namespace App\Http\Controllers\Admin\Tailwind;

use App\Http\Requests\Tailwind;
use App\Http\Controllers\Controller;
use App\Repositories\Tailwind\CategoryRepository;
use App\Repositories\Tailwind\ComponentRepository;
use App\Services\Tailwind\ComponentService;

class TemplateController extends Controller
{
    private ComponentService $service;
    private CategoryRepository $categoryRepository;
    private ComponentRepository $componentRepository;

    public function __construct(
        ComponentService $service,
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
        $title = 'Tailwind template';

        $models = $this->componentRepository->getAllQuery(['category'], 'id', 'desc')->paginate();

        return view('admin.tailwind.template.index', [
            'title' => $title,
            'models' => $models,
        ]);
    }

    public function create()
    {
        $title = 'Tailwind template create';

        $categories = $this->categoryRepository->getForSelect('name');

        return view('admin.tailwind.template.create', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function store(Tailwind\TemplateCreate $request)
    {
        try {
            $this->service->create($request->all());

            return redirect()->route('admin.template.index')
                ->with('success', 'Template create');

        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        $title = 'Tailwind template edit';

        $model = $this->componentRepository->getOneBy('id', $id);

        return view('admin.tailwind.template.edit', [
            'title' => $title,
            'model' => $model,
            'categories' =>$this->categoryRepository->getForSelect('name'),
        ]);
    }

    public function update(Tailwind\TemplateEdit $request, $id)
    {
        try {
            $model = $this->service->edit(
                $request->all(),
                $this->componentRepository->getOneBy('id', $id)
            );

            return redirect()->route('admin.template.edit', ['id' => $model->id])
                ->with('success', 'Template edit');

        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $model = $this->componentRepository->getOneBy('id', $id);
            $model->forceDelete();

            return redirect()->route('admin.template.index')
                ->with('success', 'Template delete');

        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
