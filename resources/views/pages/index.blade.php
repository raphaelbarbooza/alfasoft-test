@extends('template.main')


@section('main')

    <div class="d-flex flex-column flex-md-row align-items-baseline justify-content-between mb-3">
        <h1 class="w-100">Manage Contacts</h1>

        <form method="get" action="{{route('contact.index')}}" class="mt-3 mt-md-0">
            <div class="input-group">
                <input
                    name="filter"
                    minlength="1"
                    maxlength="50"
                    type="text"
                    class="form-control"
                    value="{{request()->get('filter','')}}"
                    placeholder="Who are you looking for?">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        <div class="mt-3 mt-md-0">
            <a href="{{route('contact.create')}}" class="btn btn-primary ms-2 text-nowrap @guest disabled @endguest">
                <i class="fa-regular fa-square-plus me-2"></i>
                Create Contact
            </a>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <th>
                Name
                <small>
                    <a href="{{route('contact.index',['order' => $order == 'ASC' ? 'DESC' : 'ASC', ...request()->except('order')])}}"
                       class="text-dark ms-2">
                        @if($order == 'ASC')
                            <i class="fa-solid fa-chevron-up"></i>
                        @else
                            <i class="fa-solid fa-chevron-down"></i>
                        @endif
                    </a>
                </small>
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
                        {!!
                    \App\Helpers\StringHelpers::markTermWithBolderTag($contact->getAttribute('name'), request()->get('filter',''))
                        !!}
                    </td>
                    <td>
                        {!!
                    \App\Helpers\StringHelpers::markTermWithBolderTag($contact->getAttribute('contact'), request()->get('filter',''))
                        !!}
                    </td>
                    <td>
                        {!!
                    \App\Helpers\StringHelpers::markTermWithBolderTag($contact->getAttribute('email_address'), request()->get('filter',''))
                        !!}
                    </td>
                    <td width="1">
                        <div class="btn-group" role="group">
                            <a href="@auth {{route('contact.view',['contact' => $contact->getAttribute('id')])}}@endauth"
                               class="btn btn-sm btn-outline-dark @guest disabled @endguest"
                               data-bs-toggle="tooltip" data-bs-placement="top"
                               title="Details">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </a>
                            <a href="@auth {{route('contact.update',['contact' => $contact->getAttribute('id')])}} @endauth"
                               class="btn btn-sm btn-outline-primary @guest disabled @endguest"
                               data-bs-toggle="tooltip" data-bs-placement="top"
                               title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <button @guest disabled @endguest type="button"
                                    class="btn btn-sm btn-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Delete"
                                    onclick="deleteContactConfirmation(
                                {{$contact->getAttribute('id')}},
                                '{{$contact->getAttribute('name')}}',
                                '{{route('contact.delete',['contact' => $contact->getAttribute('id')])}}'
                                )">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{$contacts->links()}}
    </div>

@endsection
