@extends('app')
@section('content')
<div class="container">
@foreach($countries as $country)
    {{$country->name}}
@endforeach
</div>

@endsection