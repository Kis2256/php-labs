@extends('layouts.app')

@section('title', 'Говоримо привіт')

@section('content')
    <div class="container">
        <h1 class="page-title">{{ $message }}</h1>
    </div>
@endsection