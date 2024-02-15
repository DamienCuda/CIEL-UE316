<?php

namespace App\Controller;
use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{

    #[Route('/product', name: 'app_product', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }
    #[Route('/product/{id}', name: 'app_product_details')]
    public function singleProduct($id): Response
    {
        return $this->render('product/product_detail.html.twig', [
            'product' => $productRepository->findOne($id)
        ]);
    }
}
