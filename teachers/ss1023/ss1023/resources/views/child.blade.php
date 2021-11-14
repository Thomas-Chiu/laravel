<!-- resources/views/child.blade.php -->

@extends('layoutsFolder.app')

@section('title123', 'Page Title')

@section('sidebar')
    @parent

    <p>子版的內容</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    <h1>test content </h1>
@endsection