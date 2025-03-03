<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CustomerPage\Controller;


use Generated\Shared\Transfer\SsoTransfer;
use SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SprykerShop\Yves\CustomerPage\Controller\AuthController as SprykerAuthController;
/**
 * @method \Pyz\Client\CustomerPage\CustomAuthClientInterface getClient()
 * @method \Pyz\Yves\CustomerPage\CustomerPageFactory getFactory()
 */
class AuthController extends SprykerAuthController
{
    /**
     * Handles the SSO login process.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string $token
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function authAction(Request $request): Response
    {   
        // if(!$this->isLoggedInCustomer()) {
        //     return new Response('Customer is not logged in.', Response::HTTP_UNAUTHORIZED);
        // }
        dd($request->request->all());
        $ssoTransfer =  new SsoTransfer();
        $ssoTransfer->setToken($token);

        if (!$this->isValidToken($ssoTransfer)) {
            // return new Response('Invalid token.', Response::HTTP_UNAUTHORIZED);
        } else {
            // return new Response('Authenticated.', Response::HTTP_OK);
        }

        
        //$this->loginCustomer($customer);

        // Redirect to the home page or desired location
        //return $this->redirect('/');
    }

        /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function mobileLoginAction(Request $request)
    {
        $loginFormView = $this->getFactory()->getFormFactory()->createCustomAuthForm();

        return $this->view(['mobileLoginForm'=>$loginFormView->createView()], [], '@CustomAuth/views/login/login.twig');
    }

    /**
     * @return bool
     */
    protected function isLoggedInCustomer()
    {
        return $this->getFactory()->getCustomerClient()->isLoggedIn();
    }

    /**
     *
     * @param SsoTransfer $token
     * @return bool
     */
    protected function isValidToken(SsoTransfer $token): bool
    {
        return false;
        // Validate the token using the client
        $ssoTransfer = $this->getClient()->validateSsoToken($token);
        return $ssoTransfer->getIsValid();
    }

    public function loginAction()
    {   
        if (!$this->isLoggedInCustomer()) {
            $viewData = $this->executeLoginAction();

            return $this->view($viewData, [], '@CustomerPage/views/login/login.twig');
        }

        $redirectUrl = $this->getRedirectUrlFromPlugins();
        if ($redirectUrl) {
            return $this->redirectResponseExternal($redirectUrl);
        }

        return $this->redirectResponseInternal(CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_OVERVIEW);
    }

        /**
     * @return array
     */
    protected function executeLoginAction(): array
    {
        $loginForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->getLoginForm();

        $registerForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->getRegisterForm();

        $loginFormView = $this->getFactory()->createCustomerFormFactory()->createCustomAuthFormSocial();

        return [
            'loginForm' => $loginForm->createView(),
            'registerForm' => $registerForm->createView(),
            'mobileLoginForm'=>$loginFormView->createView()
        ];
    }
}
