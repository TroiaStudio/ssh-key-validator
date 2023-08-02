<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

abstract class AbstractValidator implements Validator
{
    protected function validateByPattern(string $key, SSH_KEY $pattern): bool
    {
        $result = preg_match($pattern->value, $key);

        if ($result === false) {
            return false;
        }

        return true;
    }
}
