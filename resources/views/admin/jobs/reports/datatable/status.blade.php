<span @class([
    'badge', App\Enums\Job\JobStatus::from($status)->badge()
])>{{ App\Enums\Job\JobStatus::from($status)->description() }}</span>