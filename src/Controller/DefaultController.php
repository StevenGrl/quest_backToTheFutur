<?php

namespace BackToTheFutur\Controller;

class DefaultController extends AbstractController
{
    /**
     * @return string
     */
    public function index()
    {
        return $this->twig->render('index.html.twig');
    }

    /**
     * Display checkpoint listing
     *
     * @return string
     */
    public function error(int $error)
    {
        return $this->twig->render('error.html.twig', ['error' => $error]);
    }
}
