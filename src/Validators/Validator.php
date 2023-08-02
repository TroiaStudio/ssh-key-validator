<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

interface Validator
{
    public function validate(string $key): bool;
}