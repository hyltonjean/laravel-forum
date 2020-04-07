@extends('layouts.app')

@section('content')


<div class="card mb-3">

  @include('partials.discussion-header')

  <div class="card-body">
    <div class="d-flex justify-content-center" style="font-weight: bold;">
      {{  $discussion->title  }}
    </div>
    <hr>

    {!! $discussion->content !!}

    @if($discussion->bestReply)
    <div class="card border-success my-5">
      <div class="card-header text-white bg-success">
        <div class="d-flex justify-content-between">
          <div><img src="{{ Gravatar::src($discussion->bestReply->owner->email, 40) }}" style="border-radius:50%;"
              alt="{{ $discussion->author->name }}">
            <span class="ml-2" style="font-weight: bold;">{{ $discussion->bestReply->owner->name }}</span></div>
          <div class="justify-content-end align-self-center">
            <h5 style="font-weight:600;">Best Reply</h5>
          </div>
        </div>
      </div>
      <div class="card-body text-success">
        {!! $discussion->bestReply->content !!}
      </div>
    </div>
    @endif
  </div>
</div>

@foreach ($discussion->replies()->paginate(3) as $reply)
<div class="card my-5">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <div class="float-left">
        <img src="{{ Gravatar::src($reply->owner->email, 40) }}" style="border-radius:50%;"
          alt="{{ $reply->owner->name }}">
        <span class="ml-2" style="font-weight: bold;">{{ $reply->owner->name }}</span>
      </div>
      <div class="float-right">
        @auth
        @if(auth()->user()->id === $discussion->user_id)
        <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}"
          method="POST">
          @csrf
          <button type="submit" class="btn btn-primary btn-sm text-right">Mark as best reply</button>
        </form>
        @endif
        @endauth
      </div>
    </div>
  </div>
  <div class="card-body">
    {!! $reply->content !!}
  </div>
</div>
@endforeach

{{ $discussion->replies()->paginate(3)->links() }}

<div class="card">
  <div class="card-header">
    Add a Reply
  </div>
  <div class="card-body">
    @auth
    <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
      @csrf
      <input type="hidden" name="content" id="content" class="@error('content') is-invalid @enderror">
      <trix-editor input="content"></trix-editor>
      @error('content')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <button type="submit" class="btn btn-success btn-sm my-2">Add reply</button>
    </form>
    @else
    <a href="{{ route('login') }}" class="btn btn-info text-white my-2">Sign in to add a reply</a>
    @endauth
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection