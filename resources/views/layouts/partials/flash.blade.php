@if (session('status'))
    <div class="swalDefaultSuccess">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="swalDefaultSuccess">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="swalDefaultWarning">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="swalDefaultInfo">
        {{ session('info') }}
    </div>
@endif


{{--<div class="card card-success card-outline">--}}
{{--<div class="card-header">--}}
{{--<h3 class="card-title">--}}
{{--<i class="fas fa-edit"></i>--}}
{{--SweetAlert2 Examples--}}
{{--</h3>--}}
{{--</div>--}}
{{--<div class="card-body">--}}
{{--<button type="button" class="btn btn-success swalDefaultSuccess">--}}
{{--Launch Success Toast--}}
{{--</button>--}}
{{--<button type="button" class="btn btn-info swalDefaultInfo">--}}
{{--Launch Info Toast--}}
{{--</button>--}}
{{--<button type="button" class="btn btn-danger swalDefaultError">--}}
{{--Launch Error Toast--}}
{{--</button>--}}
{{--<button type="button" class="btn btn-warning swalDefaultWarning">--}}
{{--Launch Warning Toast--}}
{{--</button>--}}
{{--<button type="button" class="btn btn-default swalDefaultQuestion">--}}
{{--Launch Question Toast--}}
{{--</button>--}}
{{--<div class="text-muted mt-3">--}}
{{--For more examples look at <a href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- /.card -->--}}
{{--</div>--}}
