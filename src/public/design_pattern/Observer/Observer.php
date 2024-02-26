<?php
// Define um ponto de entrada para o script PHP.

// Define a interface Observer que exige a implementação do método update.
interface Observer
{
    // Declara o método update que todos os observadores devem implementar.
    public function update(Subject $subject): void;
}

// Define a interface Subject que exige implementação dos métodos attach, detach e notify.
interface Subject
{
    // Método para anexar um observador ao sujeito.
    public function attach(Observer $observer): void;
    // Método para remover um observador do sujeito.
    public function detach(Observer $observer): void;
    // Notifica todos os observadores anexados de uma mudança.
    public function notify(): void;
}

// Implementa a interface Subject com a classe ConcreteSubject.
class ConcreteSubject implements Subject
{
    // Estado privado do sujeito.
    private $state;
    // Array para manter uma referência a todos os observadores anexados.
    private $observers = [];

    // Retorna o estado atual do sujeito.
    public function getState(): int
    {
        return $this->state;
    }

    // Define o estado do sujeito e notifica os observadores sobre a mudança.
    public function setState(int $state): void
    {
        $this->state = $state;
        $this->notify();
    }

    // Anexa um observador ao sujeito.
    public function attach(Observer $observer): void
    {
        // Usa o hash do objeto observador como chave para garantir a unicidade.
        $this->observers[spl_object_hash($observer)] = $observer;
    }

    // Remove um observador do sujeito.
    public function detach(Observer $observer): void
    {
        // Remove o observador do array usando seu hash como chave.
        unset($this->observers[spl_object_hash($observer)]);
    }

    // Notifica todos os observadores sobre a mudança de estado.
    public function notify(): void
    {
        // Itera sobre cada observador e chama seu método update.
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

// Implementa a interface Observer com a classe ConcreteObserverA.
class ConcreteObserverA implements Observer
{
    // Método auxiliar para imprimir dados formatados.
    public function myPrint($myData)
    {
        echo "<pre>";
        print_r($myData);
        echo "</pre>";
    }

    // Implementa a ação de atualização ao receber notificações do sujeito.
    public function update(Subject $subject): void
    {
        // Condicional para reagir apenas a determinadas mudanças de estado.
        if ($subject->getState() < 3) {
            // Chama o método myPrint para exibir uma mensagem.
            $this->myPrint("ConcreteObserverA: Reagido ao evento.\n");
        }
    }
}

// Implementa a interface Observer com a classe ConcreteObserverB.
class ConcreteObserverB implements Observer
{
    // Método auxiliar para imprimir dados formatados.
    public function myPrint($myData)
    {
        echo "<pre>";
        print_r($myData);
        echo "</pre>";
    }

    // Implementa a ação de atualização ao receber notificações do sujeito.
    public function update(Subject $subject): void
    {
        // Condicional para reagir apenas a determinadas mudanças de estado.
        if ($subject->getState() === 0 || $subject->getState() >= 2) {
            // Chama o método myPrint para exibir uma mensagem.
            $this->myPrint("ConcreteObserverB: Reagido ao evento.\n");
        }
    }
}

// Demonstra o uso das classes Subject e Observer.
$subject = new ConcreteSubject();

$observerA = new ConcreteObserverA();
$subject->attach($observerA);

$observerB = new ConcreteObserverB();
$subject->attach($observerB);

// Modifica o estado do sujeito, o que levará à notificação dos observadores.
$subject->setState(2);
$subject->setState(3);
