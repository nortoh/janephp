<?php

namespace Jane\Component\OpenApiCommon\Generator\Endpoint;

use Jane\Component\OpenApiCommon\Guesser\Guess\OperationGuess;
use PhpParser\Modifiers;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;

trait GetAuthenticationScopesTrait
{
    public function getAuthenticationScopesMethod(OperationGuess $operation): Stmt\ClassMethod
    {
        $securityScopes = [];
        foreach ($operation->getSecurityScopes() as $scope) {
            $securityScopes[] = new Node\ArrayItem(new Scalar\String_($scope));
        }

        return new Stmt\ClassMethod(new Identifier('getAuthenticationScopes'), [
            'type' => Modifiers::PUBLIC,
            'returnType' => new Name('array'),
            'stmts' => [new Stmt\Return_(new Expr\Array_($securityScopes))],
        ]);
    }
}
