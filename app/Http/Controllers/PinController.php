<?php

namespace App\Http\Controllers;

use File;
use Image;
use Gate;
use App\User;
use App\Pin;
use Illuminate\Http\Request;

use App\Http\Requests;

class PinController extends Controller
{
  /**
   * Holds the validation array for storing and updating
   *
   * @var array $rules
   */
  private $storingRules = [
    'title' => 'required|min:6',
    'description' => 'required|min:6',
    'image' => 'required|mimes:png,jpg,jpeg'
  ];

  private $updatingRules = [
    'title' => 'required|min:6',
    'description' => 'required|min:6',
    'image' => 'mimes:png,jpg,jpeg'
  ];


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
    $this->validate($request, $this->storingRules);

    $imageName = $this->storeImage($request->file('image'));

    $pin = new Pin;
    $pin->title = $request->title;
    $pin->description = $request->description;
    $pin->user_id = $request->user()->id;
    $pin->image = $imageName;
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

    $this->validate($request, $this->updatingRules);

    if ($request->hasFile('image')) {
      $imageName = $this->storeImage($request->file('image'));

      File::delete(public_path('assets/img/pins/') . $pin->image);

      $pin->image = $imageName;
    }

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

    File::delete(public_path('assets/img/pins/') . $pin->image);
    $pin->delete();

    return redirect('/');
  }

  /**
   * Like the specified pin
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function like($id) {
    $pin = Pin::find($id);

    if (!$pin->liked()) $pin->like();
    else $pin->unlike();

    return redirect('pin/' . $pin->id);
  }

  /**
   * Stores the image to filesystem
   *
   * @param $request->file() $image
   * @return String
   */
  private function storeImage ($image) {
    $imageName = md5($image->getClientOriginalName() . microtime())
                  . '.' . $image->getClientOriginalExtension();

    Image::make($image)
            ->resize(800, null, function ($constraint) {
              $constraint->aspectRatio();
            })
            ->save(public_path('assets/img/pins/') . $imageName);

    return $imageName;
  }

}
