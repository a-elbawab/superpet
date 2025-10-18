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
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int $active
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_code
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hint> $hints
 * @property-read int|null $hints_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\AdminFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Area
 *
 * @property int $id
 * @property int $city_id
 * @property float $shipping_price
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Translations\AreaTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\AreaTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\AreaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Area filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Area orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Area translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereShippingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Area withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Area withoutTrashed()
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Translations\AttributeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\AttributeTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Variation> $variations
 * @property-read int|null $variations_count
 * @method static \Database\Factories\AttributeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute withTranslation(?string $locale = null)
 */
	class Attribute extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int|null $service_id
 * @property int|null $user_id
 * @property array|null $inputs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Service|null $service
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BookingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Booking filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereInputs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 */
	class Booking extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $location_url
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BranchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Branch filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereLocationUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $depth
 * @property-read mixed $main_parent
 * @property-read mixed $tree
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \App\Models\Translations\CategoryTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CategoryTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category active()
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Category parents()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Category translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Category translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\CategoryProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property int|null $sub_category_id2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\Category|null $subCategory
 * @property-read \App\Models\Category|null $subCategory2
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereSubCategoryId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryProduct whereUpdatedAt($value)
 */
	class CategoryProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Area> $areas
 * @property-read int|null $areas_count
 * @property-read \App\Models\Country $country
 * @property-read \App\Models\Translations\CityTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CityTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\CityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|City filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|City orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|City translated()
 * @method static \Illuminate\Database\Eloquent\Builder|City translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|City withoutTrashed()
 */
	class City extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $code
 * @property string $key
 * @property int $active
 * @property bool|null $is_default
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Translations\CountryTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\CountryTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 * @method static \Illuminate\Database\Eloquent\Builder|Country default()
 * @method static \Database\Factories\CountryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Country filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Country translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Country translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Country withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country withoutTrashed()
 */
	class Country extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int $active
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_code
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hint> $hints
 * @property-read int|null $hints_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withoutTrashed()
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $type
 * @property string|null $subject
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FeedbackFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback unread()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
 */
	class Feedback extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\GalleryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 */
	class Gallery extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Hint
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $user_id
 * @property int $done
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Hint done()
 * @method static \Database\Factories\HintFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Hint filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hint notDone()
 * @method static \Illuminate\Database\Eloquent\Builder|Hint query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hint sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hint whereUserId($value)
 */
	class Hint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Input
 *
 * @property int $id
 * @property int $section_id
 * @property int|null $order
 * @property string $type
 * @property int $required
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Section $section
 * @property-read \App\Models\Translations\InputTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\InputTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\InputFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Input listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Input newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Input newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Input notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Input orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Input orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Input orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Input query()
 * @method static \Illuminate\Database\Eloquent\Builder|Input translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Input translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Input withTranslation(?string $locale = null)
 */
	class Input extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int $total
 * @property int $status
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $api_invoice_id
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\InvoiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereApiInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property int|null $page_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Page|null $page
 * @property-read \App\Models\Translations\ItemTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\ItemTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Item filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Item translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Item translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item withTranslation(?string $locale = null)
 */
	class Item extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Notification
 *
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Option
 *
 * @property int $id
 * @property int $input_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Input $input
 * @property-read \App\Models\Translations\OptionTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\OptionTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\OptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Option filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Option translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Option translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereInputId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option withTranslation(?string $locale = null)
 */
	class Option extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $user_id
 * @property string $status
 * @property int $total
 * @property string|null $deleted_at
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed|null $items
 * @property int|null $invoice_id
 * @property float $discount
 * @property int|null $payment_method
 * @property string|null $delivery_method
 * @property float|null $delivery_price
 * @property int|null $branch_id
 * @property-read \App\Models\Branch|null $branch
 * @property-read \App\Models\Invoice|null $invoice
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Order filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Translations\PageTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PageTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Page filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTranslation(?string $locale = null)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Translations\PostTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PostTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Post filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Post translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withTranslation(?string $locale = null)
 */
	class Post extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $parent_id
 * @property int|null $sub_category_id
 * @property int $active
 * @property int $stock
 * @property int $best_seller
 * @property float $price
 * @property string|null $code
 * @property float|null $old_price
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $sub_category_id2
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attribute> $attributes
 * @property-read int|null $attributes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CategoryProduct> $categoryProducts
 * @property-read int|null $category_products_count
 * @property-read mixed $images
 * @property-read mixed $main_image
 * @property-read mixed $main_image_media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Invoice> $invoices
 * @property-read int|null $invoices_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Product|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \App\Models\Category|null $subCategory
 * @property-read \App\Models\Category|null $subCategory2
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\Translations\ProductTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\ProductTranslation> $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariation> $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Illuminate\Database\Eloquent\Builder|Product children()
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Product parents()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Product translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Product translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product website()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBestSeller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubCategoryId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\ProductVariation
 *
 * @property int $id
 * @property int $product_id
 * @property int $variation_id
 * @property array|null $combination
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $price_override
 * @property-read mixed $combination_text
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Variation $variation
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereCombination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation wherePriceOverride($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereVariationId($value)
 */
	class ProductVariation extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordCode
 *
 * @property int $id
 * @property string $username
 * @property string $code
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereUsername($value)
 */
	class ResetPasswordCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUserId($value)
 */
	class ResetPasswordToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Role filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property int $id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Input> $inputs
 * @property-read int|null $inputs_count
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\Translations\SectionTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\SectionTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\SectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Section filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Section translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section withTranslation(?string $locale = null)
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property int $home
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @property-read \App\Models\Translations\ServiceTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\ServiceTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Service filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Service translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTranslation(?string $locale = null)
 */
	class Service extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $locale
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Translations\SliderTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\SliderTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\SliderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Slider filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider withTranslation(?string $locale = null)
 */
	class Slider extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Supervisor
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int $active
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_code
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hint> $hints
 * @property-read int|null $hints_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\SupervisorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor withoutTrashed()
 */
	class Supervisor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Translations\TagTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\TagTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tag filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withTranslation(?string $locale = null)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Translations\TeamTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\TeamTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Team translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Team translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team withTranslation(?string $locale = null)
 */
	class Team extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\AreaTranslation
 *
 * @property int $id
 * @property int $area_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaTranslation whereName($value)
 */
	class AreaTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\AttributeTranslation
 *
 * @property int $id
 * @property int $attribute_id
 * @property string|null $name
 * @property string|null $description
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttributeTranslation whereName($value)
 */
	class AttributeTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\CategoryTranslation
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $name
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $slug
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereSlug($value)
 */
	class CategoryTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\CityTranslation
 *
 * @property int $id
 * @property int $city_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereName($value)
 */
	class CityTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\CountryTranslation
 *
 * @property int $id
 * @property int $country_id
 * @property string|null $name
 * @property string|null $currency
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryTranslation whereName($value)
 */
	class CountryTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\InputTranslation
 *
 * @property int $id
 * @property int $input_id
 * @property string $locale
 * @property string $label
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation whereInputId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InputTranslation whereLocale($value)
 */
	class InputTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\ItemTranslation
 *
 * @property int $id
 * @property int $item_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTranslation whereName($value)
 */
	class ItemTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\OptionTranslation
 *
 * @property int $id
 * @property int $option_id
 * @property string $locale
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereOptionId($value)
 */
	class OptionTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $content
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitle($value)
 */
	class PageTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\PostTranslation
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $name
 * @property string|null $paragraph
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereParagraph($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation wherePostId($value)
 */
	class PostTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereSlug($value)
 */
	class ProductTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\RoleTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleTranslation query()
 */
	class RoleTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\SectionTranslation
 *
 * @property int $id
 * @property int $section_id
 * @property string $locale
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTranslation whereSectionId($value)
 */
	class SectionTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\ServiceTranslation
 *
 * @property int $id
 * @property int $service_id
 * @property string $locale
 * @property string $name
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTranslation whereServiceId($value)
 */
	class ServiceTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\SliderTranslation
 *
 * @property int $id
 * @property int $slider_id
 * @property string|null $paragraph
 * @property string|null $paragraph2
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereParagraph($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereParagraph2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereSliderId($value)
 */
	class SliderTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\TagTranslation
 *
 * @property int $id
 * @property int $tag_id
 * @property string $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagTranslation whereTagId($value)
 */
	class TagTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\TeamTranslation
 *
 * @property int $id
 * @property int $team_id
 * @property string|null $name
 * @property string|null $title
 * @property string $locale
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamTranslation whereTitle($value)
 */
	class TeamTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\VariationTranslation
 *
 * @property int $id
 * @property int $variation_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariationTranslation whereVariationId($value)
 */
	class VariationTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int $active
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_code
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hint> $hints
 * @property-read int|null $hints_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\Variation
 *
 * @property int $id
 * @property int $attribute_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute $attribute
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariation> $productVariations
 * @property-read int|null $product_variations_count
 * @property-read \App\Models\Translations\VariationTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\VariationTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variation filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Variation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation withTranslation(?string $locale = null)
 */
	class Variation extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Verification
 *
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUserId($value)
 */
	class Verification extends \Eloquent {}
}

