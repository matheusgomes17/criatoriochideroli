<?php

namespace SKT\Http\Controllers\Frontend\Auth;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails, SEOTools, HasDefaultSEO;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $route = route('frontend.auth.password.email');

        $this->seo()->setTitle('Recuperar a senha');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);

        $this->getDefaultSEO();

        return view('frontend.auth.passwords.email');
    }
}
