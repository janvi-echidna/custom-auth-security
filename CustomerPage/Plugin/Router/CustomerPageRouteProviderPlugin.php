<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CustomerPage\Plugin\Router;

use Spryker\Yves\Router\Route\RouteCollection;
use SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin as RouterCustomerPageRouteProviderPlugin;


class CustomerPageRouteProviderPlugin extends RouterCustomerPageRouteProviderPlugin
{
    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_LOGIN} instead.
     *
     * @var string
     */
    protected const ROUTE_LOGIN = 'login';

    /**
     * @var string
     */
    public const ROUTE_NAME_LOGIN = 'login';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_LOGOUT} instead.
     *
     * @var string
     */
    protected const ROUTE_LOGOUT = 'logout';

    /**
     * @var string
     */
    public const ROUTE_NAME_LOGOUT = 'logout';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_REGISTER} instead.
     *
     * @var string
     */
    protected const ROUTE_REGISTER = 'register';

    /**
     * @var string
     */
    public const ROUTE_NAME_REGISTER = 'register';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_PASSWORD_FORGOTTEN} instead.
     *
     * @var string
     */
    protected const ROUTE_PASSWORD_FORGOTTEN = 'password/forgotten';

    /**
     * @var string
     */
    public const ROUTE_NAME_PASSWORD_FORGOTTEN = 'password/forgotten';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_PASSWORD_RESTORE} instead.
     *
     * @var string
     */
    protected const ROUTE_PASSWORD_RESTORE = 'password/restore';

    /**
     * @var string
     */
    public const ROUTE_NAME_PASSWORD_RESTORE = 'password/restore';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_OVERVIEW} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_OVERVIEW = 'customer/overview';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_OVERVIEW = 'customer/overview';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_PROFILE} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_PROFILE = 'customer/profile';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_PROFILE = 'customer/profile';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_ADDRESS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_ADDRESS = 'customer/address';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_ADDRESS = 'customer/address';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_NEW_ADDRESS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_NEW_ADDRESS = 'customer/address/new';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_NEW_ADDRESS = 'customer/address/new';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_UPDATE_ADDRESS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_UPDATE_ADDRESS = 'customer/address/update';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_UPDATE_ADDRESS = 'customer/address/update';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_DELETE_ADDRESS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_DELETE_ADDRESS = 'customer/address/delete';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_DELETE_ADDRESS = 'customer/address/delete';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_REFRESH_ADDRESS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_REFRESH_ADDRESS = 'customer/address/refresh';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_REFRESH_ADDRESS = 'customer/address/refresh';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_ORDER} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_ORDER = 'customer/order';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_ORDER = 'customer/order';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_ORDER_DETAILS} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_ORDER_DETAILS = 'customer/order/details';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_ORDER_DETAILS = 'customer/order/details';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_DELETE} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_DELETE = 'customer/delete';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_DELETE = 'customer/delete';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CUSTOMER_DELETE_CONFIRM} instead.
     *
     * @var string
     */
    protected const ROUTE_CUSTOMER_DELETE_CONFIRM = 'customer/delete/confirm';

    /**
     * @var string
     */
    public const ROUTE_NAME_CUSTOMER_DELETE_CONFIRM = 'customer/delete/confirm';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_TOKEN} instead.
     *
     * @var string
     */
    protected const ROUTE_TOKEN = 'token';

    /**
     * @var string
     */
    public const ROUTE_NAME_TOKEN = 'token';

    /**
     * @deprecated Use {@link \SprykerShop\Yves\CustomerPage\Plugin\Router\CustomerPageRouteProviderPlugin::ROUTE_NAME_CONFIRM_REGISTRATION} instead.
     *
     * @var string
     */
    protected const ROUTE_CONFIRM_REGISTRATION = 'register/confirm';

    /**
     * @var string
     */
    public const ROUTE_NAME_CONFIRM_REGISTRATION = 'register/confirm';

    /**
     * @var string
     */
    protected const TOKEN_PATTERN = '[a-zA-Z0-9-_\.]+';
    /**
     * @var string
     */
    protected const ROUTE_NAME_SSO = 'customer-sso';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @api
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {   
        // $routeCollection = parent::addRoutes($routeCollection);
        $routeCollection = $this->addLoginRoute($routeCollection);
        $routeCollection = $this->addSsoRoute($routeCollection);
        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addLoginRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/login', 'CustomerPage', 'Auth', 'loginAction');
        $routeCollection->add(static::ROUTE_NAME_LOGIN, $route);

        return $routeCollection;
    }

    /**
     * Creates the SSO route.
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addSsoRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/custom/sso/{token}', 'CustomAuth', 'SSO', 'ssoAction');
        $routeCollection->add(static::ROUTE_NAME_SSO, $route);
    
        return $routeCollection;
    }
}
