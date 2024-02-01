<div class="row d-flex justify-content-center mt-2">
    <div class="col-lg-3">

        @if(\Illuminate\Support\Facades\Session::has('generalSuccess'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check me-2"></i>
                {{\Illuminate\Support\Facades\Session::pull('generalSuccess')}}
            </div>
        @endif

        @if(\Illuminate\Support\Facades\Session::has('generalDanger'))
            <div class="alert alert-danger">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                {{\Illuminate\Support\Facades\Session::pull('generalDanger')}}
            </div>
        @endif

    </div>
</div>
