<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Pin;
use Illuminate\Http\Request;

use App\Http\Requests;

class PinController extends Controller
{
  /**
   * Constructs the controller
   */
  public function __construct () {
    $this->middleware('auth', ['except' => [
      'index',
      'show',
    ]]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pins = Pin::orderBy('created_at', 'desc')->get();

    return view('pin.index', [
      'pins' => $pins,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pin.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validatePin($request);

    $pin = new Pin;
    $pin->title = $request->title;
    $pin->description = $request->description;
    $pin->user_id = $request->user()->id;
    $pin->save();

    return redirect('pin/' . $pin->id)
            ->with('notice', 'Successfully created new Pin');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $pin = Pin::find($id);

    return view('pin.show', [
      'pin' => $pin,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $pin = Pin::find($id);

    if (Gate::denies('modify', $pin)) {
      abort(403);
    }

    return view('pin.edit', [
      'pin' => $pin,
    ]);
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
    $pin = Pin::find($id);

    if (Gate::denies('modify', $pin)) {
      abort(403);
    }

    $this->validatePin($request);

    $pin->title = $request->title;
    $pin->description = $request->description;
    $pin->save();

    return redirect('pin/' . $pin->id)
            ->with('notice', 'Successfully edited Pin');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $pin = Pin::find($id);

    if (Gate::denies('modify', $pin)) {
      abort(403);
    }

    $pin->delete();

    return redirect('/');
  }

  private function validatePin ($request) {
    $this->validate($request, [
      'title' => 'required|min:6',
      'description' => 'required|min:6',
    ]);
  }
}
