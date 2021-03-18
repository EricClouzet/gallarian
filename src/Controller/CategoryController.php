<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        //$categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        //dd($categories);

        return $this->render('category/index.html.twig', [
            'categories'=>$categoryRepository->findAll(),
            //'categories' => $categories,
            //'categories' => $this->getDoctrine()->getRepository(Category::class)->findAll()
        ]);
    }


}
