<?php
namespace App\Models;

class Model {

    // Recuperer tous les enregistrements
    public static function all() : array {}

    // Creer un enregistrement
    public static function create(array $object): bool{}

    // Mettre a jour
    public static function update(int $id, array $object): bool{}

    // Trouver par ID
    public static function find(int $id): ?array{}

    // Supprimer
    public static function delete(int $id): bool{}
}

