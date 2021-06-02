@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Créer un utilisateur avec profil</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="">Pseudo</label>
            <input type="text" class="" name="nickname">
        </div>
        <div class="mb-3">
            <label class="">Email</label>
            <input type="email" class="" name="email">
        </div>
        <div class="mb-3">
            <label class="">Nom</label>
            <input type="text" class="" name="name">
        </div>
        <div class="mb-3">
            <label class="">Age</label>
            <input type="number" class="" name="age">
        </div>
        <div class="mb-3">
            <label class="">Téléphone</label>
            <input type="tel" class="" name="phone">
        </div>
        <button type="submit" class="text-center border-2 border-yellow-400 text-yellow-400 px-3 py-2 rounded-full text-white m-1 w-auto text-center">Submit</button>
    </form>
@endsection