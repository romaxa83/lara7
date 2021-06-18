<?php

namespace App\Console\Commands;

use App\Repositories\Tailwind\CategoryRepository;
use App\Services\Tailwind\CategoryService;
use App\Services\Tailwind\ComponentService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Finder\Finder;

class ParseFile extends Command
{
    protected $signature = 'parse:file';

    protected $description = 'Parse file';

    private CategoryService $categoryService;
    private CategoryRepository $categoryRepository;
    private ComponentService $componentService;


    public function __construct(
        CategoryService $categoryService,
        CategoryRepository $categoryRepository,
        ComponentService  $componentService
    )
    {
        parent::__construct();

        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->componentService = $componentService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::table('tailwind_categories')->truncate();
        \DB::table('tailwind_components')->truncate();

        $this->info('Run parse process');
        $progressBar = new ProgressBar($this->output);
        $progressBar->setFormat('verbose');
        $progressBar->start();


        $path = base_path() . '/data/components';

        $finder = new Finder();
        $finder->in($path)
//            ->exclude('storage')
//            ->exclude('vendor')
            ->name('*.html')
//            ->name('*.twig')
//            ->name('*.vue')
            ->files();


        /** @var \Symfony\Component\Finder\SplFileInfo $file */
        foreach ($finder as $k => $file) {
            $this->createCategory($file->getRelativePath());
            $name = last(explode('/', $file->getRelativePath()));
            $category = $this->categoryRepository->getOneBy('name', $name);

            if($category){
                $name = $this->prettyName($file->getBasename());

                if($name !== 'index'){
                    $temp['category_id'] = $category->id;

                    $code = substr($file->getContents(), strpos($file->getContents(), '<body>')+6);
                    $code = substr($code, 0, strpos($code, '</body>'));

                    $temp['code'] = $code;
                    $temp['desc'] = $this->prettyName($file->getBasename());
                    $temp['name'] = $this->prettyName($file->getBasename());

                    $this->componentService->create($temp);

                    $progressBar->advance();
                }
            }
        }

        $progressBar->finish();
        echo PHP_EOL;
    }

    public function prettyName(string $str): string
    {
        return  trim(str_replace('_', ' ', str_replace('.html', ' ', $str)));
    }

    public function createCategory($path)
    {
        $ids = [];
        foreach (explode('/', $path) as $item){
            if($model = $this->categoryRepository->getOneBy('name', $item)){
                array_push($ids, $model->id);
            } else {

                $parent = last($ids);
                $temp['name'] = $item;
                $temp['parent_id'] = false !== $parent ? $parent : null;
                $model = $this->categoryService->create($temp);
                array_push($ids, $model->id);
            }
        }

    }
}
