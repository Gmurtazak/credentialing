<?php

namespace App\Dto;

use App\Models\ProjectSaleProductionDetail;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProjectSaleProductionDetailData
 * @package App\Dto
 */
class ProjectSaleProductionDetailData extends DataTransferObject
{
    /**
     * @var bool
     */
    protected $ignoreMissing = true;

    public ?int $id;
    public ?int $project_sale_id;
    public ?string $production_type;
    public ?int $assigned_to;
    public ?string $project_status;
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
     * @return int|null
     */
    public function getProjectSaleId(): ?int
    {
        return $this->project_sale_id;
    }
    public function setProjectSaleId(?int $projectSaleId): void
    {
        $this->project_sale_id = $projectSaleId;
    }

    public function getProductionType(): ?string
    {
        return $this->production_type;
    }
    public function setProductionType(?string $productionType): void
    {
        $this->production_type = $productionType;
    }

    public function getAssignedTo(): ?int
    {
        return $this->assigned_to;
    }
    public function setAssignedTo(?int $assignedTo): void
    {
        $this->assigned_to = $assignedTo;
    }

    public function getProjectStatus(): ?string
    {
        return $this->project_status;
    }
    public function setProjectStatus(?string $projectStatus): void
    {
        $this->project_status = $projectStatus;
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


    public static function fromModel(ProjectSaleProductionDetail $projectSaleProductionDetail): self
    {
        return new static([
            'id' => $projectSaleProductionDetail->id,
            'project_sale_id' =>$projectSaleProductionDetail->project_sale_id,
            'production_type' =>$projectSaleProductionDetail->production_type,
            'assigned_to' =>$projectSaleProductionDetail->assigned_to,
            'project_status' =>$projectSaleProductionDetail->project_status,
            'is_active' =>$projectSaleProductionDetail->is_active,
            'created_at' => $projectSaleProductionDetail->created_at,
            'updated_at' => $projectSaleProductionDetail->updated_at,
        ]);
    }

    public static function fromRequest(Request $request): static
    {
        return new static([
            'project_sale_id' =>$request->get('project_sale_id'),
            'production_type' =>$request->get('production_type'),
            'assigned_to' =>$request->get('assigned_to'),
            'project_status' =>$request->get('project_status'),
            'is_active' => isset($request->is_active),
        ]);
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setProjectSaleId($request->get('project_sale_id'));
        $this->setProductionType($request->get('production_type'));
        $this->setAssignedTo($request->get('assigned_to'));
        $this->setProjectStatus($request->get('project_status'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }
}
