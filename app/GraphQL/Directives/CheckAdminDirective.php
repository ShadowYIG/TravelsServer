<?php

namespace App\GraphQL\Directives;


use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Exceptions\DefinitionException;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\DefinedDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;


class CheckAdminDirective extends BaseDirective implements FieldMiddleware, DefinedDirective
{
  public static function definition(): string
  {
      return /** @lang GraphQL */ <<<GRAPHQL
      directive @CheckAdmin(
        with: [String!]
      ) on FIELD_DEFINITION | OBJECT
    GRAPHQL;
  }

  public function handleField(FieldValue $fieldValue, Closure $next): FieldValue
  {
      $previousResolver = $fieldValue->getResolver();
      
      $resolver = function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) use ($previousResolver) {
        $withRole = $this->directiveArgValue('with');
        if ($withRole === null) {
            throw new DefinitionException("Missing argument 'withRole' for directive '@CheckAdmin'.");
        }
        $user = $context->user();
        if($withRole==="Admin"){
          if(!($user->is_admin || (isset($args['uid'])&&$args['uid']==$user->uid))){
            throw new DefinitionException("非管理员"); 
          }
        }else if($withRole==="SuperAdmin"){
          if(!($user->is_admin&&$user->admin_level ===5)){
            throw new DefinitionException("非超级管理员"); 
          }
        }
        return $previousResolver($root, $args, $context, $resolveInfo);;
    };

      return $next($fieldValue->setResolver($resolver));
      // return $next($fieldValue);
  }

}
