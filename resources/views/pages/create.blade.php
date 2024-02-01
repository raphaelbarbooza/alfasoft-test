@extends('template.main')


@section('main')

    <div class="d-flex align-items-baseline mb-3">
        <div class="d-flex align-items-center">
            <a href="{{route('contact.index')}}" class="btn btn-light me-2">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <h1>Create new contact</h1>
        </div>

    </div>

    <div class="mt-3 pt-3 border-top">
        <div class="row d-flex justify-content-center pt-3">
            <div class="col-md-4">
                <form method="post" action="{{route('contact.create.save')}}">
                    @csrf

                    <div>
                        <label class="fw-bold">
                            Name:
                        </label>
                        <input value="{{old('name','')}}" type="text" name="name" minlength="5" maxlength="200" class="form-control"/>
                        @error('name')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @else
                            <small class="text-muted">
                                Minimum 5 characters
                            </small>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="fw-bold">
                            Contact:
                        </label>
                        <input value="{{old('contact','')}}" type="text" name="contact" mask="contact" class="form-control"/>
                        @error('contact')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @else
                            <small class="text-muted">
                                Only numbers, 9 digits
                            </small>
                        @enderror

                    </div>

                    <div class="mt-3">
                        <label class="fw-bold">
                            E-mail address:
                        </label>
                        <input value="{{old('email_address','')}}" type="email" name="email_address" class="form-control"/>
                        @error('email_address')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @else
                            <small class="text-muted">
                                Please, input a valid e-mail address
                            </small>
                        @enderror

                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            Salvar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
