@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
  <a type="button" href="{{ route('discussion.create') }}" class="btn btn-success btn-sm">Add Discussion</a>
</div>
<div class="card">
  <div class="card-header">Discussions</div>
  <div class="card-body">
    discussions
  </div>
</div>
@endsection