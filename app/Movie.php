<?php

namespace App;

use GuzzleHttp\Client;
use Carbon\Carbon;

class Movie
{
	public function getMovies()
	{
		$client = new Client();
		try {
			$response = $client->get("https://pastebin.com/raw/cVyp3McN");
			$body = $response->getBody();
			$jsonDecoded = json_decode($body->getContents());
			return $jsonDecoded;
		} catch(\Exception $e) {
			report($e);
		}
		return [];
	}

	public function getMovieRecommendation($input)
	{
		$movies = $this->getMovies();
		$ans = [];
		$timeToCompare = Carbon::createFromFormat("H:i", $input['time'], 'Asia/Magadan')->addMinutes(30)->timestamp;
		foreach ($movies as $movie) {
			if(in_arrayi($input['genre'], $movie->genres))
			{
				foreach ($movie->showings as $showing) {
					$parsedTime = Carbon::parse($showing, "Asia/Magadan");
					$parsedTimestamp = $parsedTime->timestamp;
					if($parsedTimestamp > $timeToCompare) {
						$tmp["print_string"] = $movie->name.", Showing at ".$parsedTime->setTimezone("Asia/Magadan")->format("h a");
						$tmp["rating"] = $movie->rating;
						$ans[] = $tmp;
						break 1;
					}
				}
			}
		}
		$finalAns = collect($ans)->sortByDesc('rating')->all();
		return $finalAns;
	}
}