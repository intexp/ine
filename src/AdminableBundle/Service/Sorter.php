<?php

namespace AdminableBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class Sorter
{
    private $orderBy;
    private $orderDirection;
    private $request;

    public function __construct(Request $request, array $configuration = array())
    {
        $this->setConfiguration($configuration);

        $this->request = $request;
    }

    public function setConfiguration(array $configuration)
    {
        if (isset($configuration['orderBy'])) {
            $this->orderBy = $configuration['orderBy'];
        }

        if (isset($configuration['orderDirection'])) {
            $this->orderDirection = $configuration['orderDirection'];
        }
    }

    public function setOrder(&$queryBuilder)
    {
        $orderBy = $this->request->query->get('orderBy', $this->orderBy);
        $orderDirection = strtoupper($this->request->query->get('orderDirection', $this->orderDirection));

        $queryBuilder->orderBy('u.'.$orderBy, $orderDirection);
    }
}