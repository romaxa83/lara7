@extends('layouts.admin')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <div class="container-fluid">

            <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                            {{ $title }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>

    </section>
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('admin.component.store') }}">
            @csrf

            <div class="row">

                <div class="form-group">
                    <label for="name" class="col-form-label">Name</label>
                    <input id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="position" class="col-form-label">Position</label>
                    <input
                        id="position"
                        name="position"
                        class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
                        value="{{ old('position') }}"
                        required
                        type="number"
                    >
                    @if ($errors->has('position'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('position') }}</strong></span>
                    @endif
                </div>


                <div class="form-group">
                    <label>Parent</label>
                    <select class="select2" name="parent_id" data-placeholder="Select a parent" style="width: 100%;">
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>

    </section>

@endsection

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="space-y-6">

                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Use a permanent address where you can receive mail.
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="POST" action="{{ route('tailwind.component.store') }}">
                                @csrf
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                        <input type="number" name="position" id="position" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                                        <div class="mt-1">
                                            <textarea id="code" name="code" rows="10"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                placeholder="your some code">
                                            </textarea>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Brief description for your profile. URLs are hyperlinked.
                                        </p>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category_id" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($categories as $id => $item)
                                                <option value="{{$id}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </button>
                                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--@endsection--}}
