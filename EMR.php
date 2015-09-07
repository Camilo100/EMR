<?php


class viaje{
	public $linea;
	public $monto;
	public $hora;
	function __construct($linea, $monto, $hora){
		$this->linea = $linea;
		$this->monto = $monto;
		$this->hora = $hora;
	}
}

class colectivo{
	public $empresa;
	public $linea;
	private $interno;
	function __construct($empresa, $linea, $interno){
		$this->empresa = $empresa;
		$this->linea = $linea;
		$this->interno = $interno;
	}
}

abstract class tarjeta{
	public $saldo=0;
	public $viajes = [];
	public function recarga($monto){
		if ($monto >= 196){
		$this->saldo = 34 +$this->saldo + $monto;
		}
		elseif ($monto >= 368) {
			$this->saldo = 92 +$this->saldo + $monto;
		}
		else
			$this->saldo = $this->saldo + $monto;
	}
	public function saldo(){

		return $this->saldo;
	}
	public function viajesRealizados()


}
class Normal extends tarjeta{
	public $ultPrecio = 0;
	public $ultLinea = 0;
	public $ultHora = 0;
	public function pagarBoleto($linea, $hora){
		if($this->ultPrecio == 1.90 or $this->ultPrecio == 0 or $this->ultLinea == $linea or $hora-$this->ultHora>1)
		{	
			if($this->saldo >= 5.75)
			{
				$this->saldo = $this->saldo-5.75;
				$this->ultPrecio = 5.75;
				$this->ultLinea = $linea;
				$this->ultHora = $hora;
				$this->viaje[] = new viaje($linea, $hora, );
				return true;
			}
			else
			{
				return false;
			}
		}
		elseif($this->ultPrecio != 1.90 and $this->ultLinea != $linea and 1>$hora-$this->ultHora)
		{
			if($this->saldo >= 1.90)
			{
				$this->saldo = $this->saldo-1.90;
				$this->ultPrecio = 1.90;
				$this->ultLinea = $linea;
				$this->ultHora = $hora;
				$this->misViajes->nuevoViaje($linea, $hora, 1.90);
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}

class MedioBoleto extends normal{
	public $ultPrecio = 0;
	public $ultLinea = 0;
	public $ultHora = 0;
	public function pagarBoleto($linea, $hora)
	{
		if (6 > $hora)
		{
			if($this->ultPrecio == 1.90 or $this->ultPrecio == 0 or $this->ultLinea == $linea or $hora-$this->ultHora>1)
			{
				if($this->saldo >= 5.75)
				{
					$this->saldo = $this->saldo-5.75;
					$this->ultPrecio = 5.75;
					$this->ultLinea = $linea;
					$this->ultHora = $hora;
					$this->misViajes->nuevoViaje($linea, $hora, 5.75);
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				if($this->ultPrecio != 1.90 and $this->ultLinea != $linea and 1>$hora-$this->ultHora)
				{
					if($this->saldo >= 1.90)
					{
						$this->saldo = $this->saldo-1.90;
						$this->ultPrecio = 1.90;
						$this->ultLinea = $linea;
						$this->ultHora = $hora;
						$this->misViajes->nuevoViaje($linea, $hora, 1.90);
						return true;
					}
					else
					{
						return false;
					}
				}
			}
		}	
		else
		{
			if($ultPrecio == 0.80 or $ultLinea == $linea or $hora-$ultHora>1)
			{
				if($this->saldo > 3)
				{
					$this->saldo = $this->saldo-3;
					$this->ultPrecio = 3;
					$this->ultLinea = $linea;
					$this->ultHora = $hora;
					$this->misViajes->nuevoViaje($linea, $hora, 3);
					return true;
				}	
				else
				{
					return false;
				}
			}	
			else 
			{
				if($ultPrecio != 0.80 and $ultLinea != $linea and 1>$hora-$ultHora)
				{
					if($this->saldo > 0.80)
					{
						$this->saldo = $this->saldo-0.80;
						$this->ultPrecio = 0.80;
						$this->ultLinea = $linea;
						$this->ultHora = $hora;
						$this->misViajes->nuevoViaje($linea, $hora, 0.80);
					}
				}
 			}
		} 
	}
}

$miTarjeta = new normal();
$miTarjeta->recarga(15);
$miTarjeta->pagarBoleto(143, 20);
$miTarjeta->pagarBoleto(142, 20.30);
$miTarjeta->pagarBoleto(141, 20.35);
$miTarjeta->pagarBoleto(142, 22.30);
$miTarjeta->viajesRealizados
echo $miTarjeta->saldo();

?> 
