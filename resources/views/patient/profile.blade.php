@extends('layouts.patient', ['title'=>auth()->user()->firstname().'s'.' Profile' ])
@section('content')
  <userprofile/>
@endsection