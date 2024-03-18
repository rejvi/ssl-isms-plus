# ISMSPLUS client

ISMSPLUS is a PHP client for sending sms via SSL Wireless SMS gateway.

## Installation

```shell
composer require rejvi/ssl-isms-plus
```

Wait for few minutes. Composer will automatically install this package for your project.

Then run this command

```shell
php artisan vendor:publish --provider="Rejvi\SslIsmsPlus\SmsServiceProvider"
```

## Configuration

This package is required three configurations.

Open config/ismsplus.php or .env file and set config value.

1. SMS_PLUS_API_DOMAIN = Which is provided by SSL Wireless.
2. SMS_PLUS_API_TOKEN = API authorization token which is provided by SSL Wireless
3. SMS_PLUS_SID = Which is provided by SSL Wireless

## Usages

# 1. For sending Single SMS

```php
use Rejvi\SslIsmsPlus\Libraries\ISmsPlus;

$sms = new ISmsPlus();
$response = $sms->single('8801xxxxxxxxx','Your Message body', 'Your unique sms id')->send();

$result = json_decode($response);

if($result->status_code == 200) {
    echo "Success";
} else {
    echo $result->error_message;
}

```

# 2. For sending Bulk SMS

```php
use Rejvi\SslIsmsPlus\Libraries\ISmsPlus;

$sms = new ISmsPlus();
$response = $sms->bulk('8801xxxxxxxxx,8801xxxxxxxxx','Your Message body', 'Your unique sms id')->send();

$result = json_decode($response);

if($result->status_code == 200) {
    echo "Success";
} else {
    echo $result->error_message;
}

```

# 3. For sending Dynamic SMS

```php
use Rejvi\SslIsmsPlus\Libraries\ISmsPlus;

$sms = new ISmsPlus();
$messageData = [
    [
        "msisdn" => "8801XXXXXXXXX",
        "text" => "SMS 1",
        "csms_id" => "Your SMS ID"
    ],
    [
        "msisdn" => "8801XXXXXXXXX",
        "text" => "SMS 2",
        "csms_id" => "Your SMS ID"
    ]
];

$response = $sms->dynamic($messageData)->send();

$result = json_decode($response);

if($result->status_code == 200) {
    echo "Success";
} else {
    echo $result->error_message;
}

```
