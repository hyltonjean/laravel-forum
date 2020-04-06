<div class="card-header">
  <img src="{{ Gravatar::src($discussion->author->email, 40) }}" style="border-radius:50%;"
    alt="{{ $discussion->author->name }}">
  <span class="ml-2" style="font-weight: bold;">{{ $discussion->author->name }}</span>
  @if(in_array(request()->path(), ['discussions']))
  <a type="button" href="{{ route('discussions.show', $discussion->slug) }}"
    class="btn btn-info btn-sm text-white float-right">View &nbsp;<span class="badge badge-light"
      style="font-size:13px;">{{ $discussion->replies->count() }}</span></a>
  @endif
</div>