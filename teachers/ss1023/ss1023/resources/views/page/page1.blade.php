@extends('layoutsFolder.app2')
@section('title123','55688')

@section('sidebar')
    @parent

    <p>page1 appended to the master sidebar.</p>
@endsection


@section('content')
    <h3>page1</h3>
    <p>test test</p>

    <a href="{{route('books.create')}}">page2 books create</a>
@endsection