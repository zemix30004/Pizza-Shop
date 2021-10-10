
@extends('layouts.admin')

@section('title', 'admin-contact-component')

@section('content')
    <div class="col-md-12">
        <h2>All contacts</h2>
        <table class="table">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Сообщение
                </th>
                <th>
                    Created_at
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name}}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $contacts->links() }}
@endsection
