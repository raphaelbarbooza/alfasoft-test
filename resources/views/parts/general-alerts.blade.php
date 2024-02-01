<script>
    document.addEventListener("DOMContentLoaded", function(){

        @if(\Illuminate\Support\Facades\Session::has('generalSuccess'))
        alertSuccess("{{\Illuminate\Support\Facades\Session::pull('generalSuccess')}}");
        @endif
        @if(\Illuminate\Support\Facades\Session::has('generalDanger'))
        alertDanger("{{\Illuminate\Support\Facades\Session::pull('generalDanger')}}");
        @endif
        @if(\Illuminate\Support\Facades\Session::has('generalWarning'))
        alertWarning("{{\Illuminate\Support\Facades\Session::pull('generalWarning')}}");
        @endif

    });
</script>
