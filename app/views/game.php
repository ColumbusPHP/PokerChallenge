<html>
	<head>
		<title>Challenge: Poker</title>
		<style>
			body { 
				background: #cedce7; /* Old browsers */
				/* IE9 SVG, needs conditional override of 'filter' to 'none' */
				background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNjZWRjZTciIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjNTk2YTcyIiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L3JhZGlhbEdyYWRpZW50PgogIDxyZWN0IHg9Ii01MCIgeT0iLTUwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
				background: -moz-radial-gradient(center, ellipse cover,  #cedce7 0%, #596a72 100%); /* FF3.6+ */
				background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#cedce7), color-stop(100%,#596a72)); /* Chrome,Safari4+ */
				background: -webkit-radial-gradient(center, ellipse cover,  #cedce7 0%,#596a72 100%); /* Chrome10+,Safari5.1+ */
				background: -o-radial-gradient(center, ellipse cover,  #cedce7 0%,#596a72 100%); /* Opera 12+ */
				background: -ms-radial-gradient(center, ellipse cover,  #cedce7 0%,#596a72 100%); /* IE10+ */
				background: radial-gradient(ellipse at center,  #cedce7 0%,#596a72 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#596a72',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
			}
			.clear { clear: both; }
			
			#room { width: 509px; margin: 0 auto; padding: 100px 0 0; }
			#table { height: 269px; width: 509px; position: relative; background: url('/assets/tables/green.png') 0 0 no-repeat; }
			
			ul#players { list-style: none; }
			ul#players li.player { width: 200px; padding: 10px; border-radius: 5px; background: rgba(0, 0, 0, .15); -webkit-box-shadow: inset 1px 1px 1px 1px rgba(0, 0, 0, .2); box-shadow: inset 1px 1px 1px 1px rgba(0, 0, 0, .2); }
			li.position-1 { position: absolute; top: 25px; left: 140px; }
			li.position-2 { position: absolute; bottom: 35px; left: 140px; }
			ul#players h5 { margin: 0 0 10px; padding: 0; font-size: 12px; font-weight: bold; font-family: sans-serif; text-transform: uppercase; }
			ul#players h6 { float: right; margin: 0 0 10px; padding: 0; font-size: 12px; font-weight: bold; font-family: sans-serif; text-transform: uppercase; }
			ul#players h6.win { color: lime; }			

			ul.cards { list-style: none; margin: 0; padding: 0; }
			li.card { height: 53px; width: 36px; margin: 0 5px 0 0; display: block; float: left; border-radius: 3px; background: #fff url('/assets/cards/sprite.png') 100px 0 no-repeat; -webkit-box-shadow:  1px 1px 1px 1px rgba(0, 0, 0, .1); box-shadow:  1px 1px 1px 1px rgba(0, 0, 0, .1); }
			li.card.spotlight { -webkit-box-shadow:  0px 0px 1px 1px rgba(255, 0, 0, 1); box-shadow:  0px 0px 1px 1px rgba(255, 0, 0, 1); }
			ul.cards li.card:last-child { margin-right: 0; }
			li.card2C { background-position: 0 0; }
			li.card3C { background-position: 0 -71px; }
			li.card4C { background-position: 0 -150px; }
			li.card5C { background-position: 0 -228px; }
			li.card6C { background-position: 0 -302px; }			
			li.card7C { background-position: 0 -381px; }
			li.card8C { background-position: 0 -459px; }
			li.card9C { background-position: 0 -540px; }
			li.cardTC { background-position: 0 -618px; }
			li.cardJC { background-position: 0 -698px; }
			li.cardQC { background-position: 0 -776px; }
			li.cardKC { background-position: 0 -852px; }
			li.cardAC { background-position: 0 -931px; }
			li.card2S { background-position: -71px 0; }
			li.card3S { background-position: -71px -71px; }
			li.card4S { background-position: -71px -150px; }
			li.card5S { background-position: -71px -228px; }
			li.card6S { background-position: -71px -302px; }			
			li.card7S { background-position: -71px -381px; }
			li.card8S { background-position: -71px -459px; }
			li.card9S { background-position: -71px -540px; }
			li.cardTS { background-position: -71px -618px; }
			li.cardJS { background-position: -71px -698px; }
			li.cardQS { background-position: -71px -776px; }
			li.cardKS { background-position: -71px -852px; }
			li.cardAS { background-position: -71px -931px; }
			li.card2D { background-position: -148px 0; }
			li.card3D { background-position: -148px -71px; }
			li.card4D { background-position: -148px -150px; }
			li.card5D { background-position: -148px -228px; }
			li.card6D { background-position: -148px -302px; }			
			li.card7D { background-position: -148px -381px; }
			li.card8D { background-position: -148px -459px; }
			li.card9D { background-position: -148px -540px; }
			li.cardTD { background-position: -148px -618px; }
			li.cardJD { background-position: -148px -698px; }
			li.cardQD { background-position: -148px -776px; }
			li.cardKD { background-position: -148px -852px; }
			li.cardAD { background-position: -148px -931px; }
			li.card2H { background-position: -219px 0; }
			li.card3H { background-position: -219px -71px; }
			li.card4H { background-position: -219px -150px; }
			li.card5H { background-position: -219px -228px; }
			li.card6H { background-position: -219px -302px; }			
			li.card7H { background-position: -219px -381px; }
			li.card8H { background-position: -219px -459px; }
			li.card9H { background-position: -219px -540px; }
			li.cardTH { background-position: -219px -618px; }
			li.cardJH { background-position: -219px -698px; }
			li.cardQH { background-position: -219px -776px; }
			li.cardKH { background-position: -219px -852px; }
			li.cardAH { background-position: -219px -931px; }
			
		</style>
	</head>
	<body>
		
		<div id="room">
			<div id="table" data-deck="">
				<ul id="players">
					<?php 
						
						$game = new Game();
						$hands = $game->hands;
						
						$game->handRank(0);
						
						foreach($hands as $i=>$hand)
						{
							echo "
							<li class='player position-".($i+1)."'>
								<h6 class='rank'>RANK</h6>	
								<h5 class='name'>Player ".($i+1)."</h5>						
								<ul class='cards'>
							";
							
							foreach($hand as $j=>$card)
							{
								echo "<li class='card card{$card->card}' title='{$card->value} of {$card->suite}'></li>";
							}
							
							echo "	
								</ul>
								<div class='clear'></div>
							</li>
							";
	
						}
					?>
	
				</ul><!-- / #players -->
			</div>
		</div><!-- / #room -->
		
	</body>
</html>