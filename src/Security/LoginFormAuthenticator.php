<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public function authenticate(Request $request): Passport
    {
        $pseudo = $request->request->get('pseudo', '');

        $request->getSession()->set(Security::LAST_USERNAME, $pseudo);
        //un DD me permet de voir que mes paramètres sont bien récupérés
        // dd($request);
        return new Passport(
            new UserBadge($pseudo),
            new PasswordCredentials($request->request->get('mdp', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        //ajout d'un flash
        $request->getSession()->getFlashBag()->add(
            'success',
            'Bienvenue '.$token->getUser()->getFullName().'!'
        );
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        // generate(maRoute):
        return new RedirectResponse($this->urlGenerator->generate('app_account'));
        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

        //sinon, pour choisir la route et le message je récupère (copie/colle) cette partie de code dans vendor/symfony/security-http/AbstractLoginFormAuthentificator dont j'hérite ici, afin de le modifier:
    /**
     * Override to control what happens when the user hits a secure page
     * but isn't logged in yet.
     */
    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        //je rajoute la fonction flash que je récupère grâce à la requête qui a accès à la session dans laquelle se trouve la fonction flash
        $request->getSession()->getFlashBag()->add('danger', 'Merci de vous identifier pour continuer.');
        $url = $this->getLoginUrl($request);

        return new RedirectResponse($url);
    }
    
}
