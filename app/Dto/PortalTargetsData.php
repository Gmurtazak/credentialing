<?php

namespace App\Dto;

use App\Models\PortalTargets;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class TeamData
 * @package App\Dto
 */
class PortalTargetsData extends DataTransferObject
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
    public ?string $year;
    /**
     * @var float|null
     */
    public ?float $target;
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
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     * @return void
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
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
     * @param PortalTarget $portaltarget
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(PortalTargets $portaltarget): self
    {

        return new static([
            'id' => $portaltarget->id,
            'year'=>$portaltarget->year,
            'target'=>$portaltarget->target,
            'revised_target'=>$portaltarget->revised_target,
            'revised_target_date'=>$portaltarget->revised_target_date,
            'reason'=>$portaltarget->reason,
            'created_at' => $portaltarget->created_at,
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
            'year' => $request->get('year'),
            'target' => $request->get('target'),
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

        $this->setYear($request->get('year'));
        $this->setTarget($request->get('target'));
        $this->setRevisedTarget($request->get('revised_target'));
        $this->setRevisedTargetDate($request->get('revised_target_date'));
        $this->setReason($request->get('reason'));
        $this->setCreatedAt(now());
        return $this;
    }
}
