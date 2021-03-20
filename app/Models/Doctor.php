<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Doctor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'doctors';

    protected $appends = [
        'cv',
        'redacted_cv',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'practice',
        'experience',
        'specialization',
        'certifications',
        'communication_form',
        'collaborative_communication',
        'states_licensed',
        'have_malpractice',
        'additional_notes',
        'monthly_stipend',
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

    public function getCvAttribute()
    {
        return $this->getMedia('cv')->last();
    }

    public function getRedactedCvAttribute()
    {
        return $this->getMedia('redacted_cv')->last();
    }
   
    public function providers()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
