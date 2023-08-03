<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;
use TroiaStudio\SshKeyValidator\Key;
use TroiaStudio\SshKeyValidator\KeyFactory;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;

final class KeyFactoryTest extends TestCase
{
    public function testCreateOk(): void
    {
        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $expected = new Key(
            SSH_KEY::ED25519,
            'AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ',
            'ssh-ed25519',
            'test ed25519'
        );

        $keyObject = KeyFactory::create($key);

        $this->assertSame($expected->getType(), $keyObject->getType());
        $this->assertSame($expected->getComment(), $keyObject->getComment());
        $this->assertSame($expected->getValue(), $keyObject->getValue());
        $this->assertSame($expected->getPrefix(), $keyObject->getPrefix());
    }

    public function testCreateEd25519Ok(): void
    {
        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $expected = new Key(
            SSH_KEY::ED25519,
            'AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ',
            'ssh-ed25519',
            'test ed25519'
        );

        $keyObject = KeyFactory::create($key);

        $this->assertSame($expected->getType(), $keyObject->getType());
        $this->assertSame($expected->getComment(), $keyObject->getComment());
        $this->assertSame($expected->getValue(), $keyObject->getValue());
        $this->assertSame($expected->getPrefix(), $keyObject->getPrefix());
    }

    public function testCreateEd25519BadValidator(): void
    {
        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $keyObject = KeyFactory::create($key, [new RsaValidator()]);

        $this->assertSame(null, $keyObject);
    }

    public function testCreateEd25519False(): void
    {
        $key = 'sshed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $keyObject = KeyFactory::create($key);

        $this->assertSame(null, $keyObject);
    }
}