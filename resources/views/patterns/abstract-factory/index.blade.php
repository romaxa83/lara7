@extends('layouts.base', ['title' => $title])

@section('content')

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    Abstract factory patterns
                </h2>
{{--                <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">--}}
{{--                    Take control of your team.--}}
{{--                </p>--}}
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                    Порождающий шаблон
                </p>
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                    Пример реализует переключение шаблона (отображение) с bootstrap на semanticUi
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8">
        <div class="max-w-md mx-auto">

            <ul class="divide-y divide-gray-200" x-max="1">

                @foreach($result as $item)
                    <li class="py-4">
                        <p class="block border-3 border-dashed border-gray-400 rounded bg-white h-23 w-full text-gray-400">
                            {{$item}}
                        </p>
                    </li>
                @endforeach

            </ul>

        </div>
    </div>

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">

                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Перейти на на другой шаблон
                        </h3>
                        <div class="mt-3 text-sm">
                            <a href="{{ route('patterns.abstract-factory', ['type' => $type]) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                go to {{$type}} template <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

