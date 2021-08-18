@extends('layouts.master', ['title'=>"Dr. ". $user->firstname()."'s Account"])
@section('content')
    <doctor :user="{{ json_encode($user) }}" :initial="{{ $user->ratingForUser(auth()->user()) ?: 0}}"
        :averagerating="{{ $user->rating(auth()->user()) ?: 0 }}"
        />
@endsection