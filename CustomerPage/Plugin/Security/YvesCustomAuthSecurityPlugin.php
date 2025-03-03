<?php

namespace Pyz\Yves\CustomerPage\Plugin\Security;

use LogicException;
use Psr\Log\LoggerInterface;
use Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Yves\Security\Loader\AuthenticatorManager\AuthenticatorManager;
use SprykerShop\Yves\CustomerPage\Plugin\Security\YvesCustomerPageSecurityPlugin;
use Symfony\Component\Security\Guard\Firewall\GuardAuthenticationListener;
use Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;

/**
 *
 * @method \SprykerShop\Yves\CustomerPage\CustomerPageConfig getConfig()
 * @method \Pyz\Yves\CustomAuth\CustomAuthFactory getFactory()
 */
class YvesCustomAuthSecurityPlugin extends YvesCustomerPageSecurityPlugin
{

    /**
     * @var string
     */
    protected const SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR = 'security.secured.custom.authenticator';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_AUTHENTICATION_LISTENER_GUARD_PROTO = 'security.authentication_listener.guard._proto';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_AUTHENTICATION_GUARD_HANDLER = 'security.authentication.guard_handler';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_AUTHENTICATION_PROVIDER_GUARD_PROTO = 'security.authentication_provider.guard._proto';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_ENTRY_POINT_GUARD_PROTO = 'security.entry_point.guard._proto';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_AUTHENTICATION_MANAGER = 'security.authentication_manager';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_USER_CHECKER = 'security.user_checker';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_TOKEN_STORAGE = 'security.token_storage';

    /**
     * @param \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface $securityBuilder
     *
     * @return \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface
     */

    /**
     * @var string
     */
    protected const SERVICE_LOGGER = 'logger';

    /**
     * @uses \Spryker\Zed\EventDispatcher\Communication\Plugin\Application\EventDispatcherApplicationPlugin::SERVICE_DISPATCHER
     *
     * @var string
     */
    protected const SERVICE_DISPATCHER = 'dispatcher';

    /**
     * @var string
     */
    protected const SERVICE_SECURITY_AUTHENTICATION_PROVIDERS = 'security.authentication_providers';
    
     /*
    protected function addFirewalls(SecurityBuilderInterface $securityBuilder): SecurityBuilderInterface
    {
        return $securityBuilder->addFirewall(
            SharedCustomerPageConfig::SECURITY_FIREWALL_NAME,
            [
                'anonymous'=>true,
                'pattern' => '^/(en|de|fr)/custom/sso/[a-zA-Z0-9]+$',
                // 'form' => [
                //     'login_path' => '/custom/sso/',
                //     // 'check_path' => static::HOMEPAGE_PATH . '/login_check',
                //     'authenticators' => [
                //         static::SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR,
                //     ],
                  // ],
                'guard' => [
                    'authenticators' => [
                        static::SECURITY_CUSTOMER_CUSTOM_AUTHENTICATOR,
                    ],
                ],
                'stateless'=> false,
                // 'authenticator' => static::SECURITY_CUSTOMER_LOGIN_FORM_AUTHENTICATOR,
                'users' => function () {
                    return new CustomerUserProvider();
                },
                'logout' => [
                    'logout_path' => '/logout',
                    'target_url' => '/',
                ],
            ]
        );
    }
    */

    /**
     * Custom implementation of the extend method.
     *
     * @param \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface $securityBuilder
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Spryker\Shared\SecurityExtension\Configuration\SecurityBuilderInterface
     */
    public function extend(SecurityBuilderInterface $securityBuilder, ContainerInterface $container): SecurityBuilderInterface
    {        
        return $this->getFactory()->createSecurityBuilderExpander()->extend($securityBuilder, $container);
    }

}
