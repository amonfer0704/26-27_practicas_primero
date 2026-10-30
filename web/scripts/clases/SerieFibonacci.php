<?php 
/**
 * Clase SerieFubonacci que implementa la serie de Fibonacci.
 * Esta serie se basa en la fórmula F(x)=F(x-1)+F(x-2) siendo F(0)=0 y F(1)=1. 
 */
class SerieFibonacci implements Iterator{

    private int $_limite;
    private int $_claveActual = 0;

    /**
     * Constructor
     */
    public function __construct(int $numero)
    {
        $this->_limite = $numero;
    }

    /**
     * Función fFibonacci como función estática dentro de la clase SerieFibonacci
     * que debe implementar la serie de Fibonacci usando un generador
     */
    static function fFibonacci(int $ultimo): Generator{
        $anterior = 0;
        $actual = 1;
        for($i = 0; $i <= $ultimo; $i++){
            yield $i => $anterior;
            $aux = $anterior + $actual;
            $anterior = $actual;
            $actual = $aux;
        }
    }

    /**
     * Métodos implementados de Iterator
     */

	public function current(): int
	{
        $numero = $this->_claveActual;
        $resultado = (pow((1 + sqrt(5)) / 2, $numero) - pow((1 - sqrt(5)) / 2, $numero)) / sqrt(5);
		return round($resultado);
	}

	public function next(): void
	{
		$this->_claveActual++;
	}

	public function key(): int
	{
		return $this->_claveActual;
	}

	public function valid(): bool
	{
		return !($this->_claveActual > $this ->_limite);
	}

	public function rewind(): void
	{
		$this->_claveActual = 0;
	}
}