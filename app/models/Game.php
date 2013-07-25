<?php

	class Game {
		
		public $deck;
		public $hands = array();
		
		public function __construct()
		{
			$this->_buildRanks();
			$this->deck = new Deck();
			$this->deck->setPlayers(2);
			$this->hands = $this->deck->dealHands();	
		}

		public function handRank($position)
		{
			$hand = $this->hands[$position];
			return $this->calculateRank($hand);
		}
		
		public function calculateRank($hand)
		{

		}

	} // End Class