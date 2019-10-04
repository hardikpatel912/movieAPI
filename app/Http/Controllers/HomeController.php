<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Validator;

class HomeController extends Controller
{
	public function __construct(Movie $movie)
	{
		$this->movie = $movie;
	}
	public function index(Request $request)
	{
		$input = $request->all();
		$rules = [
			"genre" => "required",
			"time" => "required|date_format:H:i"
		];

		$v = Validator::make($input, $rules);

		if($v->fails()) {
			return implode("<br>", $v->errors()->all());
		}

		$result = $this->movie->getMovieRecommendation($input);

		if(empty($result)) {
			return response(["no movie recommendations"]);
		}
		return response($result);
	}
}