<?php

namespace NotSoFarAway\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use NotSoFarAway\ApiBundle\Form\Type\ArticleType;

class ArticleController extends Controller
{
    /**
    * @Rest\View()
    * @Rest\Get("/articles")
    */
    public function getArticlesAction(Request $request)
    {
        $articles = $this->get('doctrine.orm.entity_manager')
                         ->getRepository('NotSoFarAwayApiBundle:Article')
                         ->findAll();

        return $articles;
    }

    /**
    * @Rest\View()
    * @Rest\Get("/articles/{id}")
    */
    public function getArticleAction(Request $request)
    {
        $article = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('NotSoFarAwayApiBundle:Article')
                        ->find($request->get('id'));

        if (empty($article)) {
            return new JsonResponse(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
        }

        return $article;
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/articles/{id}")
     */
    public function patchPlaceAction(Request $request)
    {
        $article = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('NotSoFarAwayApiBundle:Article')
                        ->find($request->get('id'));

        if (empty($article)) {
            return new JsonResponse(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(ArticleType::class, $article);

        $form->submit($request->request->all(), false);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($article);
            $em->flush();

            return $article;
        } else {
            return $form;
        }
    }
}
