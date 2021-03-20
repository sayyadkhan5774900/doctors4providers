<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Provider extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'providers';

    protected $appends = [
        'cv',
        'redacted_cv',
    ];

    const AGENT_CAN_CONTACT_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const HAVE_BILLING_COMPANY_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const BILLING_COMPANY_CAN_CONTACT_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'date_of_agreement',
        'begin_seeing_patients',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_agreement',
        'practice',
        'current_licensure',
        'collaborative_need',
        'practice_states',
        'communication_form',
        'collaborative_communication',
        'emr_system',
        'meeting_time',
        'begin_seeing_patients',
        'have_malpractice',
        'agent_can_contact',
        'have_billing_company',
        'billing_company_can_contact',
        'monthly_budget',
        'additional_notes',
        'percentage_of_chart',
        'need_prescriptive_authority',
        'prescribing_substances',
        'provider_need_collaborative_speak',
        'unique_request',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDateOfAgreementAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfAgreementAttribute($value)
    {
        $this->attributes['date_of_agreement'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBeginSeeingPatientsAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBeginSeeingPatientsAttribute($value)
    {
        $this->attributes['begin_seeing_patients'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCvAttribute()
    {
        return $this->getMedia('cv')->last();
    }

    public function getRedactedCvAttribute()
    {
        return $this->getMedia('redacted_cv')->last();
    }

    public function doctors()
    {
        return $this->belongsToMany(Provider::class);
    }
}
