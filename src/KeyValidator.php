<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator;

use TroiaStudio\SshKeyValidator\Validators\DSSValidator;
use TroiaStudio\SshKeyValidator\Validators\EcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\Ed25519Validator;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SkEcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SKEd25519Validator;
use TroiaStudio\SshKeyValidator\Validators\Validator;

class KeyValidator
{
    /** @var Validator[] */
    private array $validators;

    /**
     * @param Validator[] $validators
     */
    public function __construct(array $validators = [])
    {
        foreach ($validators as $validator) {
            assert($validator instanceof Validator);
        }

        $this->validators = $validators;
    }

    public static function createAll(): static
    {
        $validators = [
            new DSSValidator(),
            new EcdsaValidator(),
            new Ed25519Validator(),
            new RsaValidator(),
            new SkEcdsaValidator(),
            new SKEd25519Validator(),
        ];

        return new static($validators);
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