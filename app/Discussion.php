<?php

namespace LaravelForum;

use LaravelForum\User;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
  protected $fillable = [
    'title', 'content', 'slug', 'channel_id', 'user_id',
  ];
}
