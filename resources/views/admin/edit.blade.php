@extends('layouts.admin_layout')

@section('content')

@include('partials.error_block')

<form id="postForm" action="{{ route('adminEditPost') }}" method="post">
  @csrf

  <p>
    <input type="text" 
      style="width:400px;"
      name="title"
      value="{{ $task->title }}"
    />
  </p>
  
  <p>
    <input type="submit"
      value="Submit"
    />
  </p>
  
  <input type="hidden"
    name="id"
    value="{{ $task->id }}"  
  />
</form>

@endsection