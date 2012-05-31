# php-inotify

A simple OO wrapper for PHP inotify module

## Requirements

* The [inotify module for PHP](http://www.php.net/manual/en/inotify.install.php "inotify module for PHP").

## Example

```php
<?php
$inotify = new Djme_Inotify();
$inotify->addWatch(__DIR__);
while (true) {
  foreach ($inotify->read() as $result) {
    echo 'Something happened to \''. __DIR__. '/'. $result->getName(). "'.\n";
  }
}
```
