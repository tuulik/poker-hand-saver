<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Zizaco\Entrust\EntrustFacade as Entrust;

class EditUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if(Entrust::can('edit-user'))
			return true;
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'email' => 'required'
		];
	}

}
