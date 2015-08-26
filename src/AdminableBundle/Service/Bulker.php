<?php

namespace AdminableBundle\Service;


class Bulker
{
    private $operations = array();

    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     * @return $this
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;

        return $this;
    }

    /**
     * @param string $operation
     * @return $this
     */
    public function addOperation($operation)
    {
        $this->operations[] = $operation;

        return $this;
    }
}