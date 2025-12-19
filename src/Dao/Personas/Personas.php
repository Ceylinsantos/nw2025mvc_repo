<?php

namespace Dao\Personas;

use Dao\Table;

class Personas extends Table
{
    public static function getPersonas()
    {
        $sqlstr = "SELECT persona_id, nombre, apellido, edad, estado,
               CASE WHEN estado='ACT' THEN 'Activo' 
                    WHEN estado='INA' THEN 'Inactivo' 
                    ELSE 'Sin asignar' END AS estadoDsc
               FROM personas";
        $registros = self::obtenerRegistros($sqlstr, []);

        return [
            "personas" => $registros,
            "total" => count($registros)
        ];
    }
    public static function getPersonaById(int $personaId)
    {
        $sqlstr = "SELECT persona_id, nombre, apellido, edad, estado FROM personas WHERE persona_id = :personaId";
        $params = ["personaId" => $personaId];
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function insertPersona(string $nombre, string $apellido, int $edad, string $estado)
    {
        $sqlstr = "INSERT INTO personas (nombre, apellido, edad, estado) 
                   VALUES (:nombre, :apellido, :edad, :estado)";
        $params = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "edad" => $edad,
            "estado" => $estado
        ];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function updatePersona(int $personaId, string $nombre, string $apellido, int $edad, string $estado)
    {
        $sqlstr = "UPDATE personas SET nombre=:nombre, apellido=:apellido, edad=:edad, estado=:estado 
                   WHERE persona_id=:personaId";
        $params = [
            "personaId" => $personaId,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "edad" => $edad,
            "estado" => $estado
        ];
        return self::executeNonQuery($sqlstr, $params);
    }
    public static function deletePersona(int $personaId)
    {
        $sqlstr = "DELETE FROM personas WHERE persona_id=:personaId";
        $params = ["personaId" => $personaId];
        return self::executeNonQuery($sqlstr, $params);
    }
}
