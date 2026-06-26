# EvolutionGo SDK for PHP

An elegant and lightweight PHP SDK for interacting with the **EvolutionGo API** (Evolution API). This package provides a fluent interface to manage instances, send messages, manage groups, and more.

## Installation

You can install the package via composer:

```bash
composer require biggercode/evolutiongosdk
```

## Usage

### Initialization

First, initialize the client with your Evolution API URL and Global API Key.

```php
use Biggercode\EvolutionGoSdk\EvolutionGoClient;

$client = new EvolutionGoClient('https://your-evolution-api.com', 'your-global-api-key');
```

### Instance Management

Create, connect, check status, and manage WhatsApp instances.

```php
// Create a new instance
$instance = $client->instance()->create([
    'instanceId' => 'unique-uuid-here',
    'name' => 'my-instance-name',
    'token' => 'custom-secure-token',
    'advancedSettings' => [
        'alwaysOnline' => true,
        'readMessages' => true
    ]
]);

// Get instance connection status
$status = $client->instance()->status(['instanceName' => 'my-instance-name']);

// Generate QR Code for connection
$qr = $client->instance()->qr(['instanceName' => 'my-instance-name']);

// Logout or Delete instance
$client->instance()->logout();
$client->instance()->deleteInstance('my-instance-name');
```

### Sending Messages

Use the `send()` endpoint to dispatch messages.

```php
// Send a text message
$response = $client->send()->text([
    'instanceName' => 'my-instance-name', // Ou via header/endpoint dependendo da v1/v2
    'number' => '5511999999999',
    'options' => [
        'delay' => 1200,
        'presence' => 'composing'
    ],
    'textMessage' => [
        'text' => 'Hello from EvolutionGo SDK!'
    ]
]);

// Send media
$response = $client->send()->media([
    'number' => '5511999999999',
    'mediaMessage' => [
        'mediatype' => 'image',
        'media' => 'https://example.com/image.png'
    ]
]);
```

### Other Services

The SDK includes access to various endpoints grouped by resource:

- **`$client->instance()`** - Instance creation, QR, status, settings.
- **`$client->send()`** - Sending text, media, audio, and interactive messages.
- **`$client->message()`** - Message retrieval and manipulation.
- **`$client->group()`** - Group creation, participant management.
- **`$client->user()`** - User management within the API.

## Requirements

- PHP 8.1 or higher
- GuzzleHTTP `^7.8`

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
