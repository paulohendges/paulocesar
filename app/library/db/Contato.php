<?php

/* 
 * Essa é a Classe cliente que fará todas as operações referentes a clientes.
 * Buscas, Alterações, enfim.. anything.
 */

namespace Db;  // inserindo um apelido de onde estará localizada esta Classe, para o caso de duplicidades de classes
use Phalcon\DI; // utilizando a biblioteca de injeção de diretórios do Phalcon

class Contato{
    
    public static function contatoBusca($params = null) {
//        if(!isset($params["id"])){
//            $codigo = "";
//        }
//        if(!isset($params["nome"])){
//            $params["nome"] = "";
//        }
//        if(!isset($params["cpfcnpj"])){
//            $params["cpfcnpj"] = "";
//        }
//        if(isset($params["id"]) && is_numeric($params["id"])){
//            $codigo = " = ".$params["id"];
//        }else{
//            $codigo = "";
//        }
//        $sql = "SELECT clientes.*, clientes_tipo.descricao
//                FROM \Model\Clientes clientes
//                INNER JOIN \Model\ClientesTipo clientes_tipo ON clientes.tipo_idClientesTipo = clientes_tipo.idClientesTipo
//                WHERE clientes.nome LIKE '%".$params["nome"]."%'
//                AND clientes.idClientes ".$codigo." 
//                AND clientes.cpfcnpj LIKE '%".$params["cpfcnpj"]."%'";
//        $sql .= "ORDER BY clientes.idClientes ASC";
//        $Clientes = \App\App::executeQuery($sql);
//        
//        return $Clientes;
    }
    
     public static function contatoBuscaAll() {
//         $builder = \App\App::createBuilder()
//            ->columns('clientes.*, clientes_tipo.descricao')
//            ->from(array('clientes' => 'Model\Clientes'))
//            ->innerJoin('Model\ClientesTipo', 'clientes.tipo_idClientesTipo = clientes_tipo.idClientesTipo', 'clientes_tipo'  );
//        
//        return $builder->getQuery()->execute();
    }
    
}