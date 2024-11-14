@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.course_categories.form', ['model' => $category])

@endsection