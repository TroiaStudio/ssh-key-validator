<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;
use TroiaStudio\SshKeyValidator\Key;
use TroiaStudio\SshKeyValidator\KeyFactory;
use TroiaStudio\SshKeyValidator\ValidationException;

abstract class AbstractValidator implements Validator
{
    public SSH_KEY $type;

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

    protected function validateByPattern(string $key, SSH_KEY $pattern): bool
    {
        $result = $this->keyDataByPattern($key, $pattern);
        return $result !== null;
    }

    protected function keyDataByPattern(string $key, SSH_KEY $pattern): ?array
    {
        preg_match_all($pattern->value, $key, $result);

        if (empty($result[0]) || empty($result[1]) || empty($result[2])) {
            return null;
        }

        return $result;
    }
}
