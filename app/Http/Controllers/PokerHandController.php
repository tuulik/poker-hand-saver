<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateHandRequest;

use App\PokerHand;
use Illuminate\Support\Facades\Auth as Auth;

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
			return view('createHand');
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
		$hand = Pokerhand::find($id);
		return view('showHand', ['hand' => $hand]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
