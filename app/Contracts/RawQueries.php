<?php namespace App\Contracts;

/**
 * @see \App\Support\Database\RawQueries
 */
interface RawQueries
{
    public function getUsersInArrayNotInGroup($testedArray, $group);

    public function triggerCreateEntityType($name, $primaryKey);

    public function triggerDeleteEntityType($name, $primaryKey);

    public function triggerUserFullName();

    public function getAllUserPermissions($entityTypeId);
}