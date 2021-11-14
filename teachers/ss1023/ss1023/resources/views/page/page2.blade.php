@extends('layoutsFolder.app2')
@section('title123','55688')

@section('sidebar')
    @parent

    <p>page2 appended to the master sidebar.</p>
@endsection


@section('content')
    <h3>page1</h3>
    <p>test test</p>
@endsection