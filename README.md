# Digital Solutions Coding Standard

PHP coding standards library for Digital Solutions projects. Built on PHP_CodeSniffer and Slevomat Coding Standard.

## Installation

```bash
composer require --dev digitalcz/coding-standard
```

Create `ruleset.xml` in your project root:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="custom">
    <rule ref="./vendor/digitalcz/coding-standard/ruleset.xml"/>
</ruleset>
```

## Usage

```bash
# Check code standards
vendor/bin/phpcs

# Auto-fix issues
vendor/bin/phpcbf
```

## Key Features

- PSR-12 compliance with strict additions
- 180 character line length
- Cyclomatic complexity max 25
- Modern PHP features required
- Doctrine/REST/OpenAPI annotation support

## Development

```bash
composer test        # Run tests
composer cs-check    # Check standards
composer cs-fix      # Fix standards
```
