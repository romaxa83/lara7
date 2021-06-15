@extends('layouts.base', ['title' => $title])

@section('content')

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    Factory method patterns
                </h2>
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                    Порождающий шаблон
                </p>
{{--                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">--}}
{{--                    Пример реализует переключение шаблона (отображение) с bootstrap на semanticUi--}}
{{--                </p>--}}
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
@endsection


