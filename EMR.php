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
		$this->saldo = 34 + $this->saldo + $monto;
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
	{
		print_r($this->viajes);
	}


}
class Normal extends tarjeta{
	public $ultPrecio = 0;
	public $ultLinea = 0;
	public $ultHora = 0;
	public function pagarBoleto($linea, $hora){
		if($this->ultPrecio == 2 or $this->ultPrecio == 0 or $this->ultLinea == $linea or $hora-$this->ultHora>1)
		{	
			if($this->saldo >= 5)
			{
				$this->saldo = $this->saldo-5;
				$this->ultPrecio = 5;
				$this->ultLinea = $linea;
				$this->ultHora = $hora;
				$this->viaje[] = new viaje($linea, $hora, 5);
				//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";
				return true;
			}
			else
			{
				//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta". " y necesitas $5 <br>";
				return false;
			}
		}
		elseif($this->ultPrecio != 2 and $this->ultLinea != $linea and 1>$hora-$this->ultHora)
		{
			if($this->saldo >= 2)
			{
				$this->saldo = $this->saldo-2;
				$this->ultPrecio = 2;
				$this->ultLinea = $linea;
				$this->ultHora = $hora;
				$this->viaje[] = new viaje($linea, $hora, 2);
				//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";
				return true;
			}
			else
			{
				//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta"." y necesitas $2<br>";
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
			if($this->ultPrecio == 2 or $this->ultPrecio == 0 or $this->ultLinea == $linea or $hora-$this->ultHora>1)
			{
				if($this->saldo >= 5)
				{
					$this->saldo = $this->saldo - 5;
					$this->ultPrecio = 5;
					$this->ultLinea = $linea;
					$this->ultHora = $hora;
					$this->viaje[] = new viaje($linea, $hora, 5);
					//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";
					return true;
				}
				else
				{
					//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta"." y necesitas $5 <br>";
					return false;
				}
			}
			else
			{
				if($this->ultPrecio != 2 and $this->ultLinea != $linea and 1>$hora-$this->ultHora)
				{
					if($this->saldo >= 2)
					{
						$this->saldo = $this->saldo-2;
						$this->ultPrecio = 2;
						$this->ultLinea = $linea;
						$this->ultHora = $hora;
						$this->viaje[] = new viaje($linea, $hora, 2);
						//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";;
						return true;
					}
					else
					{
						//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta"." y necesitas <br>";
						return false;
					}
				}
			}
		}	
		else
		{
			if($this->ultPrecio == 1 or $this->ultLinea == $linea or $hora-$this->ultHora>1)
			{
				if($this->saldo > 2.50)
				{
					$this->saldo = $this->saldo-2.50;
					$this->ultPrecio = 2.50;
					$this->ultLinea = $linea;
					$this->ultHora = $hora;
					$this->viaje[] = new viaje($linea, $hora, 2.50);
					//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";
					return true;
				}	
				else
				{
					//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta"." y necesitas $2.50 <br>";
					return false;
				}
			}	
			else 
			{
				if($this->ultPrecio != 1 and $this->ultLinea != $linea and 1>$hora-$this->ultHora)
				{
					if($this->saldo > 1)
					{
						$this->saldo = $this->saldo-1;
						$this->ultPrecio = 1;
						$this->ultLinea = $linea;
						$this->ultHora = $hora;
						$this->viaje[] = new viaje($linea, $hora, 1);
						//echo "Viaje realizado con exito en la linea "."$linea"." a la hora "."$hora"."<br>";
						return true;
					}	
					else
					{
						//echo "El viaje no se pudo realizar tienes $". "$this->saldo". " en tu tarjeta"." y necesitas $2.50 <br>";
						return false;
					}
				}
 			}
		} 
	}
}
/*
$miTarjeta = new normal();
$miMedio = new MedioBoleto();
$miTarjeta->recarga(15);
$miTarjeta->pagarBoleto(143, 20);
$miTarjeta->pagarBoleto(142, 20.3);
$miTarjeta->pagarBoleto(141, 20.3);
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
echo $miTarjeta->saldo();
*/
?> 
