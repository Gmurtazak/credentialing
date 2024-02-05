{{--ALERT--}}
<div class="page-body alert-body mb-0 mt-0" style="min-height: auto;">
    <div class="container-fluid">
        <div class="row">
            @if (\Session::has('error'))
                <div class="alert mt-4 font-size-14 alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {!! \Session::get('error') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert mt-4 font-size-14 alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {!! \Session::get('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

</div>


{{--ALERT--}}
