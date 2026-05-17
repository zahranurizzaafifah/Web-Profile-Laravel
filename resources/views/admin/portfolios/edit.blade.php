@extends('layouts.app')

@section('title', 'Edit Portfolio')

@section('content')
    <section class="section">
        <h2>Edit Portfolio</h2>
        @include('admin.portfolios.form', ['action' => route('admin.portfolios.update', $portfolio), 'portfolio' => $portfolio, 'method' => 'PUT'])
    </section>
@endsection
