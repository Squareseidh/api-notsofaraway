<?php

namespace NotSoFarAway\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AuthorController extends Controller
{
    /**
    * @ApiDoc(
    *    description="Get all authors",
    *    output= { "class"=Author::class, "collection"=true, "groups"={"author"} }
    * )
    * @Rest\View(serializerGroups={"author"})
    * @Rest\Get("/authors")
    */
    public function getAuthorsAction(Request $request)
    {
        $authors = $this->get('doctrine.orm.entity_manager')
                         ->getRepository('NotSoFarAwayApiBundle:Author')
                         ->findAll();

        return $authors;
    }

    /**
    * @ApiDoc(
    *    description="Get author detail",
    *    output= { "class"=Author::class, "groups"={"author"} }
    * )
    * @Rest\View(serializerGroups={"author"})
    * @Rest\Get("/authors/{id}")
    */
    public function getAuthorAction(Request $request)
    {
        $author = $this->get('doctrine.orm.entity_manager')
                       ->getRepository('NotSoFarAwayApiBundle:Author')
                       ->find($request->get('id'));

        if (empty($author)) {
            return View::create(['message' => 'Author not found'], Response::HTTP_NOT_FOUND);
        }

        return $author;
    }
}
