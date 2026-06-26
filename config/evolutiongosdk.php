<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Evolution API Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL of your Evolution API instance.
    |
    */
    'url' => env('EVOLUTION_URL', ''),

    /*
    |--------------------------------------------------------------------------
    | Evolution API Global Key
    |--------------------------------------------------------------------------
    |
    | The global key used to authenticate with your Evolution API instance.
    |
    */
    'global_key' => env('EVOLUTION_GLOBAL_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Default Advanced Settings
    |--------------------------------------------------------------------------
    |
    | These are the default advanced settings applied when creating or updating
    | an instance if no specific overrides are provided.
    |
    */
    'advanced_settings' => [
        'alwaysOnline'  => env('EVOLUTION_ALWAYS_ONLINE', true),
        'readMessages'  => env('EVOLUTION_READ_MESSAGES', true),
        'rejectCall'    => env('EVOLUTION_REJECT_CALL', false),
        'msgRejectCall' => env('EVOLUTION_MSG_REJECT_CALL', ''),
        'ignoreGroups'  => env('EVOLUTION_IGNORE_GROUPS', false),
        'ignoreStatus'  => env('EVOLUTION_IGNORE_STATUS', false),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Webhook Configuration
    |--------------------------------------------------------------------------
    |
    | The default webhook configuration when creating new instances.
    |
    */
    'webhook' => [
        'enabled'         => env('EVOLUTION_WEBHOOK_ENABLED', true),
        'url'             => env('EVOLUTION_WEBHOOK_URL', env('APP_URL') . '/api/webhook/evolution'),
        'webhookByEvents' => env('EVOLUTION_WEBHOOK_BY_EVENTS', false),
        'events'          => [
            "MESSAGE", 
            "PRESENCE", 
            "CHAT_PRESENCE", 
            "CONNECTION", 
            "READ_RECEIPT", 
            "HISTORY_SYNC", 
            "CALL", 
            "QRCODE"
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | RabbitMQ Configuration
    |--------------------------------------------------------------------------
    |
    | The default RabbitMQ configuration (if your EvolutionGo uses RabbitMQ).
    |
    */
    'rabbitmq' => [
        'enabled' => env('EVOLUTION_RABBITMQ_ENABLED', false),
        'events'  => [
            "MESSAGE", 
            "CONNECTION", 
            "QRCODE"
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Broadcasting (Reverb / WebSockets)
    |--------------------------------------------------------------------------
    |
    | If enabled, the SDK can automatically dispatch Laravel broadcast events
    | via Reverb (or any other configured broadcast driver) when actions occur
    | or webhooks are received.
    |
    */
    'broadcasting' => [
        'enabled' => env('EVOLUTION_BROADCAST_ENABLED', false),
        'channel' => env('EVOLUTION_BROADCAST_CHANNEL', 'evolution-channel'),
    ],
];
