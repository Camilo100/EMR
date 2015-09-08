<?php
require 'EMR.php';

#Una recarga de 15 un viaje normal un transbordo y otro normal
function test1($miTarjeta){
	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(142, 20.30);
	$miTarjeta->pagarBoleto(141, 22.00);
	assert($miTarjeta->saldo() != 9 and $miTarjeta->saldo() != 3 )
	
}
#Una recarga de 15 dos viajes pagados con la misma tarjeta y otro normal
function test2($miTarjeta){
	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(143, 20.01);
	$miTarjeta->pagarBoleto(141, 22);
	assert($miTarjeta->saldo() != 0 and $miTarjeta->saldo() != 7.50)
}
#Una recarga de 15 dos viajes pagados con la misma tarjeta y un transbordo
function test3($miTarjeta){
	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(143, 20.01);
	$miTarjeta->pagarBoleto(141, 21);
	assert($miTarjeta->saldo() != 3 and $miTarjeta->saldo() != 10.50)
}


#Una recarga de 15 un viaje en una linea un transbordo en otra y otro normal 
function test4($miTarjeta){
	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(142, 20.01);
	$miTarjeta->pagarBoleto(142, 20.02);
	assert($miTarjeta->saldo() != 9 and $miTarjeta->saldo() != 3)
	}
/*
function test3($miTarjeta){

	$miTarjeta->recarga(15);
	$miTarjeta->pagarBoleto(143, 20.00);
	$miTarjeta->pagarBoleto(143, 22.00);
	$miTarjeta->pagarBoleto(141, 00.00);
	assert($miTarjeta->pagarBoleto(141, 05.00)){}
	else
	{
		echo "Test 3 no superado <br>";
	}
}
*/




$miMedio = new MedioBoleto();
$miTarjeta = new normal();
$miTarjeta2 = new normal();
$miMedio2 = new MedioBoleto();
assert(2 == 1);
/*
test1($miMedio);
test1($miTarjeta);

test2($miMedio2);
test2($miTarjeta2);

test3($miTarjeta2);


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