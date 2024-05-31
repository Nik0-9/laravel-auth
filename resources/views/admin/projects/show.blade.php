@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<section>
    <h1>{{$project->title}}</h1>

    <p>{{$project->content}}</p>
    <img src="{{$project->image}}" alt="{{$project->title}}">
</section>
@endsection