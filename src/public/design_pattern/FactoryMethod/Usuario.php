<?php
// Define uma interface Usuario com métodos que todas as classes concretas devem implementar.
interface Usuario
{
    public function getPermissoes(); // Método para obter permissões do usuário.
    public function getDescricao();  // Método para obter a descrição do usuário.
}

// Classe Administrador implementa a interface Usuario.
class Administrador implements Usuario
{
    // Retorna as permissões específicas para o administrador.
    public function getPermissoes()
    {
        return ['criar_usuario', 'deletar_usuario', 'editar_usuario'];
    }

    // Retorna a descrição do administrador.
    public function getDescricao()
    {
        return 'Administrador com permissões totais';
    }
}

// Classe Editor implementa a interface Usuario.
class Editor implements Usuario
{
    // Retorna as permissões específicas para o editor.
    public function getPermissoes()
    {
        return ['editar_usuario'];
    }

    // Retorna a descrição do editor.
    public function getDescricao()
    {
        return 'Editor com permissões de edição';
    }
}

// Classe abstrata CriadorDeUsuario define o método fábrica.
abstract class CriadorDeUsuario
{
    // Método abstrato que as subclasses devem implementar para criar usuários.
    abstract public function criarUsuario(): Usuario;
}

// Classe concreta que estende CriadorDeUsuario para criar um Administrador.
class CriadorDeAdministrador extends CriadorDeUsuario
{
    // Implementa criarUsuario para retornar uma instância de Administrador.
    public function criarUsuario(): Usuario
    {
        return new Administrador();
    }
}

// Classe concreta que estende CriadorDeUsuario para criar um Editor.
class CriadorDeEditor extends CriadorDeUsuario
{
    // Implementa criarUsuario para retornar uma instância de Editor.
    public function criarUsuario(): Usuario
    {
        return new Editor();
    }
}

// Função auxiliar para imprimir dados formatados.
function myPrint($myData)
{
    echo "<pre>";       // Inicia a tag pre para formatação.
    print_r($myData);   // Imprime os dados de forma legível.
    echo "</pre>";      // Fecha a tag pre.
}

// Função cliente que utiliza o método fábrica para criar e imprimir a descrição do usuário.
function cliente(CriadorDeUsuario $criador)
{
    $usuario = $criador->criarUsuario(); // Cria o usuário.
    $myData = $usuario->getDescricao() . PHP_EOL; // Obtém a descrição do usuário.
    myPrint($myData); // Imprime a descrição usando a função auxiliar.
}

// Demonstra o uso do padrão Factory Method para criar diferentes tipos de usuários.
cliente(new CriadorDeAdministrador()); // Saída: Administrador com permissões totais
cliente(new CriadorDeEditor());        // Saída: Editor com permissões de edição
