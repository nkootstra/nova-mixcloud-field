# Laravel Nova Mixcloud Field

Embed your Mixcloud mixes.

![index view](https://raw.githubusercontent.com/nkootstra/nova-mixcloud-field/master/docs/index.png)

![detail view](https://raw.githubusercontent.com/nkootstra/nova-mixcloud-field/master/docs/detail.png)


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
