# Zerotoprod\DataModelSwagger

![](art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/data-model-swagger)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-swagger/test.yml?label=test)](https://github.com/zero-to-prod/data-model-swagger/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-swagger/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/data-model-swagger/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/data-model-swagger?color=blue)](https://packagist.org/packages/zero-to-prod/data-model-swagger/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/data-model-swagger.svg?color=purple)](https://packagist.org/packages/zero-to-prod/data-model-swagger/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/data-model-swagger?color=f28d1a)](https://packagist.org/packages/zero-to-prod/data-model-swagger)
[![License](https://img.shields.io/packagist/l/zero-to-prod/data-model-swagger?color=pink)](https://github.com/zero-to-prod/data-model-swagger/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/data-model-swagger.svg)](https://wakatime.com/badge/github/zero-to-prod/data-model-swagger)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/data-model-swagger?branch=main)](https://hitsofcode.com/github/zero-to-prod/data-model-swagger/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

## Requirements

- PHP 8.1 or higher.

## Installation

Install `Zerotoprod\DataModelSwagger` via [Composer](https://getcomposer.org/):

```bash
composer require zero-to-prod/data-model-swagger
```

This will add the package to your project’s dependencies and create an autoloader entry for it.

## Usage

Create a DataModel from a Swagger document like this:

```php
\Zerotoprod\DataModelSwagger\Swagger::from(json_decode($swagger_file, true))
```

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/data-model-swagger/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
