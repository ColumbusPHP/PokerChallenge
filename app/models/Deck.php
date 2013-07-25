<?php

	class Deck {
		
		public $cards = array();
		public $players = 0;
		public $cardsPerHand = 5;
		public $suits;
		public $values;
		
		function __construct()
		{
			$this->_buildDeck();
			$this->shuffle( rand(1,10) );	
		}
		
		public function setPlayers($people=2)
		{
			$this->players = (int)$people;	
		}
		
		private function _buildDeck()
		{
			$this->cards = array();

			$this->suits = array(
						'C' => 'Clubs',
						'S' => 'Spades',
						'D' => 'Diamonds',
						'H' => 'Hearts'
						);
			
			$this->values = array(
						'2' => 'Two',
						'3' => 'Three',
						'4' => 'Four',
						'5' => 'Five',
						'6' => 'Six',
						'7' => 'Seven',
						'8' => 'Eight',
						'9' => 'Nine',
						'T' => 'Ten',
						'J' => 'Jack',
						'Q' => 'Queen',
						'K' => 'King',
						'A' => 'Ace'
						);

			foreach($this->suits as $s=>$suite)
			{
				foreach($this->values as $v=>$value)
				{
					$this->cards[] = (object) array(
								'card' 			=> $v.$s,
								'suite' 		=> $suite,
								'suite_abbr'	=> $s,
								'value' 		=> $value,
								'value_abbr'	=> $v
								);
				}
			}
			
			
			
		}
			
		public function shuffle($times=1)
		{
			
			$new = array();
			
			for($i=0; $i<$times; $i++)
			{
				
				$keys = array_keys($this->cards);
	
		        shuffle($keys);

		        foreach($keys as $key) {
		            $new[$key] = $this->cards[$key];
		        }
		
		        $this->cards = $new;
				
			}

		}
		
		public function pullCard()
		{
			return array_pop($this->cards); 
		}
		
		public function dealHands()
		{
			$this->hands = array();
			
			for($i=0; $i<$this->cardsPerHand; $i++)
			{
				for($seat=0; $seat<$this->players; $seat++)
				{
					$this->hands[$seat][] = $this->pullCard();			
				}
			}
			
			return $this->hands;
		}

	} // End Class
