<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DeliveryController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
    	// Array de cervezas para pasar a la vista.
        //$cervezas = ['Quilmes', 'Palermo', 'Corona', 'Patagonia', 'Imperial'];

        return $this->render('delivery/index.html.twig', [
        //	'cervezas' => $cervezas
        ]);
    }

    /**
     * @Route("/finalizar", name="finalizar")
     */
    public function finalizarAction(Request $request)
    {
        
        
        return $this->render('delivery/finalizarPedido.html.twig', [
            //'cervezas' => $cervezas
        ]);
    }    

    /**
     * @Route("/catalogo", name="catalogo")
     */
    public function catalogoAction(Request $request)
    {

        return $this->render('delivery/catalogo.html.twig', []);

    }    

}
