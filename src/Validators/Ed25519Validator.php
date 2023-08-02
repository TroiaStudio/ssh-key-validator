<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class Ed25519Validator extends AbstractValidator
{
    public function validate(string $key): bool
    {
        return $this->validateByPattern($key, SSH_KEY::ED25519);
    }
}