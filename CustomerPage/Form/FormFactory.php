<?php

namespace Pyz\Yves\CustomerPage\Form;
use SprykerShop\Yves\CustomerPage\Form\FormFactory as SprykerFormFactory;
use Pyz\Yves\CustomerPage\Form\CustomAuthForm;

class FormFactory extends SprykerFormFactory
{
    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createCustomAuthForm()
    {
        return $this->getFormFactory()->create(CustomAuthForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createCustomAuthFormSocial()
    {
        return $this->getFormFactory()->create(CustomAuthFormSocial::class);
    }
}