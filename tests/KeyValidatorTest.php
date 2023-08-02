<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TroiaStudio\SshKeyValidator\KeyValidator;
use TroiaStudio\SshKeyValidator\Validators\DSSValidator;
use TroiaStudio\SshKeyValidator\Validators\EcdsaSha2Nitstp256Validator;
use TroiaStudio\SshKeyValidator\Validators\Ed25519Validator;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SkEcdsaSha2Nitstp256Validator;
use TroiaStudio\SshKeyValidator\Validators\SKEd25519Validator;

final class KeyValidatorTest extends TestCase
{
    public function testValidateAllOk(): void
    {
        $validators = [
            new DSSValidator(),
            new EcdsaSha2Nitstp256Validator(),
            new Ed25519Validator(),
            new RsaValidator(),
            new SkEcdsaSha2Nitstp256Validator(),
            new SKEd25519Validator(),
        ];

        $validator = new KeyValidator($validators);

        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIFaGEVPvFEkPXCRHmLv7MpicOLfIo2FPhmXfQ/8W/3NS me@jan-galek.cz';
        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIFaGEVPvFEkPXCRHmLv7MpicOLfIo2FPhmXfQ/8W/3NS';
        $this->assertTrue($validator->validate($key));
    }
}