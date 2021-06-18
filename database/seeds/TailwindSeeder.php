<?php

use App\Services\Tailwind\CategoryService;
use App\Services\Tailwind\ComponentService;
use Illuminate\Database\Seeder;

class TailwindSeeder extends Seeder
{
    private CategoryService $categoryService;
    private ComponentService $componentService;

    public function __construct(
        CategoryService $categoryService,
        ComponentService $componentService)
    {
        $this->categoryService = $categoryService;
        $this->componentService = $componentService;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('tailwind_categories')->truncate();
        \DB::table('tailwind_components')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = $this->data();

        try {
            \DB::transaction(function () use ($data) {
                foreach ($data as $item){
                    $this->categoryService->create($item);

                    foreach ($item['components'] ?? [] as $i){
                        $i['category_id'] = $item['position'];
                        $this->componentService->create($i);
                    }
                }
            });
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    protected function data(): array
    {
        return [
            [
                'name' => 'Application-UI',
                'position' => 1,
            ],
            [
                'name' => 'forms',
                'position' => 2,
                'parent_id' => 1,
            ],
            [
                'name' => 'input-groups',
                'position' => 3,
                'parent_id' => 2,
                'components' => [
                    [
                        'name' => 'input-1',
                        'position' => 1,
                        'code' => '<div class="p-8 flex items-center justify-center bg-white">
    <div class="w-full max-w-xs mx-auto">
        <div>
            <label for="company_website" class="block text-sm font-medium text-gray-700">
                Company Website
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    http://
                </span>
                <input type="text" name="company_website" id="company_website" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" placeholder="www.example.com">
            </div>
        </div>
    </div>
  </div>',
                    ],
                    [
                        'name' => 'input-2',
                        'position' => 2,
                        'code' => '<div class="p-8 flex items-center justify-center bg-white">
    <div class="w-full max-w-xs mx-auto">
        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center">
                    <label for="country" class="sr-only">Country</label>
                    <select id="country" name="country" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option>US</option>
                        <option>CA</option>
                        <option>EU</option>
                    </select>
                </div>
                <input type="text" name="phone_number" id="phone_number" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-16 sm:text-sm border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
            </div>
        </div>
    </div>
  </div>',
                    ],
                ]
            ],
        ];
    }
}
