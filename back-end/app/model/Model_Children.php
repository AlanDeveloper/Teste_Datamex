<?php

namespace App\Model;

use PDO;
use App\Model\Model;

class Model_Children extends Model {

	private static $table = 'filhos';

	public static function add() {
        try {
            $sql = 'INSERT INTO ' . self::$table .' (pessoas_id, nome, idade) VALUES (:pessoas_id, :nome, :idade)';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'pessoas_id' => $_POST['pessoas_id'],
				'nome' => $_POST['nome'],
				'idade' => $_POST['idade']
			));

			return self::findOne($_POST['nome']);
        } catch (PDOException $e) {
            return array("error" => $e->getMessage());
        }
    }

	public static function findOne($nome) {
        try {
            $sql = 'SELECT * FROM ' . self::$table . ' WHERE nome = :nome';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'nome' => $nome
			));
    
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array("error" => $e->getMessage());
        }
    }

	public static function findById($id) {
		try {
            $sql = 'SELECT * FROM ' . self::$table . ' WHERE pessoas_id = :id';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'id' => $id
			));
    
            return count($query->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            return array("error" => $e->getMessage());
        }
	}

	public static function find() {
        try {
            $sql = 'SELECT * FROM ' . self::$table;
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array("error" => $e->getMessage());
        }
    }
}