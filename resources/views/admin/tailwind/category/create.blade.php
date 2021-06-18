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
        <form method="POST" action="{{ route('tailwind.category.store') }}">
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
