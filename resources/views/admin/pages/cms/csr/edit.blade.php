@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.csr.form', ['model' => $csr])

@endsection