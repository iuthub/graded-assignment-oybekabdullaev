@extends('layouts.master')

@section('content')

<ul id="myUL">

  @foreach($tasks as $task)
    <li>
      <div class="task">
          {{ $task->title }}
      </div>
    </li>
  @endforeach
</ul>

@endsection