
@extends('layouts.admin')

@section('title', 'admin.contact')

@section('content')
    <div class="col-md-12">
        <h2>Все контакты</h2>
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
                <th>
                    Updated_at
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
                    <td>{{ $contact->uodated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $contacts->links() }}
@endsection
