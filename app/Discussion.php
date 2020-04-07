<?php

namespace LaravelForum;

use LaravelForum\User;
use LaravelForum\Reply;
use LaravelForum\Notifications\ReplyMarkAsBestReply;

class Discussion extends Model
{
  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function replies()
  {
    return $this->hasMany(Reply::class);
  }

  // public function getBestReply()
  // {
  //   return Reply::find($this->reply_id);
  // }

  public function bestReply()
  {
    return $this->belongsTo(Reply::class, 'reply_id');
  }

  public function markAsBestReply(Reply $reply)
  {
    $this->update([
      'reply_id' => $reply->id,
    ]);

    if ($reply->owner->id === $this->author->id) {
      return;
    }

    $reply->owner->notify(new ReplyMarkAsBestReply($reply->discussion));
  }

  public function scopeFilterByChannels($builder)
  {
    if (request()->query('channel')) {
      $channel = Channel::where('slug', request()->query('channel'))->first();

      if ($channel) {
        return $builder->where('channel_id', $channel->id);
      }
      return $builder;
    }
    return $builder;
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
