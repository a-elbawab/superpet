<?php

namespace App\Models;

use App\Notifications\SendGridEmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\URL;
use Parental\HasChildren;
use App\Http\Filters\Filterable;
use App\Http\Filters\UserFilter;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Models\Helpers\UserHelpers;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Relations\UserRelations;
use App\Http\Resources\CustomerResource;
use App\Models\Presenters\UserPresenter;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laracodes\Presenter\Traits\Presentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use SendGrid;
use SendGrid\Mail\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use UserHelpers;
    use HasChildren;
    use HasApiTokens;
    use HasChildren;
    use Presentable;
    use Filterable;
    use Selectable;
    use HasUploader;
    use Impersonate;
    use HasRoles;
    use UserRelations;
    use InteractsWithMedia;

    /**
     * The code of admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The code of supervisor type.
     *
     * @var string
     */
    const SUPERVISOR_TYPE = 'supervisor';

    /**
     * The code of customer type.
     *
     * @var string
     */
    const CUSTOMER_TYPE = 'customer';

    /**
     * The guard name of the user permissions.
     *
     * @var string
     */
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'phone_code',
        'password',
        'country_id',
        'owner_id',
        'remember_token',
        'address',
        'city_id'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['media'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::SUPERVISOR_TYPE => Supervisor::class,
        self::CUSTOMER_TYPE => Customer::class,
    ];

    public function hasToVerifyEmail()
    {
        return $this->type === Customer::class;
    }

    public function sendEmailVerificationNotification()
    {
        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $this->getKey(),
                'hash' => sha1($this->getEmailForVerification()),
            ]
        );

        // render the view to HTML
        $html = view('emails.verify', compact('verifyUrl'))->render();

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom( env('MAIL_FROM_ADDRESS'), 'Super Pet Egy');
        $email->setSubject("Verify your email");
        $email->addTo($this->email, $this->name ?? '');
        $email->addContent("text/html", $html);

        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        $sendgrid->send($email);

    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = UserFilter::class;

    /**
     * Get the dashboard profile link.
     *
     * @return string
     */
    public function dashboardProfile(): string
    {
        return '#';
    }

    /**
     * Get the resource for customer type.
     *
     * @return \App\Http\Resources\CustomerResource
     */
    public function getResource()
    {
        return new CustomerResource($this);
    }

    /**
     * Get the access token currently associated with the user. Create a new.
     *
     * @param string|null $device
     * @return string
     */
    public function createTokenForDevice($device = null)
    {
        $device = $device ?: 'Unknown Device';

        $this->tokens()->where('name', $device)->delete();

        return $this->createToken($device)->plainTextToken;
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mm')
            ->singleFile()
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->width(70)
                    ->format('png');

                $this->addMediaConversion('small')
                    ->width(120)
                    ->format('png');

                $this->addMediaConversion('medium')
                    ->width(160)
                    ->format('png');

                $this->addMediaConversion('large')
                    ->width(320)
                    ->format('png');
            });
    }

    /**
     * Determine whither the user can impersonate another user.
     *
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->isAdmin();
    }

    /**
     * Determine whither the user can be impersonated by the admin.
     *
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->isSupervisor() || $this->isCustomer();
    }
}
