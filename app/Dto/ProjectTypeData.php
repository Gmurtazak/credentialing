<?php

namespace App\Dto;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProjectTypeData
 * @package App\Dto
 */
class ProjectTypeData extends DataTransferObject
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
    public ?string $type;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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

    public static function fromModel(ProjectType $projectType): self
    {
        return new static([
            'id' => $projectType->id,
            'type' =>$projectType->type,
            'is_active'=>$projectType->is_active,
            'created_at' => $projectType->created_at,
            'updated_at' => $projectType->updated_at,
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
            'type' => $request->get('type'),
            'is_active' => isset($request->is_active),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setType($request->get('type'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }
}
