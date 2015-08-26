<?php

namespace AdminableBundle\Service;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Paginator extends ContainerAware
{
    private $page;
    private $perPage;
    private $request;

    public function __construct(Request $request, array $configuration = array())
    {
        $this->setConfiguration($configuration);

        $this->request = $request;
    }

    public function setConfiguration(array $configuration)
    {
        if (isset($configuration['page'])) {
            $this->page = $configuration['page'];
        }

        if (isset($configuration['perPage'])) {
            $this->perPage = $configuration['perPage'];
        }
    }

    public function paginate($queryBuilder)
    {
        $page = $this->request->query->getInt('page', $this->page);
        $perPage = $this->request->query->getInt('perPage', $this->perPage);

        $paginator = $this->container->get('knp_paginator');

        $pagenatedQuery = $paginator->paginate($queryBuilder->getQuery(), $page, $perPage);

        return $pagenatedQuery;
    }
}