@extends('layouts._default.dashboard')
@section('content')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container">
        <div class="nk-content-body">
            <h3 class="text-primary">Dashboard</h3>
            <h4 class="text-secondary">Welcome {{ auth()->user()->name }}! Select other menu from sidebar</h4>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection
