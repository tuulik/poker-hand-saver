<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateHandRequest;
use App\Http\Requests\EditPokerhandRequest;

use App\PokerHand;
use Illuminate\Support\Facades\Auth as Auth;
use Entrust;

class PokerhandController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hands = Pokerhand::with('user')->get();
		return view('listHands', ['hands' => $hands]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check())
			return view('createHand');
		abort('403');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateHandRequest $request)
	{
		$hand = new Pokerhand();
		$hand->user_id = Auth::user()->id;
		$hand->hand = $request->hand;
		if($request->description != null) {
			$hand->description = $request->description;
		}
		$hand->save();
		return redirect('pokerhand');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hand = Pokerhand::with('user')->find($id);
		$editHand = false;
		if(Auth::user()->id == $hand->user_id || Entrust::can('edit-pokerhand'))
			$editHand = true;
		return view('showHand', ['hand' => $hand, 'editHand' => $editHand]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hand = Pokerhand::find($id);
		if(Auth::user()->id == $hand->user_id || Entrust::can('edit-pokerhand')) {
			return view('editHand', ['pokerhand' => $hand]);
		}
		abort('403');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditPokerhandRequest $request)
	{
		$hand = Pokerhand::find($id);
		if(Auth::user()->id == $hand->user_id || Entrust::can('edit-pokerhand')) {
			$hand->hand = $request->hand;
			if($request->description != null) {
				$hand->description = $request->description;
			}
			$hand->save();
			return redirect('pokerhand/' . $id);
		}
		abort('403');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$hand = Pokerhand::find($id);
		if(Auth::user()->id == $hand->user_id || Entrust::can('delete-pokerhand')) {
			$hand->delete();
			return redirect('pokerhand/');
		}
		abort('403');
	}

}
