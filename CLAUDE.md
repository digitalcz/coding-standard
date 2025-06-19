# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP coding standards library by Digital Solutions (digitalcz) that provides a comprehensive set of coding rules built on top of PHP_CodeSniffer and Slevomat Coding Standard. It enforces strict code quality standards across Digital Solutions PHP projects.

## Key Architecture

### Core Configuration
- **Main ruleset**: `ruleset.xml` - Contains all coding standards rules based on PSR-12 with additional strict requirements
- **Dependencies**: PHP ≥7.4, Slevomat Coding Standard 8.14.*, PHP_CodeSniffer 3.9.*
- **Line length limit**: 180 characters (configured in both Generic.Files.LineLength and SlevomatCodingStandard.Files.LineLength)

### Standards Enforced
- **Code complexity**: Cyclomatic complexity max 25 (absolute max 30), function length max 100 lines
- **Modern PHP features**: Requires arrow functions, strict types declarations, modern class references
- **Framework integration**: Special rules for Doctrine ORM (@ORM\, @Gedmo\), REST APIs (@Rest\), OpenAPI documentation (@OA\)
- **Class structure**: Enforced order - uses, constants, properties, constructor/methods
- **Documentation**: Structured PHPDoc with specific annotation groupings

### Annotation Grouping Order
The ruleset defines specific grouping for documentation annotations:
1. Basic type annotations (@var, @param, @return, @template)
2. Exception annotations (@throws)  
3. ORM annotations (@ORM\, @Gedmo\)
4. REST annotations (@Rest\, @BodyConverter, @ParamConverter)
5. OpenAPI annotations (@OA\Tag, @OA\Get, @OA\Post, etc., @Groups)

## Common Commands

### Installation & Usage
```bash
# Install as dev dependency in target project
composer require --dev digitalcz/coding-standard

# Create project ruleset.xml that references this package
cat > ruleset.xml << 'EOF'
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="custom">
    <rule ref="./vendor/digitalcz/coding-standard/ruleset.xml"/>
</ruleset>
EOF

# Run code standards check
vendor/bin/phpcs

# Auto-fix issues where possible  
vendor/bin/phpcbf
```

### Development Commands
```bash
# Update dependencies
composer update

# Install/update dependencies
composer install

# Run test suite
composer test
# OR
vendor/bin/phpunit

# Run coding standards check on this project
composer cs-check

# Auto-fix coding standards issues
composer cs-fix
```

### Testing
The project includes a comprehensive integration test suite with 16 tests that validates:

**Core Functionality:**
- Ruleset compliance with fixture files
- Custom property configurations (line length 180, complexity 25/30, function length 100)
- Rule exclusions work correctly (MissingNativeTypeHint, FoundWithAlternative)
- Custom annotation grouping and class structure ordering

**Rule Categories:**
- Array rules (TrailingArrayComma, DisallowLongArraySyntax, etc.)
- Namespace rules (AlphabeticallySortedUses, UnusedUses, etc.) 
- Control structure rules (DisallowYodaComparison, RequireShortTernaryOperator, etc.)
- Variable rules (UnusedVariable, UselessVariable, etc.)
- Edge cases and boundary testing
- Modern PHP features compatibility

**Test Structure:**
```
tests/
├── Integration/SimplifiedRulesetTest.php    # Main test class (16 tests)
├── fixtures/
│   ├── compliant/                           # Code that should pass
│   ├── violations/                          # Code that should fail  
│   └── property-tests/                      # Edge cases and limits
└── bootstrap.php
```

Run tests to ensure the ruleset works as expected:
```bash
composer test
```

## Important Notes

- This package is intended for internal use across Digital Solutions projects
- Documentation is in Czech language
- Uses 0.x versioning (currently 0.1.0)
- Project recently removed Docker/build infrastructure (Dockerfile, Makefile, docker-compose.yml were deleted)
- Main development branch is `0.x`