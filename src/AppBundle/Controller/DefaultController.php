<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Autor;
use AppBundle\Entity\Komentar;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction($ime)
    {
		$em = $this->getDoctrine()->getManager();
		$q = $em->createQuery('SELECT DISTINCT a.ime FROM AppBundle:Autor a ORDER BY a.ime ASC');
		
		$autor = $q->getResult();
		
		return $this->render('default\index.html.twig', array('autor' => $autor));
	}
}
