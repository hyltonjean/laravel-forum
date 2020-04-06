<div class="card">
  <div class="card-header">
    Channels
  </div>
  <div class="card-body">
    <ul class="list-group">
      @foreach($channels as $channel)
      <li class="list-group-item">
        {{ $channel->name }}
      </li>
      @endforeach
    </ul>
  </div>
</div>