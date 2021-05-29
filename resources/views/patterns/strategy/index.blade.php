@extends('layouts.base')

@section('content')

    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                        Strategy patterns
                    </h2>
                    <div class="ml-auto text-sm text-gray-500 underline">
                        <a href="https://refactoring.guru/ru/design-patterns/strategy">
                            https://refactoring.guru/ru/design-patterns/strategy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="mt-8 flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg">
                    поведенческий шаблон
                </div>
                <p>
                    пример по расчету зарплаты для сотрудников,
                    для каждой должности свой алгоритм(стратегия) рассчета
                </p>
            </div>
        </div>
    </main>

    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">

            @foreach($data ?? [] as $item)
                <li x-for="item in items">
                    <a :href="item.url" class="hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200">
                        <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-base sm:text-lg lg:text-base xl:text-lg font-medium">
                                    UserId - {{ $item['userId'] }}
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-base sm:text-lg lg:text-base xl:text-lg font-medium">
                                    Salary - {{ $item['salary'] }}
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-base sm:text-lg lg:text-base xl:text-lg font-medium">
                                    Strategy - {{ $item['strategyName'] }}
                                </p>
                            </div>
                        </dl>
                    </a>
                </li>
            @endforeach

        </ul>
    </section>


@endsection

