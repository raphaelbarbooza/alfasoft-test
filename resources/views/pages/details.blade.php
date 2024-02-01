@extends('template.main')


@section('main')

    <div class="d-flex align-items-baseline mb-3">
        <div class="d-flex align-items-center">
            <a href="{{route('contact.index')}}" class="btn btn-light me-2">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <h1>Details of {{$contact->getAttribute('name')}}</h1>
        </div>
        <div class="ms-auto">
            <a href="{{route('contact.update',['contact' => $contact->getAttribute('id')])}}" class="btn btn-primary">
                <i class="fa-regular fa-pen-to-square me-2"></i>
                Edit
            </a>
            <button type="button"
                    class="btn btn-danger"
                    onclick="deleteContactConfirmation(
                                {{$contact->getAttribute('id')}},
                                '{{$contact->getAttribute('name')}}',
                                '{{route('contact.delete',['contact' => $contact->getAttribute('id')])}}'
                                )">
                <i class="fa-solid fa-trash-can me-2"></i>
                Remove
            </button>
        </div>
    </div>

    <div class="mt-3 pt-3 border-top">
        <div class="row">
            <div class="col-md-3">
                <label class="d-block fw-bold">
                    Created at:
                </label>
                {{$contact->getAttribute('created_at')->format('Y-m-d H:i:s')}}
            </div>
            <div class="col-md-3">
                <label class="d-block fw-bold">
                    Last update:
                </label>
                {{$contact->getAttribute('updated_at')->format('Y-m-d H:i:s')}}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label class="d-block fw-bold">
                    Contact name:
                </label>
                {{$contact->getAttribute('name')}}
            </div>
            <div class="col-md-3">
                <label class="d-block fw-bold">
                    Contact number:
                </label>
                <a href="tel:+351{{$contact->getAttribute('contact')}}">
                    {{$contact->getAttribute('formatted_contact_number')}}
                </a>
            </div>
            <div class="col-md-3">
                <label class="d-block fw-bold">
                    Contact e-mail address:
                </label>
                <a href="mailto:{{$contact->getAttribute('email_address')}}">
                    {{$contact->getAttribute('email_address')}}
                </a>
            </div>
        </div>
    </div>

@endsection
