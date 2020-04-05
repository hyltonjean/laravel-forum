<?php

use LaravelForum\Channel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Channel::create([
      'name' => 'Laravel 7',
      'slug' => Str::slug('Laravel 7'),
    ]);

    Channel::create([
      'name' => 'Vue js',
      'slug' => Str::slug('Vue js'),
    ]);

    Channel::create([
      'name' => 'React js',
      'slug' => Str::slug('React js'),
    ]);

    Channel::create([
      'name' => 'Angular 7',
      'slug' => Str::slug('Angular 7'),
    ]);
  }
}
