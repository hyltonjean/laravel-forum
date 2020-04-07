<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\Reply;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\CreateDiscussionsRequest;

class DiscussionsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('discussions.index')->with('discussions', Discussion::paginate(5));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('discussions.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateDiscussionsRequest $request)
  {

    auth()->user()->discussions()->create([
      'title' => $request->title,
      'content' => $request->content,
      'slug' => Str::slug($request->title),
      'channel_id' => $request->channel_id
    ]);

    session()->flash('success', 'Discussion created successfully');

    return redirect(route('discussions.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Discussion $discussion)
  {
    return view('discussions.show')->with('discussion', $discussion);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function reply(Discussion $discussion, Reply $reply)
  {
    $discussion->markAsBestReply($reply);

    session()->flash('success' . 'Marked as best reply');

    return redirect()->back();
  }
}
