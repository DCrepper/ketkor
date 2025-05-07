<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $token
 * @property int $used
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessToken whereUserId($value)
 */
	class AccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $what
 * @property string $when
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\LogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereWhat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Log whereWhen($value)
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $city
 * @property string|null $tax_number
 * @property string|null $address
 * @property string|null $zip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\OrganizationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization whereZip($value)
 */
	class Organization extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $name
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partial whereUpdatedAt($value)
 */
	class Partial extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $owner_name
 * @property string|null $installer_name
 * @property int $user_id
 * @property string|null $city
 * @property string|null $street
 * @property string|null $zip
 * @property string|null $purchase_place
 * @property string $serial_number
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $installation_date
 * @property \Illuminate\Support\Carbon|null $warrantee_date
 * @property \Illuminate\Support\Carbon|null $purchase_date
 * @property int $tool_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visible> $are_visible
 * @property-read int|null $are_visible_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Organization> $organizations
 * @property-read int|null $organizations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Partial> $partials
 * @property-read int|null $partials_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductLog> $product_logs
 * @property-read int|null $product_logs_count
 * @property-read \App\Models\Tool|null $tool
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereInstallationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereInstallerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePurchasePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereToolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWarranteeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereZip($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $what
 * @property string|null $comment
 * @property string $when
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\ProductLogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereWhat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductLog whereWhen($value)
 */
	class ProductLog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property string|null $tag
 * @property string|null $factory_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ToolFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereFactoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereUpdatedAt($value)
 */
	class Tool extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property int|null $organization_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AccessToken> $AccessTokens
 * @property-read int|null $access_tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visible> $are_visible
 * @property-read int|null $are_visible_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Organization|null $organization
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $isVisible
 * @property int $product_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visible whereUserId($value)
 */
	class Visible extends \Eloquent {}
}

