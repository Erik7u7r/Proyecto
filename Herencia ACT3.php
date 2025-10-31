<?php
// ============================
// Clase Padre
// ============================
class Empleado {
    protected $nombre;
    protected $edad;
    protected $salario;

    public function __construct($nombre, $edad, $salario) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->salario = $salario;
    }

    public function mostrarInfo() {
        echo "\n--- Información del Empleado ---\n";
        echo "Nombre: {$this->nombre}\n";
        echo "Edad: {$this->edad}\n";
        echo "Salario: \${$this->salario}\n";
        echo "-------------------------------\n";
    }

    public function aumentarSalario($porcentaje) {
        $this->salario += $this->salario * ($porcentaje / 100);
        echo "Salario aumentado en {$porcentaje}%.\n";
    }
}

// ============================
// Clase hija: Gerente
// ============================
class Gerente extends Empleado {
    private $bono;

    public function __construct($nombre, $edad, $salario, $bono) {
        parent::__construct($nombre, $edad, $salario);
        $this->bono = $bono;
    }

    public function mostrarInfo() {
        parent::mostrarInfo();
        echo "Bono: \${$this->bono}\n";
        echo "Cargo: Gerente\n";
        echo "-------------------------------\n";
    }
}

// ============================
// Clase hija: Programador
// ============================
class Programador extends Empleado {
    private $lenguaje;

    public function __construct($nombre, $edad, $salario, $lenguaje) {
        parent::__construct($nombre, $edad, $salario);
        $this->lenguaje = $lenguaje;
    }

    public function mostrarInfo() {
        parent::mostrarInfo();
        echo "Lenguaje principal: {$this->lenguaje}\n";
        echo "Cargo: Programador\n";
        echo "-------------------------------\n";
    }
}

// ============================
// Programa principal
// ============================

echo "=== Sistema de Gestión de Empleados ===\n\n";
echo "Seleccione el tipo de empleado:\n";
echo "1. Empleado normal\n";
echo "2. Gerente\n";
echo "3. Programador\n";

$opcion = readline("Opción: ");

$nombre = readline("Ingrese el nombre: ");
$edad = readline("Ingrese la edad: ");
$salario = readline("Ingrese el salario: ");

switch ($opcion) {
    case 1:
        $empleado = new Empleado($nombre, (int)$edad, (float)$salario);
        break;

    case 2:
        $bono = readline("Ingrese el bono del gerente: ");
        $empleado = new Gerente($nombre, (int)$edad, (float)$salario, (float)$bono);
        break;

    case 3:
        $lenguaje = readline("Ingrese el lenguaje principal del programador: ");
        $empleado = new Programador($nombre, (int)$edad, (float)$salario, $lenguaje);
        break;

    default:
        echo "Opción inválida. Saliendo del programa.\n";
        exit;
}

// Mostrar información del empleado
$empleado->mostrarInfo();

// Aumentar salario
$porcentaje = readline("Ingrese el porcentaje de aumento de salario: ");
$empleado->aumentarSalario((float)$porcentaje);

// Mostrar información actualizada
$empleado->mostrarInfo();

echo "Programa finalizado.\n";
?>
