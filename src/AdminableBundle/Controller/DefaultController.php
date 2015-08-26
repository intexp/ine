<?php

namespace AdminableBundle\Controller;

use AdminableBundle\Service\Viewer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/test2")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index2Action(Request $request)
    {
        $configuration = array(
            'entity' => array(
                'name' => 'UserBundle\Entity\User',
                'alias' => 'u',
            ),
            'fields' => array(
                'username',
                'email',
                'enabled',
            ),
            'filterOptions' => array(
                'filters' => array(
                    'username' => array(
                        'name' => 'username',
                        'title' => 'Username',
                        'where' => 'or',
                        'required' => false,
                        'queryType' => 'like',
                        'formType' => 'text',
                    ),
                    'email' => array(
                        'name' => 'email',
                        'title' => 'Email',
                        'where' => 'or',
                        'required' => false,
                        'queryType' => 'like',
                        'formType' => 'text',
                    ),
                    'enabled' => array(
                        'name' => 'enabled',
                        'title' => 'Enabled',
                        'where' => 'and',
                        'required' => false,
                        'queryType' => 'eq',
                        'formType' => 'checkbox',
                    ),
                ),
            ),
            'sortOptions' => array(
                'defaults' => array(
                    'orderBy' => 'username',
                    'orderDirection' => 'ASC',
                ),
            ),
            'paginationOptions' => array(
                'defaults' => array(
                    'page' => 1,
                    'perPage' => 5,
                ),
            ),
        );

        $viewer = new Viewer();
        $viewer->setContainer($this->container);
        $viewer
            ->setRequest($request)
            ->configure($configuration)
        ;

        dump($viewer->getQuery());

        return $this->render('test/test.html.twig', array(
            'viewer' => $viewer->getPresentationData(),
        ));
    }
}
