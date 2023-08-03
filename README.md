# ssh-key-validator

## Usage
To install latest version of `troia-studio/ssh-key-validator` use [Composer](https://getcomposer.com/).
```shell
composer require troia-studio/ssh-key-validator
```

## Supported Keys
- DSS
- ECDSA (and SK)
- ED255 (and SK)
- RSA

## Examples

### Validation

#### Use all validators

```php
use TroiaStudio\SshKeyValidator\KeyValidator;

$keyValidator = KeyValidator::createAll();

$isValid = $keyValidator->validate('ssh-ed25519 BOOOM'); // return bool
```

#### Use specifics validators 
```php
use TroiaStudio\SshKeyValidator\KeyValidator;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;
use TroiaStudio\SshKeyValidator\Validators\Ed25519Validator;

$validators = [
    new RsaValidator(),
    new Ed25519Validator(),
];

$keyValidator = new KeyValidator($validators);
$isValid = $keyValidator->validate('ssh-ed25519 BOOOM'); // return bool
```

### Create Key object
Key object contains information like `prefix`, `type`, `key`, and `comment`.
When we before create, factory will check if key is valid.

```php
use TroiaStudio\SshKeyValidator\KeyFactory;

$validators = [
    new RsaValidator(),
    new Ed25519Validator(),
];

$key = KeyFactory::create('ssh-ed25519 BOOOM'));
// Or
$key = KeyFactory::create('ssh-ed25519 BOOOM', $validators));
```
