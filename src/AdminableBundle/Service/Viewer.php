<?php

namespace AdminableBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class Viewer extends ContainerAware
{
    private $configuration;
    private $request;
    private $query;
    private $paginatedResults;

    public function configure(array $configuration = array())
    {
        $this->configuration = $configuration;

        $entityManager = $this->container->get('doctrine.orm.entity_manager');

        $queryBuilder = $entityManager->createQueryBuilder();

        $select = new Select($configuration['entity'], $configuration['fields']);
        $select->addSelect($queryBuilder);

        $filterer = new Filterer($this->request);
        $filterer->setConfiguration(array(
            'filters' => $configuration['filterOptions']['filters'],
        ));

        $filterer->applyFilters($queryBuilder);

        $sorter = new Sorter($this->request);
        $sorter->setConfiguration($configuration['sortOptions']['defaults']);
        $sorter->setOrder($queryBuilder);

        dump($queryBuilder->getQuery());

        $paginator = new Paginator($this->request);
        $paginator->setContainer($this->container);
        $paginator->setConfiguration($configuration['paginationOptions']['defaults']);

        $paginatedResults = $paginator->paginate($queryBuilder);

        $this->paginatedResults = $paginatedResults;

        return $this;
    }

    public function getPresentationData()
    {
        return array(
            'paginatedResults' => $this->paginatedResults,
            'fields' => $this->configuration['fields'],
            'filters' => $this->configuration['filterOptions']['filters'],
        );
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     * @return $this
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }
}