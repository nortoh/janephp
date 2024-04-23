<?php

namespace Jane\Component\OpenApiCommon\Generator\Endpoint;

use Jane\Component\OpenApiCommon\Guesser\Guess\OperationGuess;
use PhpParser\Modifiers;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;

trait GetGetMethodTrait
{
    public function getGetMethod(OperationGuess $operation): Stmt\ClassMethod
    {
        return new Stmt\ClassMethod(new Identifier('getMethod'), [
            'type' => Modifiers::PUBLIC,
            'stmts' => [
                new Stmt\Return_(new Scalar\String_($operation->getMethod())),
            ],
            'returnType' => new Name('string'),
        ]);
    }
}
