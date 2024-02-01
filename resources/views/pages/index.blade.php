@extends('template.main')


@section('main')


    <div class="d-flex align-items-baseline mb-3">
        <h1>Manage Contacts</h1>
        <div class="ms-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Who are you looking for?">
                <button class="btn btn-outline-dark" type="button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <th>
                Name
            </th>
            <th>
                Contact
            </th>
            <th>
                E-mail
            </th>
            <th class="text-center">
                Actions
            </th>
        </thead>
        <tbody>
            @foreach($contacts as $contact)

                <tr>
                    <td>
                        {{$contact->getAttribute('name')}}
                    </td>
                    <td>
                        {{$contact->getAttribute('contact')}}
                    </td>
                    <td>
                        {{$contact->getAttribute('email_address')}}
                    </td>
                    <td width="1">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-dark">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{$contacts->links()}}
    </div>


@endsection
