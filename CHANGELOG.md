# Changelog

## [Unreleased]
### Added
- GitHub Actions CI workflow with PHP 7.4-8.3 matrix testing
- Comprehensive integration test suite with 16 tests covering all ruleset functionality
- Project-specific phpcs.xml configuration file
- PHPUnit testing framework and composer scripts

### Changed  
- Improved README documentation with concise project overview and usage instructions
- Updated Slevomat Coding Standard to 8.19.* and PHP_CodeSniffer to 3.13.*
- Refactored integration tests for better code style and maintainability
- Simplified PHPUnit and test bootstrap configuration
- Updated .gitignore to exclude cache files and build artifacts

### Fixed
- PHPUnit compatibility for PHP 7.4+ support (downgraded from ^10.0 to ^9.5)
- PHPUnit configuration schema updated to version 9.2 compatibility
- Removed deprecated CallTimePassByReference rule from ruleset
- Replaced deprecated UnionTypeHintFormat with DNFTypeHintFormat

### Removed
- Docker development infrastructure (Dockerfile, Makefile, docker-compose.yml)

## [0.2.1] - 2024-02-29
### Changed
- Bump squizlabs/php_codesniffer to 3.9.*

## [0.2.0] - 2024-01-26
### Added
- New rule for InlineDocCommentDeclaration

### Changed
- Bump squizlabs/php_codesniffer to 3.8.*
- Bump slevomat/coding-standard to 8.14.*
- Update InlineDocCommentDeclaration rule

## [0.1.0] - 2023-09-25
### Added
- Added new rules for attributes

### Changed
- Update slevomat/coding-standard version
- Refine array rules

## [0.0.1] - 2023-01-10
🚀 First release
