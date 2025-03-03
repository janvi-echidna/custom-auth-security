<?php

namespace Pyz\Yves\CustomerPage\Expander;

use SprykerShop\Yves\CustomerPage\CustomerPageConfig;
use Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface;
use Spryker\Service\Container\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use SprykerShop\Yves\CustomerPage\Builder\CustomerSecurityOptionsBuilderInterface;
use SprykerShop\Yves\CustomerPage\Dependency\Client\CustomerPageToCustomerClientInterface;
use SprykerShop\Yves\CustomerPage\Expander\SecurityBuilderExpander as SprykerSecurityBuilderExpander;
use SprykerShop\Yves\CustomerPage\Plugin\Provider\CustomerUserProvider;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

class SecurityBuilderExpander extends SprykerSecurityBuilderExpander
{
    /**
     * @var string
     */
    protected const SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR = 'security.secured.custom.authenticator';
    protected const SECURITY_FIREWALL_NAME = 'custom_sso';
    protected const ROUTE_LOGOUT = '/logout';

    /**
     * @var \SprykerShop\Yves\CustomerPage\Builder\CustomerSecurityOptionsBuilderInterface
     */
    protected CustomerSecurityOptionsBuilderInterface $customerSecurityOptionsBuilder;

    /**
     * @var \SprykerShop\Yves\CustomerPage\Dependency\Client\CustomerPageToCustomerClientInterface
     */
    protected CustomerPageToCustomerClientInterface $customerClient;

    /**
     * @var \SprykerShop\Yves\CustomerPage\CustomerPageConfig
     */
    protected CustomerPageConfig $customerPageConfig;

    /**
     * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    protected EventSubscriberInterface $eventSubscriber;

    /**
     * @var \Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface
     */
    protected AuthenticatorInterface $authenticator;

    /**
     * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    protected EventSubscriberInterface $userCheckerListener;

    /**
     * @param \SprykerShop\Yves\CustomerPage\Builder\CustomerSecurityOptionsBuilderInterface $customerSecurityOptionsBuilder
     * @param \SprykerShop\Yves\CustomerPage\Dependency\Client\CustomerPageToCustomerClientInterface $customerClient
     * @param \SprykerShop\Yves\CustomerPage\CustomerPageConfig $customerPageConfig
     * @param \Symfony\Component\EventDispatcher\EventSubscriberInterface $eventSubscriber
     * @param \Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface $authenticator
     * @param \Symfony\Component\EventDispatcher\EventSubscriberInterface $userCheckerListener
     */
    public function __construct(
        CustomerSecurityOptionsBuilderInterface $customerSecurityOptionsBuilder,
        CustomerPageToCustomerClientInterface $customerClient,
        CustomerPageConfig $customerPageConfig,
        EventSubscriberInterface $eventSubscriber,
        AuthenticatorInterface $authenticator,
        EventSubscriberInterface $userCheckerListener
    ) {
        parent::__construct(
            $customerSecurityOptionsBuilder,
            $customerClient,
            $customerPageConfig,
            $eventSubscriber,
            $authenticator,
            $userCheckerListener
        );
    }

    /**
     * @param \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface $securityBuilder
     *
     * @return \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface
     */
    protected function addFirewalls(SecurityBuilderInterface $securityBuilder): SecurityBuilderInterface
    {
        return $securityBuilder->addFirewall(
            static::SECURITY_FIREWALL_NAME,
            [
                // 'anonymous' => true,
                // 'pattern' => '^/(en|de|fr)/custom/sso/[a-zA-Z0-9]+$',
                'pattern' => '^/',
                'form' => [
                    'authenticators' => [
                        static::SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR,
                    ],
                ],
                'security' => true,
                'stateless'=> false,
                // 'authenticator' => static::SECURITY_CUSTOMER_LOGIN_FORM_AUTHENTICATOR,
                'users' => function () {
                    return new CustomerUserProvider();
                },
                'logout' => [
                    'logout_path' => static::ROUTE_LOGOUT,
                    'target_url' => '/',
                ],
            ]
        );
    }

    /**
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return void
     */
    protected function addAuthenticator(ContainerInterface $container): void
    {
        $container->set(static::SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR, function () {
            return $this->authenticator;
        });
    }
}
