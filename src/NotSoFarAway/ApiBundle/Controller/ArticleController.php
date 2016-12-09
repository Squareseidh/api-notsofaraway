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
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ArticleController extends Controller
{
    /**
    * @ApiDoc(
    *    description="Get all articles",
    *    output= { "class"=Article::class, "collection"=true, "groups"={"article"} }
    * )
    * @Rest\View(serializerGroups={"article"})
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
    * @ApiDoc(
    *    description="Get article detail",
    *    output= { "class"=Article::class, "groups"={"article"} }
    * )
    * @Rest\View(serializerGroups={"article"})
    * @Rest\Get("/articles/{id}")
    */
    public function getArticleAction(Request $request)
    {
        $article = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('NotSoFarAwayApiBundle:Article')
                        ->find($request->get('id'));

        if (empty($article)) {
            return View::create(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
        }

        return $article;
    }

    /**
     * @ApiDoc(
     *    description="Like article",
     *    output= { "class"=Article::class, "groups"={"article"} }
     * )
     * @Rest\View(serializerGroups={"article"})
     * @Rest\Patch("/articles/{id}")
     */
    public function patchArticleAction(Request $request)
    {
        $article = $this->get('doctrine.orm.entity_manager')
                        ->getRepository('NotSoFarAwayApiBundle:Article')
                        ->find($request->get('id'));

        if (empty($article)) {
            return View::create(['message' => 'Article not found'], Response::HTTP_NOT_FOUND);
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
