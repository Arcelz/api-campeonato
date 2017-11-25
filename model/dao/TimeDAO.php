<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/09/2017
 * Time: 00:01
 */

namespace model\dao;


use bd\Banco;
use Exception;
use PDO;

class TimeDAO implements IDAO
{

    public function create($obj)
    {
        $codigo = 400;
        $messagem = "Erro inesperado";
        try {
            $db = Banco::conexao();
            $queryVal = "";
            $queryNam = "";
            foreach ($obj as $key => $value) {
                $queryVal .= ":" . $key . ",";
                $queryNam .= $key . ",";
            }
            $queryVal = substr_replace($queryVal, '', -1);
            $queryNam = substr_replace($queryNam, '', -1);
            $query = "INSERT INTO time($queryNam) VALUES ($queryVal)";
            $stmt = $db->prepare($query);
            foreach ($obj as $key => &$val) {
                $stmt->bindParam($key, $val);
            }
            $stmt->execute();
            $codigo = 200;
            $messagem = "Time adicionado com sucesso";
        } catch (Exception $e) {
            $codigo = 400;
            $messagem = $e->getMessage();
        }
        return [
            "codigo" => $codigo,
            "mensagem" => $messagem
        ];

    }

    public function update($obj)
    {
        $codigo = 400;
        $messagem = "Erro inesperado";
        try {
            $db = Banco::conexao();
            $queryText = "";
            foreach ($obj as $key => $value) {
                if ($key !== 'id')
                    $queryText .= $key . "=:" . $key . ",";
            }
            $queryVal = substr_replace($queryText, '', -1);

            $query = "UPDATE time SET $queryVal WHERE id=:id";
            $stmt = $db->prepare($query);
            foreach ($obj as $key => &$val) {
                $stmt->bindParam($key, $val);
            }
            $stmt->execute();
            $codigo = 200;
            $messagem = "Time alterado com sucesso";
        } catch (Exception $e) {
            $codigo = 400;
            $messagem = $e->getMessage();
        }
        return [
            "codigo" => $codigo,
            "mensagem" => $messagem
        ];
    }

    public function retrave($obj, $org)
    {
        $codigo = 400;
        $messagem = "Erro inesperado";
        try {
            $db = Banco::conexao();
            $query = "SELECT * FROM time ";
            if (!empty($obj)) {
                if (isset($obj['id'])) {
                    $query .= "WHERE id=:id";
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':id', $obj['id']);
                } else {
                    $a = true;
                    foreach ($obj as $key => $value) {
                        $text = " AND " . $key . " LIKE :" . $key;
                        if ($a) {
                            $text = " WHERE " . $key . " LIKE :" . $key;
                            $a = false;
                        }
                        $query .= $text;
                    }
                    $stmt = $db->prepare($query);
                    foreach ($obj as $key => &$val) {
                        $stmt->bindValue($key, "%$val%");
                    }
                }
            } else {
                $query .= "WHERE organizacao_id=" . $org;
                $stmt = $db->prepare($query);
            }

            $stmt->execute();
            if (!empty($stmt->rowCount())) {
                $codigo = 200;
                $messagem = ($stmt->fetchAll(PDO::FETCH_ASSOC));
            } else {
                $codigo = 400;
                $messagem = "Não foi possivel realizar a busca";
            }

        } catch
        (Exception $e) {
            $codigo = 400;
            $messagem = $e->getMessage();
        }
        return [
            "codigo" => $codigo,
            "mensagem" => $messagem
        ];
    }

    public function delete($obj)
    {
        $codigo = 400;
        $messagem = "Erro inesperado";
        try {
            $db = Banco::conexao();
            $query = "DELETE FROM  time WHERE id=:id";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $obj['id'], PDO::PARAM_INT);

            $stmt->execute();
            $messagem = "Deletado com sucesso";

        } catch (Exception $e) {
            $codigo = 200;
            $messagem = $e->getMessage();
        }
        return [
            "codigo" => $codigo,
            "mensagem" => $messagem
        ];
    }
}