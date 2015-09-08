<?php
require 'EMR.php';
function test1($miTarjeta){

	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(142, 20.30);
	$miTarjeta->pagarBoleto(141, 22.00);
	if($miTarjeta->saldo() != 9 and $miTarjeta->saldo() != 3 )
	{
		echo "Test 1 no superado <br>";
	}
}

function test2($miTarjeta){

	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(143, 20.01);
	$miTarjeta->pagarBoleto(141, 22);
	if($miTarjeta->saldo() != 0 and $miTarjeta->saldo() != 7.50)
	{
		echo "Test 2 no superado <br>";
	}
}

function test3($miTarjeta){

	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(143, 22.00);
	$miTarjeta->pagarBoleto(141, 00.00);
	if($miTarjeta->pagarBoleto(141, 05.00)){}
	else
	{
		echo "Test 3 no superado <br>";
	}
}





$miMedio = new MedioBoleto();
$miTarjeta = new normal();
$miTarjeta2 = new normal();
$miMedio2 = new MedioBoleto();

test1($miMedio);
test1($miTarjeta);

test2($miMedio2);
test2($miTarjeta2);

test3($miTarjeta2);

/*
$miTarjeta->pagarBoleto(142, 22);
$miTarjeta->saldo();
$miMedio->recarga(15);
$miMedio->viajesRealizados();
$miMedio->pagarBoleto(143, 20);
$miMedio->pagarBoleto(142, 20);
$miMedio->pagarBoleto(141, 20);
$miMedio->pagarBoleto(142, 22);
$miMedio->saldo();
$miMedio->viajesRealizados();
*/
?> 