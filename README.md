# Laravel Nova Mixcloud Field

Embed your Mixcloud mixes.

## Installation

```bash
composer require nkootstra/nova-mixcloud-field
```

## Usage
Define the following fields in your resource in the ```fields``` method:
```php
use Nkootstra\NovaMixcloudField\Fields\Mixcloud;

Mixcloud::make('Mix')
```
