<?php
/**
 * "Vumeter" in PHP
 * This is just a example of how to display ASCII sequence color on console with PHP.
 * It's not useful xD.  
 *
 * Execute
 * php vumeter.php
 *
 * @link		  http://deerme.org/php/vumetro-en-php
 */

include_once("console.php");
$c = new console();
$c->setAppName("Vumeter");
$c->setTitle("Vumeter");
function colorshell($c,$t,$f = 40)
{
        // Color
        // 30 - 37
        // Fondo 40-47
        return sprintf("%c[%d;%d;%dm".$t,27,1, $c ,$f);
}
function movecursor($x,$y)
{
        return sprintf("33[{".$x."};{".$y."}f");
}
function printVumeter( $out )
{
	$c = new console();
	$c->clear();
	$c->toPos(0,0);
	// 6 lines , 1 to 10
	foreach( $out as $line => $value )
	{
		for($i=0;$i<=$value;$i++)
		{
			if ( $line < 4 )
			{
				echo colorshell(32,"    ",42);
			}
			elseif( $line < 7 )
			{
				echo colorshell(32,"    ",43);
			}
			elseif( $line < 11 )
			{
				echo colorshell(33,"    ",41);
			}
		}	
		echo colorshell(37,"\n",40);
	}

}

echo colorshell(37,"\n",40);
while(true )
{
	$out = array(
		0 => rand(1,10),
		1 => rand(1,10),
		2 => rand(1,10),
		3 => rand(1,10),
		4 => rand(1,10),
		5 => rand(1,10),
		6 => rand(1,10),
		7 => rand(1,10),
		8 => rand(1,10),
		9 => rand(1,10),
		10 => rand(1,10),
	);
	printVumeter($out);
	usleep(5000);
}

/*
for($i=30;$i<=37;$i++)
{
	for($j=40;$j<=47;$j++)
	{
		echo colorshell($i,$i.",".$j,$j);
	}
}
*/
