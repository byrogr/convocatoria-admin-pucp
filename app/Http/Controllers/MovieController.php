<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function showEscritorio()
	{
		
		$lastMovies = DB::table('movies')
							->orderBy('id', 'desc')
							->take(3)
							->get();
		
		$qMovie = count( Movie::all() );

		$data = [ 
			'qMovie' => $qMovie,
			'lastMovies' => $lastMovies
		];

		return view('dashboard.index', $data);
	}

    public function showPeliculas()
    {
    	$peliculas = Movie::all();
    	return view('movies.index', compact('peliculas', $peliculas));
    }
}
