@extends('layouts.app')

@section('content')
    @include('partials.nav')
    <div class="max-w-6xl mx-auto my-10">
        <h1 class="text-center my-10">Users</h1>
        <a href={{ route('users.create') }} class="text-center border-2 border-blue-400 text-blue-400 px-3 py-2 rounded-full text-white m-1 w-auto text-center">Créer</a>
    </div>
    <table class="table">
        <thead>
            <tr class="flex-start my-4">
                <th>#</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="lg:max-w-screen-2xl mx-auto my-4">
            @foreach ($users as $user)
                <tr class="bg-black-800 py-4 px-8 shadow-md">
                    <th class="text-center text-white-600 pb-5">{{ $user->id }}</th>
                    <td class="text-center text-white-600 pb-5">{{ $user->nickname }}</td>
                    <td class="text-center text-white-600 pb-5">{{ $user->email }}</td>
                    <td class="text-center text-white-600 pb-5">{{ $user->profil->name }}</td>
                    <td class="text-center text-white-600 pb-5">{{ $user->profil->age }}</td>
                    <td class="text-center text-white-600 pb-5">{{ $user->profil->phone }}</td>
                    <td>
                        <div class="flex">
                            <a class="text-center border-2 border-yellow-400 text-yellow-400 px-3 py-2 rounded-full text-white m-1 w-auto text-center" href="{{ route('users.edit', $user->id) }}">Editer</a>
                            <form action={{ route('users.destroy', $user->id) }} method="post">
                                @csrf
                                @method("delete")
                                <button class="text-center text-red-600 border-2 border-red-600 px-3 py-2 rounded-full text-white m-1 w-auto text-center" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
