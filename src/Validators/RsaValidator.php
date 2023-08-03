<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SshKey;

class RsaValidator extends AbstractValidator
{

    public SshKey $type = SshKey::RSA;

}
