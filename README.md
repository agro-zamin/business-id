# AgroZamin BusinessID


### Loyihalar-aro "Agrozamin: BusinessID" tizimidan foydalanish uchun tayyorlangan kutubxona

### O'rnatish

Ushbu kengaytmani o'rnatishning afzal usuli - [composer](http://getcomposer.org/download/) orqali.

O'rnatish uchun quyidagi buyruqni ishga tushiring:

```
php composer require --prefer-dist agro-zamin/business-id "1.0.0"
```

Agar Siz composer global o'rnatgan bo'lsangiz, quyidagi buyruqni ishga tushiring:

```
composer require --prefer-dist agro-zamin/business-id "1.0.0"
```

Yoki quyidagi qatorni `composer.json` faylga qo'shing:

```
"agro-zamin/business-id": "^1.0.0"
```

### Foydalanish

```php
use AgroZamin\Integration\BusinessId\BusinessId;
use AgroZamin\Integration\BusinessId\RequestModel\Organization\Organization;
use GuzzleHttp\Client;

$serviceToken = $_ENV['BUSINESS_ID_SERVICE_TOKEN'];
$client = new Client([
    'base_uri' => $_ENV['BUSINESS_ID_BASE_URI']
]);

$businessId = new BusinessId($serviceToken, $client);

$tin = 123456789;

$organization = $businessId->requestModel((new Organization())->byTin($tin))->sendRequest();
```