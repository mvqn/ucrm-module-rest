# Version
### /version
> GET

&nbsp;

###### Example
```php
<?php

use UCRM\REST\Endpoints\Version;

$version = Version::get()->first();

echo $version;
```

&nbsp;

###### Output
```json
{"version":"2.13.0-beta2"}
```
