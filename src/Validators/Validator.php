<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Key;
use TroiaStudio\SshKeyValidator\ValidationException;

interface Validator
{

    public function validate(string $key): bool;

    /**
     * @throws ValidationException
     */
    public function create(string $key): Key;

}
