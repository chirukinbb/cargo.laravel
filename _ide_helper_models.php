<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Load
 *
 * @property int $id
 * @property string $name
 * @property int $weight
 * @property-read \App\Models\Point|null $point
 * @method static \Illuminate\Database\Eloquent\Builder|Load newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Load newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Load query()
 * @method static \Illuminate\Database\Eloquent\Builder|Load whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Load whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Load whereWeight($value)
 */
	class Load extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Point
 *
 * @property int $id
 * @property string $name
 * @property string $date_time
 * @property int $load_id
 * @property-read \App\Models\Load $cargo
 * @method static \Illuminate\Database\Eloquent\Builder|Point newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Point newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Point query()
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereLoadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereName($value)
 */
	class Point extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

