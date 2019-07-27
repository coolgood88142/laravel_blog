@extends('edit')

@section('title', '新增標題資料')

@section('action')
    <form action="{{URL::to('/add')}}" method="POST" class="sidebar-form">
@endsection

@section('category')
    <option selected value="焦點">焦點</option>
    <option value="運動">運動</option>
    <option value="娛樂">娛樂</option>
    <option value="FUN">FUN</option>
    <option value="生活">生活</option>
    <option value="影音">影音</option>
@endsection