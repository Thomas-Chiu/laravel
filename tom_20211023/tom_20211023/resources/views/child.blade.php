<!-- resources/views/child.blade.php -->
{{-- 我是子版繼承 --}}
@extends('layouts.app')

{{-- 我是第一組 yield --}}
@section('title', '子版')

{{-- 我是 --}}
@section('sidebar')
  @parent

  <p>我是子版 sidebar</p>
@endsection

{{-- 我是第二組 yield --}}
@section('content')
  <p>我是子版 content</p>
@endsection
