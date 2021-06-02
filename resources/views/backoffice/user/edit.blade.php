@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Créer un utilisateur avec profil</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="">Pseudo</label>
            <input type="text" class="" name="nickname" value="{{ $user->nickname }}">
        </div>
        <div class="mb-3">
            <label class="">Email</label>
            <input type="email" class="" name="email" value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label class="">Nom</label>
            <input type="text" class="" name="name" value="{{ $user->profil->name }}">
        </div>
        <div class="mb-3">
            <label class="">Age</label>
            <input type="number" class="" name="age" value="{{ $user->profil->age }}">
        </div>
        <div class="mb-3">
            <label class="">Téléphone</label>
            <input type="tel" class="" name="phone" value="{{ $user->profil->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection