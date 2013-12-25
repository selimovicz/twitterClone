 <?php

class ProfilesController extends BaseController {
	// $queries = DB::getQueryLog();
	// $last_query = end($queries);
	// dd($last_query);
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() {
   		$this->beforeFilter('csrf', array('on'=>'post'));
   		Config::set('auth.model', 'Profile');
	}

	public function index()
	{
        return View::make('profiles.index');
	}

	public function login()
	{
        $input = Input::all();
		$rules = array('email'=>'required|email',
  					  'password'=>'required|alpha_num|between:6,12');
		$validation = Validator::make($input, $rules);
		if($validation->passes()){

if (Auth::attempt(array('password'=>Input::get('password')))) {


   return Redirect::route('profiles.index')->with('message', 'You are now logged in!');
} else {
	
   return Redirect::to('/')
      ->with('message', 'Your username/password combination was incorrect')
      ->withInput();
}

		}else{
			return Redirect::back()->withInput()->withErrors($validation);
		}
	}


	public function create()
	{
        return View::make('profiles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$input = Input::all();
		$rules = array('email'=>'required|email|unique:profiles',
  					  'password'=>'required|alpha_num|between:6,12|confirmed',
  					  'password_confirmation'=>'required|alpha_num|between:6,12');
		$validation = Validator::make($input, $rules);
		if($validation->passes()){
			$profile = new Profile();
			$profile->email = Input::get('email');
			$profile->password = Hash::make(Input::get('password'));
			$profile->save();
			return Redirect::to('/')->with('message', 'Thanks for registering!');

		}else{
			return Redirect::back()->withInput()->withErrors($validation);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('profiles.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('profiles.edit');
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
