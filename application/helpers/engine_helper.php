<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// TANGGAL
function tanggal($date)
{
    $exp = explode('-',$date);
    if(count($exp) == 3)
    {
        $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;
}

function tanggal2($date)
{
    $exp = explode('/',$date);
    if(count($exp) == 3)
    {
        $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;
}
function limit_words($string, $lengthstring){
    $words = explode(" ",$string);
    $cwords = count($words);
    $cutword ='';
    $stop = false;
    $i=0;
    while (!$stop) {
    	if (strlen($cutword)+strlen($words[$i])>$lengthstring)
    		$stop = true;
    	else
    		if ($cutword=='')
    			$cutword .= $words[$i];
    		else
    			$cutword .= ' '.$words[$i];
    	$i++;
	}
    return $cutword.'...';
}