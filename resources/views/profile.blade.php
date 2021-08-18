@extends('layouts.master', ['title'=> auth()->user()->name."'s Profile" ])
@section('content')
    <div>
      <userprofile/>
    </div>
@endsection