<?php

namespace App\Dto;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ScheduleData
 * @package App\Dto
 */
class ScheduleData extends DataTransferObject
{
    /**
     * @var bool
     */
    protected $ignoreMissing = true;

    /**
     * @var int|null
     */
    public ?int $id;
    /**
     * @var string|null
     */
    public ?string $name;
    /**
     * @var string|null
     */
    public ?string $expiry_from;
    /**
     * @var string|null
     */
    public ?string $expiry_to;
    /**
     * @var string|null
     */
    public ?string $schedule_hours_day;
    /**
     * @var string|null
     */
    public ?string $total_working_days;
    /**
     * @var string|null
     */
    public ?string $working_days;
    /**
     * @var bool|null
     */
    public ?bool $is_active;
    /**
     * @var \Carbon\Carbon|null
     */
    public ?\Carbon\Carbon $created_at;
    /**
     * @var \Carbon\Carbon|null
     */
    public ?\Carbon\Carbon $updated_at;


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getExpiryFrom(): string
    {
        return $this->expiry_from;
    }

    /**
     * @param string $expiry_from
     * @return void
     */
    public function setExpiryFrom(string $expiry_from): void
    {
        $this->expiry_from = $expiry_from;
    }

    /**
     * @return string
     */
    public function getExpiryTo(): string
    {
        return $this->expiry_to;
    }

    /**
     * @param string $expiry_to
     * @return void
     */
    public function setExpiryTo(string $expiry_to): void
    {
        $this->expiry_to = $expiry_to;
    }


    /**
     * @return string
     */
    public function getScheduleHoursDay(): string
    {
        return $this->schedule_hours_day;
    }

    /**
     * @param string $scheduleHoursDay
     * @return void
     */
    public function setScheduleHoursDay(string $scheduleHoursDay): void
    {
        $this->schedule_hours_day = $scheduleHoursDay;
    }

    /**
     * @return string
     */
    public function getTotalWorkingDays(): string
    {
        return $this->total_working_days;
    }

    /**
     * @param string $totalWorkingDays
     * @return void
     */
    public function setTotalWorkingDays(string $totalWorkingDays): void
    {
        $this->total_working_days = $totalWorkingDays;
    }

    /**
     * @return string
     */
    public function getWorkingDays(): string
    {
        return $this->working_days;
    }

    /**
     * @param string $workingDays
     * @return void
     */
    public function setWorkingDays(string $workingDays): void
    {
        $this->working_days = $workingDays;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    /**
     * @param bool|null $isActive
     * @return void
     */
    public function setIsActive(?bool $isActive){
        $this->is_active = $isActive;
    }
    /**
     * @return \Carbon\Carbon|null
     */
    public function getCreatedAt(): ?\Carbon\Carbon
    {
        return $this->created_at;
    }

    /**
     * @param \Carbon\Carbon|null $created_at
     * @return void
     */
    public function setCreatedAt(?\Carbon\Carbon $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \Carbon\Carbon|null
     */
    public function getUpdatedAt(): ?\Carbon\Carbon
    {
        return $this->updated_at;
    }

    /**
     * @param \Carbon\Carbon|null $updated_at
     * @return void
     */
    public function setUpdatedAt(?\Carbon\Carbon $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param Schedule $schedule
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Schedule $schedule): self
    {
        return new static([
            'id' => $schedule->id,
            'name' => $schedule->name,
            'expiry_from' => $schedule->expiry_from,
            'expiry_to' => $schedule->expiry_to,
            'schedule_hours_day' => $schedule->schedule_hours_day,
            'total_working_days' => $schedule->total_working_days,
            'is_active'=>$schedule->is_active,
            'created_at' => $schedule->created_at,
            'updated_at' => $schedule->updated_at,
        ]);
    }

    /**
     * @param Request $request
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(Request $request): static
    {
        return new static([
            'name' => $request->get('name'),
            'expiry_from' => $request->get('expiry_from'),
            'expiry_to' => $request->get('expiry_to'),
            'schedule_hours_day' => $request->get('schedule_hours_day'),
            'total_working_days' => $request->get('total_working_days'),
            'working_days' => $request->get('working_days'),
            'is_active' => isset($request->is_active),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setName($request->get('name'));
        $this->setExpiryFrom($request->get('expiry_from'));
        $this->setExpiryTo($request->get('expiry_to'));
        $this->setScheduleHoursDay($request->get('schedule_hours_day'));
        $this->setTotalWorkingDays($request->get('total_working_days'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }

}
