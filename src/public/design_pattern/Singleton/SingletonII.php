<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class SingletonII
{
    /**
     * Mantém a instância da classe.
     */
    private static $instance = null;

    /**
     * O construtor privado previne a criação de uma nova instância da
     * classe SingletonII através do operador `new`.
     */
    private function __construct()
    {
        // Inicialização da instância, se necessário.
    }

    /**
     * O método clone é privado para evitar a clonagem da instância da classe.
     */
    private function __clone()
    {
        // Lançar um erro quando tentar clonar a instância.
        throw new Exception("Não é permitido clonar uma instância do SingletonII.");
    }

    /**
     * Método para acessar a instância da classe SingletonII.
     * @return SingletonII A instância da classe SingletonII.
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new SingletonII();
            echo "Instância do SingletonII criada.<br>";
        }
        return self::$instance;
    }

    /**
     * Método de exemplo que pode ser acessado através da instância.
     */
    public function someBusinessLogic()
    {
        echo "Executando someBusinessLogic.<br>";
    }
}
// Exemplo de uso
$singleton = SingletonII::getInstance();
$singleton->someBusinessLogic();

// Provocar um erro ao tentar criar uma nova instância
$anotherSingletonII = new SingletonII(); // Erro, o construtor é privado.

// Provocar um erro ao tentar clonar a instância
$cloneSingletonII = clone $singleton; // Erro, o método __clone é privado.
