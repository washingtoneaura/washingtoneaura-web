@extends('layouts.master')

@section('title', $page->title)

@section('content')
    {!! $page->content !!}
@endsection

<script>
var previewUrl = "{{ route('platform.pages.edit', ['page' => $page->id, 'method' => 'preview']) }}";
</script>