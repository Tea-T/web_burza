<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Autor;
use AppBundle\Entity\Komentar;
use AppBundle\Form\AutorType;
use AppBundle\Form\KomentarType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

class KomentariController extends Controller
{
	
	/**
	*
	* @Route("/form", name="form")
	*
	*/
	
	
	public function newAction(Request $request) {
		
		$date = date("Y-m-d H:i:s");
		$autor = new Autor();
		$komentar = new Komentar();
		$komentar->setVrijeme(new \DateTime($date));
		
		
		$form = $this->createFormBuilder()
			->add('ime', TextType::class)
			->add('tekst', TextType::class)
			->add('save', SubmitType::class, array('label' => 'save'))
			->getForm();

		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid()) {
			$ime = $form['ime']->getData();
			$text = $form['tekst']->getData();
			
			$autor->setIme($ime);
			$komentar->setTekst($text);
			$komentar->setAutor($ime);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($autor);
			$em->persist($komentar);
			$em->flush();
			
			$this->addFlash(
				'notice',
				'Hvala na komentaru!'
			);
		
			return $this->redirectToRoute('homepage');
			
			
		}
		
		return $this->render('default/form.html.twig', array('form' => $form->createView(),
		));
		
		
	}
	
	/**
	*
	* @Route("/{ime}", name="show")
	*/
	public function showAction (Request $request, $ime) {
		$em = $this->get('doctrine.orm.entity_manager');
		
		$qb = $em->createQuery('SELECT k.autor, k.tekst, k.vrijeme FROM AppBundle:Komentar k WHERE k.autor = :ime');
		$qb->setParameter('ime', $ime);
		
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($qb, $request->query->getInt('page', 1),10);
		
		
		return $this->render('default\show.html.twig', array('pagination' => $pagination));
		
		
	}
	
	
}
