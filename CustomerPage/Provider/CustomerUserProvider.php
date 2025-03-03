<?php

namespace Pyz\Yves\CustomerPage\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use SprykerShop\Yves\CustomerPage\Plugin\Provider\CustomerUserProvider as SprykerCustomerUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method Pyz\Client\Customer\CustomerClient getClient()
 * @method \Pyz\Yves\CustomerPage\CustomerPageFactory getFactory()
 */
class CustomerUserProvider extends SprykerCustomerUserProvider{
    
    /**
     * @param string $phone
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByPhone(string $phone): UserInterface
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setPhone($phone);
        $customerTransfer = $this->getFactory()
                                ->getCustomerPageClient()    
                            ->getCustomerByPhone($customerTransfer);

        return $this->getFactory()->createSecurityUser($customerTransfer);
    }
}