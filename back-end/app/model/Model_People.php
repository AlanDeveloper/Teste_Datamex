<?php

namespace App\Model;

use PDO;
use App\Model\Model;

class Model_People extends Model {

	private static $table = 'pessoas';

	public static function add() {
        try {
            $sql = 'INSERT INTO ' . self::$table .' (id, nome, idade) VALUES (:id, :nome, :idade)';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'id' => $_POST['id'],
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

	public static function findMany($nome) {
        try {
            $sql = 'SELECT * FROM ' . self::$table . ' WHERE nome like :nome';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'nome' => "%$nome%"
			));
    
            return $query->fetchAll(PDO::FETCH_ASSOC);
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

	public static function delete($nome) {
        try {
            $sql = 'DELETE FROM ' . self::$table . ' WHERE nome = :nome';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
				'nome' => $nome
			));
        } catch (PDOException $e) {
            return array("error" => $e->getMessage());
        }
    }
}