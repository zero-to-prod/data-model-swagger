<?php

namespace Zerotoprod\DataModelSwagger\Helpers;

use Zerotoprod\DataModelHelper\DataModelHelper;
use Zerotoprod\Transformable\Transformable;

/**
 * @link https://github.com/zero-to-prod/data-model-swagger
 */
trait DataModel
{
    use \Zerotoprod\DataModel\DataModel;
    use Transformable;
    use DataModelHelper;
}