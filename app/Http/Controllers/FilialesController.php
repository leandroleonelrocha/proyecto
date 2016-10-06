<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Repositories\FilialRepo;



class FilialesController extends Controller
{
	protected $filialesRepo;

		public function __construct(FilialRepo $filialesRepo)
	{
		$this->filialesRepo = $filialesRepo;
	}
	



	public function index()
	{
	

	$filiales=$this->filialesRepo->all();

	return view('filiales.index',compact('filiales'));
		
	}

	public function  nuevo()
	{
	



	return view('filiales.alta_filiales');
		
	}

	public function postAdd(Request $request)
	{
			$this->filialesRepo->create($request->all());

	}

	public function postEdit()
	{}
}