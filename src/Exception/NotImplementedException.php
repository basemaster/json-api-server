<?php

namespace Tobyz\JsonApiServer\Exception;

use DomainException;
use JsonApiPhp\JsonApi\Error;
use Tobyz\JsonApiServer\ErrorProviderInterface;

class NotImplementedException extends DomainException implements ErrorProviderInterface
{
    public function getJsonApiErrors(): array
    {
        return [
            new Error(
                new Error\Title('Not Implemented'),
                new Error\Status($this->getJsonApiStatus())
            )
        ];
    }

    public function getJsonApiStatus(): string
    {
        return '501';
    }
}
