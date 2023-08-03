<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SshKey;
use TroiaStudio\SshKeyValidator\Key;
use TroiaStudio\SshKeyValidator\KeyFactory;
use TroiaStudio\SshKeyValidator\ValidationException;

abstract class AbstractValidator implements Validator
{

    public SshKey $type;

    public function validate(string $key): bool
    {
        return $this->validateByPattern($key, $this->type);
    }

    /**
     * @throws ValidationException
     */
    public function create(string $key): Key
    {
        if ($this->validate($key)) {
            $data = $this->keyDataByPattern($key, $this->type);

            return KeyFactory::createFromValidation($data, $this->type);
        }

        throw new ValidationException('Creation of key object failed by validation');
    }

    protected function validateByPattern(string $key, SshKey $pattern): bool
    {
        $result = $this->keyDataByPattern($key, $pattern);

        return $result !== null;
    }

    /**
     * @return array<int, array<int, string>>|null
     */
    protected function keyDataByPattern(string $key, SshKey $pattern): ?array
    {
        preg_match_all($pattern->value, $key, $result);

        if (!isset($result[0][0]) || !isset($result[1][0]) || !isset($result[2][0])) {
            return null;
        }

        return $result;
    }

}
