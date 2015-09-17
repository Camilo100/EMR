<?php
require 'EMR.php';

class NormalTest extends PHPUnit_Framework_TestCase{

	protected $miTarjeta;

    protected function setUp(){
        $this->miTarjeta = new  normal();
    }
    
	#Viaje normal
	public function testViajeNormalF(){
		$this->assertFalse($this->miTarjeta->pagarBoleto(143, 20.00));
	}
	
	#Una recarga de 15 
	public function testRecarga(){
		$this->miTarjeta->recarga(15);
		$this->assertEquals(15, $this->miTarjeta->saldo());	
	}

	#Una recarga de 15 y un viaje normal
	public function testViajeNormal(){
		$this->miTarjeta->recarga(15);
		$this->miTarjeta->pagarBoleto(143, 20.00);
		$this->assertEquals(10, $this->miTarjeta->saldo());
	}

	#Una recarga de 15, un viaje normal y un transbordo
	public function testTransbordo(){
		$this->miTarjeta->recarga(15);
		$this->miTarjeta->pagarBoleto(143, 20.00);
		$this->miTarjeta->pagarBoleto(142, 20.30);
		$this->assertEquals(8, $this->miTarjeta->saldo());
	}

	
	#Una recarga de 5, un viaje normal y un transbordo
	public function testTransbordoF(){
		$this->miTarjeta->recarga(5);
		$this->miTarjeta->pagarBoleto(143, 20.00);
		$this->assertFalse($this->miTarjeta->pagarBoleto(142, 20.30));	
	}
	
	#Una recarga de 15 y dos viajes pagados con la misma tarjeta 
	public function testDosViajes(){
		$this->miTarjeta->recarga(15);
		$this->miTarjeta->pagarBoleto(143, 20.00);
		$this->miTarjeta->pagarBoleto(143, 20.01);
		$this->assertEquals(5, $this->miTarjeta->saldo());
	}

	#Falta testear metodo devolver viajes
}


?> 
