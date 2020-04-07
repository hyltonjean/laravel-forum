<div class="card">
  <div class="card-header">
    Channels
  </div>
  <div class="card-body">
    <ul class="list-group">
      @foreach($channels as $channel)
      <li class="list-group-item">
        <a href="{{ route('discussions.index') }}?channel={{ $channel->slug }}">{{ $channel->name }}</a>
      </li>
      @endforeach
    </ul>
  </div>
</div>