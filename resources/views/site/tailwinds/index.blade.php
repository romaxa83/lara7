@extends('layouts.base', ['title' => $title])

@section('content')

    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
    </header>
    <div style="min-height: 640px;" class="bg-gray-100">

        <div x-data="{ open: false }"  class="h-screen flex bg-gray-100">

            <!-- Static sidebar for desktop -->
            <div class="hidden bg-indigo-700 md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64">
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="flex flex-col h-0 flex-1">
                        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">

                            <nav class="mt-5 flex-1 px-2 space-y-1">
                                @foreach($categories as $category)
                                    <a href="{{ route('site.tailwind.components.list', ['slug' => $category->slug]) }}"
                                        class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        {{ $category->name }} ( {{ $category->components_count }} )
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-0 flex-1 overflow">

                @if(isset($model))
                    <main>
                        <div class="py-4 sm:py-12">
                            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                                <h2 class="text-2xl leading-8 font-semibold font-display text-gray-900 sm:text-3xl sm:leading-9">
                                    {{ $model->name }}
                                </h2>
                            </div>

                            <div class="mt-6 bg-white max-w-8xl mx-auto sm:px-6 lg:px-8">
                                <div class="max-w-8xl mx-auto">

                                    @foreach($model->components as $item)
                                        <p>{{$item->name}}</p>
                                        <div id="component-{{$item->id}}"
                                             x-data="{ activeTab: 'preview' }"
                                             class="border-b border-t border-gray-200 sm:border sm:rounded-lg overflow-hidden mb-16">

                                            {!! $item->code !!}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </main>

                @endif

            </div>
        </div>

    </div>
@endsection
