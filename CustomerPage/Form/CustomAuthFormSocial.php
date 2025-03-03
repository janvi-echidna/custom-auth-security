<?php

namespace Pyz\Yves\CustomerPage\Form;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

/**
 * @method \Pyz\Yves\CustomerPage\CustomerPageFactory getFactory()
 * @method \Pyz\Yves\CustomerPage\CustomerPageConfig getConfig()
 */
class CustomAuthFormSocial extends AbstractType
{
    public const FORM_NAME = 'customAuthFormSocial';
    public const FIELD_EMAIL_ID = 'email_id';
    public const CUSTOM_AUTH = '/custom/auth/sso';

    protected const VALIDATION_NOT_BLANK_MESSAGE = 'validation.not_blank';
    protected const VALIDATION_EMAIL_MESSAGE = 'validation.invalid_email';

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

        $this->addEmailIdField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addEmailIdField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_EMAIL_ID, HiddenType::class, [
            'label' => 'Email ID',
            'constraints' => [
                $this->createNotBlankConstraint(),
                $this->createEmailConstraint(),
            ],
            'attr' => [
                'placeholder' => 'Email ID',
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
     * @return \Symfony\Component\Validator\Constraints\Email
     */
    protected function createEmailConstraint(): Email
    {
        return new Email(['message' => static::VALIDATION_EMAIL_MESSAGE]);
    }
}
