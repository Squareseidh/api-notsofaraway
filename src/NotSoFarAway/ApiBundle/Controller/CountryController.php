<?php

namespace NotSoFarAway\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;

class CountryController extends Controller
{
    /**
    * @Rest\View(serializerGroups={"country"})
    * @Rest\Get("/countries")
    */
    public function getCountriesAction(Request $request)
    {
        $countries = $this->get('doctrine.orm.entity_manager')
                          ->getRepository('NotSoFarAwayApiBundle:Country')
                          ->findAll();

        return $countries;
    }

    /**
    * @Rest\View(serializerGroups={"country"})
    * @Rest\Get("/countries/{id}")
    */
    public function getCountryAction(Request $request)
    {
        $country = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('NotSoFarAwayApiBundle:Country')
                        ->find($request->get('id'));

        if (empty($country)) {
            return View::create(['message' => 'Contry not found'], Response::HTTP_NOT_FOUND);
        }

        return $country;
    }
}
