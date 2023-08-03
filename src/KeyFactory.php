<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator;

use TroiaStudio\SshKeyValidator\Enums\SshKey;
use TroiaStudio\SshKeyValidator\Validators\DSSValidator;
use TroiaStudio\SshKeyValidator\Validators\EcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\Ed25519Validator;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SkEcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SKEd25519Validator;
use TroiaStudio\SshKeyValidator\Validators\Validator;

class KeyFactory
{

    /**
     * @param Validator[] $validators
     */
    public static function create(string $key, array $validators = []): ?Key
    {
        if (count($validators) === 0) {
            $validators = [
                new DSSValidator(),
                new EcdsaValidator(),
                new Ed25519Validator(),
                new RsaValidator(),
                new SkEcdsaValidator(),
                new SKEd25519Validator(),
            ];
        }

        foreach ($validators as $validator) {
            try {
                return $validator->create($key);
            } catch (ValidationException) {
                continue;
            }
        }

        return null;
    }

    /**
     * @internal
     * @param array<int, array<int, string>> $data
     */
    public static function createFromValidation(array $data, SshKey $type): Key
    {
        return new Key($type, $data[2][0], $data[1][0], trim($data[3][0]));
    }

}
