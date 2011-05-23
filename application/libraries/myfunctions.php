<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Myfunctions {
	function relativeTime($dt)
	{
		$times=array(	365*24*60*60	=> "year",
						30*24*60*60		=> "month",
						7*24*60*60		=> "week",
						24*60*60		=> "day",
						60*60			=> "hour",
						60				=> "minute",
						1				=> "second");
		$passed=time()-$dt;
		
		if($passed<5) {
			$output='less than 5 seconds ago';
		}
		else {
			$output=array();
			$exit=0;
			foreach($times as $period=>$name) {
				if($exit>=2 || ($exit>0 && $period<60)) break;
				
				$result = floor($passed/$period);
				if($result>0) {
					$output[]=$result.' '.$name.($result==1?'':'s');
					$passed-=$result*$period;
					$exit++;
				}
				else if($exit>0) $exit++;
			}
					
			$output=implode(', ',$output).' ago';
		}
		return $output;
	}
}