<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class SkEcdsaSha2Nitstp256Validator extends AbstractValidator
{
    public function validate(string $key): bool
    {
        return $this->validateByPattern($key, SSH_KEY::SK_ECDSA_SHA2_NITSTP256);
    }
}