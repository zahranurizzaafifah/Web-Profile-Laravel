@extends('layouts.app')

@section('title', 'Tambah Portfolio')

@section('content')
    <section class="section">
        <h2>Tambah Portfolio</h2>
        @include('admin.portfolios.form', ['action' => route('admin.portfolios.store'), 'portfolio' => null, 'method' => 'POST'])
    </section>
@endsection
