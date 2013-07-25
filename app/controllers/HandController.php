<?php

class HandController extends BaseController {

	public function getIndex()
	{
		$game = new Game();
		$hands = $game->hands;	
		$game->handRank(0);

		foreach($hands as $i=>$hand)
		{		
			$player = (object) array(
								'name' => 'Player '.($i+1),
								'hand' => $hand
								);		
			$response[] = $player;
		}
		
		return $response;

	}

}