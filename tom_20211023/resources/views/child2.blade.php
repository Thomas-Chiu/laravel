@extends('layouts.app')

@section('title', '子版 2')

@section('sidebar')
  @parent

  <p>我是子版 sidebar</p>
@endsection

@section('content')
  <p>我是子版 content</p>
@endsection
