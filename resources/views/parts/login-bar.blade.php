
@push('scripts')
    @if(\Illuminate\Support\Facades\Session::has('authError'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById('login-button').click();
            });
        </script>
    @endif
@endpush


<div class="d-flex justify-content-end align-items-center px-1 px-md-5">

    @guest

        Hello&nbsp;<b>Guest</b>!
        <button id="login-button" class="btn btn btn-outline-dark ms-3" data-bs-toggle="modal"
                data-bs-target="#loginModal">
            <i class="fa-solid fa-right-to-bracket me-2"></i>
            Login
        </button>

    @else

        Hello&nbsp;<b>{{\Illuminate\Support\Facades\Auth::user()->getAttribute('name')}}</b>!
        <a href="{{route('auth.logout')}}" class="btn btn btn-outline-dark ms-3">
            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
            Logout
        </a>

    @endguest

</div>

@guest
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>
                        User Login
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('auth.login')}}">
                    <div class="modal-body p-1 p-md-4">
                        @csrf

                        @if(\Illuminate\Support\Facades\Session::has('authError'))

                            <div class="alert alert-danger">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                {{\Illuminate\Support\Facades\Session::pull('authError')}}
                            </div>

                        @endif

                        Please inform your credentials:

                        <div class="mt-3">
                            <label class="fw-bold">
                                E-mail Address:
                            </label>
                            <input value="{{old('email','')}}" required type="email" name="email" class="form-control"/>
                        </div>
                        <div class="mt-3">
                            <label class="fw-bold">
                                Password:
                            </label>
                            <input required type="password" name="password" class="form-control"/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endguest

