<div class="card-header">
  <img src="{{ Gravatar::src($discussion->author->email, 40) }}" style="border-radius:50%;"
    alt="{{ $discussion->author->name }}">
  <span class="ml-2" style="font-weight: bold;">{{ $discussion->author->name }}</span>
  @if(in_array(request()->path(), ['discussions']))
  <a type="button" href="{{ route('discussions.show', $discussion->slug) }}"
    class="btn btn-success btn-sm float-right">View</a>
  @endif
</div>