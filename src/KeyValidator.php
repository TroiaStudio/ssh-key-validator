<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator;

use TroiaStudio\SshKeyValidator\Validators\Validator;

class KeyValidator
{
    /** @var Validator[] */
    private array $validators;

    /**
     * @param Validator[] $validators
     */
    public function __construct(array $validators)
    {
        foreach ($validators as $validator) {
            assert($validator instanceof Validator);
        }

        $this->validators = $validators;
    }

    public function validate(string $key): bool
    {
        foreach ($this->validators as $validator) {
            if ($validator->validate($key)) {
                return true;
            }
        }

        return false;
    }
}