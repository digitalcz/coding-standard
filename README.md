Coding standards používané interně pro vývoj projektů ve společnosti Digital Solutions.

## Instalace

```
composer require --dev digitalcz/coding-standard
```



Vytvořte `ruleset.xml` v kořenovém adresáři projektu.

```
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="custom">
    <rule ref="./vendor/digitalcz/coding-standard/ruleset.xml"/>
</ruleset>
```
