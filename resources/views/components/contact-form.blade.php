{{-- Check if it's a create or update form --}}
@if($updating)
    <form method="post" action="{{route('contact.update.save',['contact' => $contact->getAttribute('id')])}}">
@else
    <form method="post" action="{{route('contact.create.save')}}">
@endif
    @csrf

    <div>
        <label class="fw-bold">
            Name:
        </label>
        <input value="{{old('name',$contact->getAttribute('name'))}}" type="text" name="name" minlength="5" maxlength="200" class="form-control"/>
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
        <input value="{{old('contact',$contact->getAttribute('contact'))}}" type="text" name="contact" mask="contact" class="form-control"/>
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
        <input value="{{old('email_address',$contact->getAttribute('email_address'))}}" type="email" name="email_address" class="form-control"/>
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
            Save
        </button>
    </div>

</form>
