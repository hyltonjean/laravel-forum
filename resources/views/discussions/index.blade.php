@extends('layouts.app')

@section('content')

@foreach($discussions as $discussion)
<div class="card mb-3">

  @include('partials.discussion-header')

  <div class="card-body">
    <div class="d-flex justify-content-center" style="font-weight: bold;">
      {{ $discussion->title }}
    </div>
  </div>
</div>
@endforeach
{{ $discussions->appends('channel', request()->query('channel'))->links() }}
@endsection