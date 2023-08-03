<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SshKey;

class EcdsaValidator extends AbstractValidator
{

    public SshKey $type = SshKey::ECDSA_SHA2_NITSTP256;

}
