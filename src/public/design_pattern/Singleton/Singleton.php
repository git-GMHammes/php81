<?php
class Singleton
{
    // http://localhost:4107/design_pattern/Singleton.php
    /**
     * Mantém a instância da classe.
     */
    private static $instance = null;

    /**
     * O construtor privado previne a criação de uma nova instância da
     * classe Singleton através do operador `new`.
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
        throw new Exception("Não é permitido clonar uma instância do Singleton.");
    }

    /**
     * Método para acessar a instância da classe Singleton.
     * @return Singleton A instância da classe Singleton.
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    /**
     * Método de exemplo que pode ser acessado através da instância.
     */
    public function someBusinessLogic()
    {
        // Implementação de algum comportamento específico.
    }
}

// Exemplo de uso
$singleton = Singleton::getInstance();
$singleton->someBusinessLogic();

// Tentativa de criar uma segunda instância.
//$anotherSingleton = new Singleton(); // Erro, o construtor é privado.

// Tentativa de clonar a instância.
//$cloneSingleton = clone $singleton; // Erro, o método __clone é privado.
