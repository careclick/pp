@extends('layouts.master', ['title'=>'Dashboard'])
@section('content')
		<div>
			<admin
			 :subscribers="{{ json_encode($subscribers) }}"
			 :transactions="{{ json_encode($transactions) }}"
			 :consultations="{{ json_encode($consultations) }}"
			 />
		</div>	
@endsection