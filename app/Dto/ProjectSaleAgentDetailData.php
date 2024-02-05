<?php

namespace App\Dto;

use App\Models\ProjectSaleAgentDetail;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProjectSaleAgentDetailData
 * @package App\Dto
 */
class ProjectSaleAgentDetailData extends DataTransferObject
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
    public ?int $project_sale_id;
    /**
     * @var int|null
     */
    public ?int $bidder_id;
    public ?int $closer_id;
    public ?int $caller_id;
    public ?int $sale_shared_to;
    public ?int $sale_shared_to_more;
    public ?int $team_id;
    public ?int $contract_id;
    /**
     * @var bool|null
     */
    public ?bool $is_active;


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

    public function getProjectSaleId(): ?int
    {
        return $this->project_sale_id;
    }

    public function setProjectSaleId(?int $projectSaleId): void
    {
        $this->project_sale_id = $projectSaleId;
    }

    public function getBidderId(): ?int
    {
        return $this->bidder_id;
    }

    public function setBidderId(?int $bidderId): void
    {
        $this->bidder_id = $bidderId;
    }

    public function getCloserId(): ?int
    {
        return $this->closer_id;
    }

    public function setCloserId(?int $closerId): void
    {
        $this->closer_id = $closerId;
    }

    public function getCallerId(): ?int
    {
        return $this->caller_id;
    }

    public function setCallerId(?int $callerId): void
    {
        $this->caller_id = $callerId;
    }

    public function getSaleSharedTo(): ?int
    {
        return $this->sale_shared_to;
    }

    public function setSaleSharedTo(?int $saleSharedTo): void
    {
        $this->sale_shared_to = $saleSharedTo;
    }

    public function getSaleSharedMore(): ?int
    {
        return $this->sale_shared_to_more;
    }

    public function setSaleSharedMore(?int $saleSharedToMore): void
    {
        $this->sale_shared_to_more = $saleSharedToMore;
    }

    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    public function setTeamId(?int $teamId): void
    {
        $this->team_id = $teamId;
    }

    public function getContactId(): ?int
    {
        return $this->contract_id;
    }

    public function setContractId(?int $contractId): void
    {
        $this->contract_id = $contractId;
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


    public static function fromModel(ProjectSaleAgentDetail $projectSaleAgentDetail): self
    {
        return new static([
            'id' => $projectSaleAgentDetail->id,
            'project_sale_id' =>$projectSaleAgentDetail->project_sale_id,
            'bidder_id' =>$projectSaleAgentDetail->bidder_id,
            'closer_id' =>$projectSaleAgentDetail->closer_id,
            'caller_id' =>$projectSaleAgentDetail->caller_id,
            'sale_shared_to' =>$projectSaleAgentDetail->sale_shared_to,
            'sale_shared_to_more' =>$projectSaleAgentDetail->sale_shared_to_more,
            'team_id' =>$projectSaleAgentDetail->team_id,
            'contract_id' =>$projectSaleAgentDetail->contract_id,
            'is_active' =>$projectSaleAgentDetail->is_active,
        ]);
    }

    public static function fromRequest(Request $request): static
    {
        return new static([
            'project_sale_id' =>$request->get('project_sale_id'),
            'bidder_id' =>$request->get('bidder_id'),
            'closer_id' =>$request->get('closer_id'),
            'caller_id' =>$request->get('caller_id'),
            'sale_shared_to' =>$request->get('sale_shared_to'),
            'sale_shared_to_more' =>$request->get('sale_shared_to_more'),
            'team_id' =>$request->get('team_id'),
            'contract_id' =>$request->get('contract_id'),
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
        $this->setBidderId($request->get('bidder_id'));
        $this->setCloserId($request->get('closer_id'));
        $this->setCallerId($request->get('caller_id'));
        $this->setSaleShareTo($request->get('sale_shared_to'));
        $this->setSaleSharedMore($request->get('sale_shared_to_more'));
        $this->setTeamId($request->get('team_id'));
        $this->setContractId($request->get('contract_id'));
        $this->setIsActive($request->get('is_active',false));
        return $this;
    }
}
