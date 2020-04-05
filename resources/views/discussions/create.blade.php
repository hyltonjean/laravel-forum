@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header"> Add Discussion</div>
  <div class="card-body">
    <form action="{{ route('discussion.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
          placeholder="Title">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6"
          cols="6" placeholder="Content"></textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="channel">Channel</label>
        <br>
        <select name="channel_id" id="channel">
          @foreach ($channels as $channel)
          <option value="{{ $channel->id }}">{{ $channel->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-success btn-sm">Create Discussion</button>
    </form>
  </div>
</div>
@endsection