<?php

namespace AdminableBundle\Service;

class Select
{
    private $entity;
    private $fields;

    public function __construct(array $entity, array $fields)
    {
        $this->entity = $entity;
        $this->fields = $fields;
    }

    public function addSelect(&$queryBuilder)
    {
        $selectableFields = array();

        foreach ($this->fields as $field) {
            $selectableFields[] = $this->entity['alias'] . '.' .$field;
        }

        $selectableFieldsString = implode(', ', $selectableFields);

        $queryBuilder->select($selectableFieldsString);

        $queryBuilder->from($this->entity['name'], $this->entity['alias']);
    }
}