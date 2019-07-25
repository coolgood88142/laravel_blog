@extends('layouts')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>這裡放置側欄</p>
@endsection

@section('content')
<p>在這裡放主要內容</p>
@endsection