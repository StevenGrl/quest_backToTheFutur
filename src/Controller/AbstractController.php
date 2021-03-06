<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 11/10/17
 * Time: 15:38
 * PHP version 7
 */

namespace BackToTheFutur\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

abstract class AbstractController
{

    protected $twig;

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $loader     = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment(
            $loader,
            [
                'cache'             => !APP_DEV,
                'debug'             => APP_DEV,
                'strict_variables'  => APP_DEV,
            ]
        );
        $this->twig->addExtension(new \Twig_Extension_Debug());
    }
}
