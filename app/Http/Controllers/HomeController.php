<?php

namespace App\Http\Controllers;

use App\Models\SubForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        $output['services'] = $services;

        return view('home')->with($output);
    }

    public function submitForm(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'bail|required|max:120|min:3',
            'project_type' => 'bail|required',
            'services' => 'bail|required',
            'terms_and_conditions' => 'bail|required'
        ]);
        $input = $request->all();

        $sub_form = SubForm::submitForm($input);

        return redirect('home');
    }
}
