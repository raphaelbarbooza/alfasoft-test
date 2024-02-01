@extends('template.main')


@section('main')

    <div class="d-flex align-items-baseline mb-3">
        <h1>Manage Contacts</h1>
        <div class="ms-auto">
            <form method="get" action="{{route('contact.index')}}">
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
        </div>
    </div>

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
                        <button @guest disabled @endguest
                                type="button"
                                class="btn btn-sm btn-outline-dark"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Details">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                        <button @guest disabled @endguest type="button"
                                class="btn btn-sm btn-outline-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button @guest disabled @endguest type="button"
                                class="btn btn-sm btn-danger"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Delete">
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
