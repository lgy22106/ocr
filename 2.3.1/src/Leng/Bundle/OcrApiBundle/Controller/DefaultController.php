<?php

namespace Leng\Bundle\OcrApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

//  
use TesseractOCR;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LengOcrApiBundle:Default:index.html.twig', array('name' => $name));
    }

    public function resultAction() {
        $ocr = new TesseractOCR();
    	$text = $ocr->recognize('web/hello.png');
    	$response = new Response(json_encode(array('value' => $text)));
    	$response->headers->set('Content-Type', 'application/json');
    	return $response;
    }
}
