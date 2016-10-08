<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Repositories\DirectorRepo;



class DirectorController extends Controller
{
	protected $directorRepo;

	public function __construct( DirectorRepo $directorRepo)
	{
		$this->directorRepo = $directorRepo;
	}


	public function index()
	{
	

	$directores=$this->directorRepo->all();

	return view('director.index',compact('directores'));
		
	}

	public function  nuevo()
	{


	return view('director.alta_director');
		
	}

	public function postAdd(Request $request)
	{
	
	//	dd($request->all());
	$this->directorRepo->create($request->all());

	}

	public function postEdit()
	{}
}