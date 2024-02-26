<?php
// src\public\design_pattern\AbstractFactory\Abstract Factory.php
// Interface Veiculo
interface Veiculo
{
    public function getNome();
}

// Classes Concretas para Carros
class CarroFiat implements Veiculo
{
    public function getNome()
    {
        return "Carro Fiat";
    }
}

class CarroFord implements Veiculo
{
    public function getNome()
    {
        return "Carro Ford";
    }
}

// Classes Concretas para Motos
class MotoHonda implements Veiculo
{
    public function getNome()
    {
        return "Moto Honda";
    }
}

class MotoYamaha implements Veiculo
{
    public function getNome()
    {
        return "Moto Yamaha";
    }
}

// Interface AbstractFactory
interface VeiculoFactory
{
    public function criarCarro(): Veiculo;
    public function criarMoto(): Veiculo;
}

// Fábricas Concretas
class FiatFactory implements VeiculoFactory
{
    public function criarCarro(): Veiculo
    {
        return new CarroFiat();
    }

    public function criarMoto(): Veiculo
    {
        // Fiat não tem moto, exemplo fictício
        return new MotoHonda(); // Supondo que Fiat decide fazer uma parceria.
    }
}

class FordFactory implements VeiculoFactory
{
    public function criarCarro(): Veiculo
    {
        return new CarroFord();
    }

    public function criarMoto(): Veiculo
    {
        // Ford não tem moto, exemplo fictício
        return new MotoYamaha(); // Supondo que Ford decide fazer uma parceria.
    }
}

// Função auxiliar para imprimir dados formatados.
function myPrint($myData)
{
    echo "<pre>";       // Inicia a tag pre para formatação.
    print_r($myData);   // Imprime os dados de forma legível.
    echo "</pre>";      // Fecha a tag pre.
}

// Utilização
function clienteCode(VeiculoFactory $factory)
{
    $carro = $factory->criarCarro();
    $moto = $factory->criarMoto();

    $myData1 = $carro->getNome() . "\n";
    $myData2 =  $moto->getNome() . "\n";
    myPrint($myData1);
    myPrint($myData2);
}

// Criando veículos da Fiat
clienteCode(new FiatFactory());

// Criando veículos da Ford
clienteCode(new FordFactory());
