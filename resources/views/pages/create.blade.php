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
                <x-contact-form></x-contact-form>
            </div>
        </div>
    </div>

@endsection
