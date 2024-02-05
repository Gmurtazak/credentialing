<?php

namespace App\Dto;

use App\Models\TeamTargets;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class TeamData
 * @package App\Dto
 */

class TeamTargetsData extends DataTransferObject
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
     * @var int|null
     */
    public ?int $team_id;
    /**
     * @var float|null
     */
    public ?float $target;
    /**
     * @var String|null
     */
    public ?String $month;
    /**
     * @var float|null
     */
    public ?float $revised_target;

    /**
     * @var String|null
     */
    public ?String $revised_target_date;
    /**
     * @var string|null
     */
    public ?string $reason;
    /**
     * @var \Carbon\Carbon|null
     */

    public ?\Carbon\Carbon $created_at;



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
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    /**
     * @param int|null $team_id
     * @return void
     */
    public function setTeamId(?int $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }



    /**
     * @param string $target
     * @return void
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @param string $month
     * @return void
     */
    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }
    /**
     * @return string
     */
    public function getRevisedTarget(): string
    {
        return $this->revisedtarget;
    }

    /**
     * @param string $revisedtarget
     * @return void
     */
    public function setRevisedTarget(string $revisedtarget): void
    {
        $this->revised_target = $revisedtarget;
    }

    /**
     * @return string
     */
    public function getRevisedTargetDate(): string
    {
        return $this->revisedtargetdate;
    }

    /**
     * @param string $revisedtargetdate
     * @return void
     */
    public function setRevisedTargetDate(string $revisedtargetdate): void
    {
        $this->revised_target_date = $revisedtargetdate;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return void
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
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
     * @param TeamTargets $TeamTargets
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(TeamTargets $TeamTargets): self
    {
        return new static([
            'id' => $TeamTargets->id,
            'team_id' =>$TeamTargets->team_id,
            'target'=>$TeamTargets->target,
            'month'=>$TeamTargets->month,
            'revised_target'=>$TeamTargets->revised_target,
            'revised_target_date'=>$TeamTargets->revised_target_date,
            'reason'=>$TeamTargets->reason,
            'created_at' => $TeamTargets->created_at,
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
            'team_id' => $request->get('team_id'),
            'target' => $request->get('target'),
            'month' => $request->get('month'),
            'revised_target' => $request->get('revised_target'),
            'revised_target_date' => $request->get('revised_target_date'),
            'reason' => $request->get('reason'),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setTeamId($request->get('team_id'));
        $this->setTarget($request->get('target'));
        $this->setMonth($request->get('month'));
        $this->setRevisedTarget($request->get('revised_target'));
        $this->setRevisedTargetDate($request->get('revised_target_date'));
        $this->setReason($request->get('reason'));
        $this->setCreatedAt(now());
        return $this;
    }
}
