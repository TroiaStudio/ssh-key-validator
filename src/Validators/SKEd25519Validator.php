<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SshKey;

class SKEd25519Validator extends AbstractValidator
{

    public SshKey $type = SshKey::SK_ED25519;

}
