@extends('edit')

@section('title', '更新標題資料')

@section('action')
    <form action="{{URL::to('/update')}}" method="POST" class="sidebar-form">
@endsection

@section('category')
    @foreach ($categorys as $category)
        <option value="{{ $category }}" {{ ( $category == $ti_category) ? 'selected' : '' }}> {{ $category }} </option>
    @endforeach
@endsection                           

@section('ti_name', <?=$ti_name;?>)
@section('ti_text', <?=$ti_text;?>)
@section('ti_id', <?=$ti_id;?>)