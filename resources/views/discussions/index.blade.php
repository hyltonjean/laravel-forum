@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
  <a type="button" href="{{ route('discussion.create') }}" class="btn btn-success btn-sm">Add Discussion</a>
</div>
@foreach($discussions as $discussion)
<div class="card mb-3">
  <div class="card-header">{{ $discussion->title }}</div>
  <div class="card-body">
    {{ $discussion->content }}
  </div>
</div>
@endforeach
{{ $discussions->links() }}
@endsection