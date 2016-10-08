<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\DirectorRepo;



class FilialesController extends Controller
{
	protected $filialesRepo;
	protected $directorRepo;

	public function __construct(FilialRepo $filialesRepo, DirectorRepo $directorRepo)
	{
		$this->directorRepo = $directorRepo;
		$this->filialesRepo = $filialesRepo;
	}


	public function index()
	{
	

	$filiales=$this->filialesRepo->all();

	return view('filiales.index',compact('filiales'));
		
	}

	public function  nuevo()
	{

	$directores = $this->directorRepo->lists('nombres','id_director');

	return view('filiales.alta_filiales', compact('directores'));
		
	}

	public function postAdd(Request $request)
	{
	
	//	dd($request->all());
	$this->filialesRepo->create($request->all());

	}

	public function postEdit()
	{}
}