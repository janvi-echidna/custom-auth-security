<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CustomerPage;

use Pyz\Yves\CustomerPage\Authenticator\CustomAuthenticator;
use Pyz\Yves\CustomerPage\Expander\SecurityBuilderExpander;
use Pyz\Yves\CustomerPage\Form\FormFactory;
use Pyz\Yves\CustomerPage\Provider\CustomerUserProvider;
use Spryker\Client\Session\SessionClientInterface;
use SprykerShop\Yves\CustomerPage\CustomerPageConfig;
use SprykerShop\Yves\CustomerPage\CustomerPageFactory as SprykerCustomerPageFactory;
use SprykerShop\Yves\CustomerPage\Expander\SecurityBuilderExpanderInterface;
use SprykerShop\Yves\CustomerPage\Plugin\Security\CustomerPageSecurityPlugin;
use SprykerShop\Yves\CustomerPage\Plugin\Subscriber\InteractiveLoginEventSubscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

/**
 * method \SprykerShop\Yves\CustomerPage\CustomerPageConfig getConfig()
 * 
 */
class CustomerPageFactory extends SprykerCustomerPageFactory
{
    /**
     * @return \Spryker\Client\Session\SessionClientInterface
     */
    public function getSessionClient(): SessionClientInterface
    {
        return $this->getProvidedDependency(CustomerPageDependencyProvider::CLIENT_SESSION);
    }

    /**
     * @return \SprykerShop\Yves\CustomerPage\Form\FormFactory
    */
    public function createCustomerFormFactory()
    {
        return new FormFactory();
    }

    /**
     * @return \SprykerShop\Yves\CustomerPage\Expander\SecurityBuilderExpanderInterface
     */
    public function createSecurityBuilderExpander(): SecurityBuilderExpanderInterface
    {
        // Ensure compatibility by maintaining the expected return type
        if (class_exists(AuthenticationProviderManager::class)) {
            return new CustomerPageSecurityPlugin();
        }

        return new SecurityBuilderExpander(
            $this->createCustomerSecurityOptionsBuilder(),
            $this->getCustomerClient(),
            $this->getCustomerConfig(),
            $this->createInteractiveLoginEventSubscriber(),
            $this->createCustomerLoginAuthenticator(),
            $this->createUserCheckerListener(),
        );
    }

    /**
     * @return \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    public function createInteractiveLoginEventSubscriber(): EventSubscriberInterface
    {
        return new InteractiveLoginEventSubscriber();
    }

    /**
     * @return \Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface
    */
    public function createCustomerLoginAuthenticator(): AuthenticatorInterface
    {
        return new CustomAuthenticator(
            $this->createCustomerUserProvider(),
            $this->createCustomerAuthenticationSuccessHandler(),
            $this->createCustomerAuthenticationFailureHandler(),
            $this->getRouter(),
        );
    }

    /**
     * Method getCustomerConfig
     *
     * @return CustomerPageConfig
     */
    public function getCustomerConfig()
    {
        return new CustomerPageConfig();
    }
    
    /**
     * createCustomerUserProvider
     *
     * @return CustomerUserProvider
     */
    public function createCustomerUserProvider()
    {
        return new CustomerUserProvider();
    }

    public function getCustomerPageClient()
    {
        return $this->getProvidedDependency(CustomerPageDependencyProvider::CUSTOMER_CLIENT_PAGE);
    }
}
