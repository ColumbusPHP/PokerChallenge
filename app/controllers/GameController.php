<?php

class GameController extends BaseController {

	public function getIndex()
	{
		return View::make('game');
	}

}