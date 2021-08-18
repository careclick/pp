@extends('layouts.master',['title'=>$user->firstname()."'s Account"])
@section('content')
    <patient :user="{{ json_encode($user) }}"/>
@endsection