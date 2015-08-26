<?php

namespace AdminableBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class Filterer
{
    private $filters = array();
    private $request;

    public function __construct(Request $request, array $configuration = array())
    {
        $this->setConfiguration($configuration);

        $this->request = $request;
    }

    public function setConfiguration(array $configuration)
    {
        if (isset($configuration['filters']) && is_array($configuration['filters'])) {
            $this->filters = $configuration['filters'];
        }
    }

    public function applyFilters(&$queryBuilder)
    {
        foreach ($this->filters as $filter) {
            $value = $this->request->query->get($filter['name'], "");

            if ($value && !empty($value)) {
                switch ($filter['queryType']) {
                    case 'like':
                        $expr = $queryBuilder->expr()->like('u.'.$filter['name'], $queryBuilder->expr()->literal('%'.$value.'%'));
                        break;
                    case 'eq':
                        $expr = $queryBuilder->expr()->eq('u.'.$filter['name'], $value);
                        break;
                    default:
                        return false;
                }

                $whereMethod = $filter['where'] . "Where";

                $queryBuilder->$whereMethod($expr);
            }
        }
    }
}