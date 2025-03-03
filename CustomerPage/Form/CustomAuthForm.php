<?php

namespace Pyz\Yves\CustomerPage\Form;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * @method \Pyz\Yves\CustomerPage\CustomerPageFactory getFactory()
 * @method \Pyz\Yves\CustomerPage\CustomerPageConfig getConfig()
 */
class CustomAuthForm extends AbstractType
{
    public const FORM_NAME = 'customAuthForm';
    public const FIELD_MOBILE_NUMBER = 'mobile_number';
    public const CUSTOM_AUTH = '/custom/auth/sso';

    protected const VALIDATION_NOT_BLANK_MESSAGE = 'validation.not_blank';
    protected const VALIDATION_MOBILE_MESSAGE = 'validation.invalid_mobile_number';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return static::FORM_NAME;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<string, mixed> $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setAction(static::CUSTOM_AUTH);

        $this->addMobileNumberField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addMobileNumberField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_MOBILE_NUMBER, HiddenType::class, [
            'label' => 'Phone number',
            'constraints' => [
                $this->createNotBlankConstraint(),
                $this->createMobileNumberConstraint(),
            ],
            'attr' => [
            'placeholder' => 'Phone number',
            ],
        ]);

        return $this;
    }

    /**
     * @return \Symfony\Component\Validator\Constraints\NotBlank
     */
    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank(['message' => static::VALIDATION_NOT_BLANK_MESSAGE]);
    }

    /**
     * @return \Symfony\Component\Validator\Constraints\Regex
     */
    protected function createMobileNumberConstraint(): Regex
    {
        return new Regex([
            'pattern' => '/^\+?[0-9]{10,15}$/',
            'message' => static::VALIDATION_MOBILE_MESSAGE,
        ]);
    }
}
