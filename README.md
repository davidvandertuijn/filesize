# Filesize

<a href="https://packagist.org/packages/davidvandertuijn/filesize"><img src="https://poser.pugx.org/davidvandertuijn/filesize/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/davidvandertuijn/filesize"><img src="https://poser.pugx.org/davidvandertuijn/filesize/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/davidvandertuijn/filesize"><img src="https://poser.pugx.org/davidvandertuijn/filesize/license.svg" alt="License"></a>
<img src="https://github.styleci.io/repos/187700319/shield?style=flat" alt="StyleCI">

## Install

```
composer require davidvandertuijn/filesize
```

## Usage

```php
use Davidvandertuijn\Filesize;
```

```php
Filesize::toHumanFriendly(
    1024000, // Bytes
    'kB', // Force Unit
    '%01.2f %s', // Format
    'SI' // Standard
);
```

### SI standard (1000 bytes in a kilobyte)

```php
Filesize::toHumanFriendly(1024000); // 1.02 MB
```

**Force Unit**
```php
Filesize::toHumanFriendly(1024000, 'kB'); // 1024.00 kB
```

**Format**

```php
Filesize::toHumanFriendly(1024000, null, '%01.3f %s'); // 1.024 MB
```

### IEC standard (1024 bytes in a kibibyte)

```php
Filesize::toHumanFriendly(1048576, null, null, 'IEC'); // 1.00 MiB
```
