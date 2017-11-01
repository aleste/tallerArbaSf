<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use AppBundle\Entity\Color;
use AppBundle\Form\ColorType;

class ColorController extends Controller
{
    /**
     * @Route("/catalogo/color", name="color_index")
     */
    public function indexAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $colores = $em->getRepository('AppBundle:Color')->findAll();

        return $this->render('color/index.html.twig', [
        	'colores' => $colores
        ]);
    }

    /**
    * @Route("/catalogo/color/new", name="color_new")    
    */
    public function newAction(Request $request)
    {
    	
        $color = new Color();
    	//Formulario en el controller
        /*$form = $this->createFormBuilder($color)
    		->add('nombre', TextType::class)    	
    		->getForm();*/

        //Form usando su class
        $form = $this->createForm(ColorType::class, $color);    

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //guarda el color en la db
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            $this->addFlash(
                'notice',
                'Color agregado con éxito.'
            );


            //retorna a la lista de colores
            return $this->redirectToRoute('color_index');            
         }   
        
    	return $this->render('color/new.html.twig', [
    		'form' => $form->createView()
    	]);    	
    }

    /**
    * @Route("/catalogo/color/{id}/edit", name="color_edit")
    */
    public function editAction(Color $color, Request $request)
    {
        $form = $this->createForm(ColorType::class, $color);
        $form->handleRequest($request);

        $formDelete = $this->crearFormDelete($color);        

        if ($form->isSubmitted() && $form->isValid()) {
            
            //guarda el color en la db
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            $this->addFlash(
                'notice',
                'Color actualizado con éxito.'
            );

            //retorna a la lista de colores
            return $this->redirectToRoute('color_index');            

        }

        return $this->render('color/edit.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView()
        ]);	
    }

    /**
    * @Route("/catalogo/color/{id}/delete", name="color_delete")
    * @Method({"DELETE"})
    */
    public function deleteAction(Color $color, Request $request)
    {
        $form = $this->crearFormDelete($color);        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($color);
            $em->flush();   

            $this->addFlash(
                'notice',
                'Color eliminado con éxito.'
            );


        }

        return $this->redirectToRoute('color_index');        
    }   

    private function crearFormDelete(Color $color) 
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('color_delete', array('id' => $color->getId())))
            ->setMethod('DELETE')
            ->getForm();       
    }

}
