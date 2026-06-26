# EvolutionGo SDK for PHP

An elegant and lightweight PHP SDK for interacting with the **EvolutionGo API**. This package provides a fluent interface to manage instances, send messages, manage groups, communities, newsletters, labels, and more.

It also comes with **first-class Laravel integration**, including configuration publishing, auto-discovery, and Webhook Broadcasting out of the box!

## Installation

You can install the package via composer:

```bash
composer require biggercode/evolutiongosdk
```

If you are using **Laravel**, the service provider will be automatically discovered. 
You can publish the configuration file to customize the base URL, global key, and broadcasting settings:

```bash
php artisan vendor:publish --tag=evolution-config
```

## Usage

### Initialization

For generic PHP apps, initialize the client manually:

```php
use Biggercode\EvolutionGoSdk\EvolutionGoClient;

$client = new EvolutionGoClient('https://your-evolution-api.com', 'your-global-api-key');
```

**In Laravel:** The client is registered as a Singleton. You can use dependency injection or the app container:
```php
use Biggercode\EvolutionGoSdk\EvolutionGoClient;

$client = app(EvolutionGoClient::class);
// Or inject it in your controllers: public function index(EvolutionGoClient $client)
```

### Supported Services

The SDK mirrors the complete EvolutionGo specification with over 70 endpoints categorized into services:

- **`$client->instance()`** - Instance creation, connection, QR code, status, proxies, and settings.
- **`$client->send()`** - Sending text, media, buttons, lists, polls, contacts, carousels, locations, etc.
- **`$client->message()`** - React, mark as read, edit, delete, download image, and update status.
- **`$client->group()`** - Create groups, manage participants, fetch invite links, change photos/descriptions.
- **`$client->chat()`** - Archive/unarchive, mute/unmute, pin/unpin, and request history sync.
- **`$client->user()`** - Check contacts, block/unblock, fetch avatars, and update profile/privacy.
- **`$client->community()`** - Create communities, add/remove members.
- **`$client->label()`** - Manage labels and apply them to chats/messages.
- **`$client->newsletter()`** - Create, subscribe, list, and fetch messages from newsletters.
- **`$client->call()`** - Manage incoming calls (e.g., reject).
- **`$client->polls()`** - Fetch poll results.

### Example: Instance Management

```php
// Create a new instance with Webhook configuration
$instance = $client->instance()->create([
    'instanceName' => 'my-instance-name',
    'token' => 'custom-secure-token',
    'webhook' => [
        'enabled' => true,
        'url' => 'https://yourapp.com/api/webhook/evolution',
        'events' => ["MESSAGE", "PRESENCE", "CONNECTION"]
    ]
]);

// Connect / Get QR Code
$client->instance()->connect(['instance' => 'my-instance-name']);
$qr = $client->instance()->qr(['instance' => 'my-instance-name']);
```

### Example: Sending Messages

```php
// Send a text message
$response = $client->send()->text([
    'instance' => 'my-instance-name',
    'number' => '5511999999999',
    'text' => 'Hello from EvolutionGo SDK!',
    'delay' => 1200
]);

// Send media
$response = $client->send()->media([
    'instance' => 'my-instance-name',
    'number' => '5511999999999',
    'type' => 'image',
    'url' => 'https://example.com/image.png',
    'caption' => 'Check this out!'
]);
```

## Webhooks & Laravel Broadcasting

The SDK simplifies webhook processing. When receiving a webhook payload from EvolutionGo in your Laravel controller, simply call:

```php
public function handleWebhook(Request $request, EvolutionGoClient $client)
{
    // This will parse the payload and automatically trigger the 
    // \Biggercode\EvolutionGoSdk\Events\EvolutionWebhookReceived event.
    $client->handleWebhook($request->all());
    
    return response()->json(['success' => true]);
}
```

If `broadcasting.enabled` is set to `true` in your `config/evolutiongosdk.php`, the SDK will **automatically broadcast** the webhook payload to your Reverb/Pusher channels (`evolution-channel` and `evolution-channel.{instanceName}`).

## Requirements

- PHP 8.1 or higher
- GuzzleHTTP `^7.8`
- (Optional) Laravel 10.x/11.x/12.x/13.x for framework integrations.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
