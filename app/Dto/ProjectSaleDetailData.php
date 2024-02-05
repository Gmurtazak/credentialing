<?php

namespace App\Dto;

use App\Models\ProjectSaleDetail;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProjectSaleDetailData
 * @package App\Dto
 */
class ProjectSaleDetailData extends DataTransferObject
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
    public ?int $account_id;
    /**
     * @var string|null
     */
    public ?string $date;
    public ?string $connect_uses;
    /**
     * @var float|null
     */
    public ?float $sale_amount;
    public ?int $portal_id;
    /**
     * @var float|null
     */
    public ?float $portal_fee_percentage;
    public ?float $portal_fee;
    public ?float $amount_due;
    public ?float $amount_received;
    public ?float $amount_refund;
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

    public function getAccountId(): ?int
    {
        return $this->project_sale_id;
    }
    public function setAccountId(?int $accountId): void
    {
        $this->account_id = $accountId;
    }

    public function getPortalId(): ?int
    {
        return $this->portal_id;
    }
    public function setPortalId(?int $portalId): void
    {
        $this->portal_id = $portalId;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }



    /**
     * @return string
     */
    public function getConnectUses(): string
    {
        return $this->connect_uses;
    }

    public function setConnectUses(string $connectuses): void
    {
        $this->connect_uses = $connectuses;
    }



    public function getSaleAmount(): float
    {
        return $this->sale_amount;
    }

    public function setSaleAmount(float $saleAmount): void
    {
        $this->sale_amount = $saleAmount;
    }

    public function getPortalFeePercentage(): float
    {
        return $this->portal_fee_percentage;
    }
    public function setPortalFeePercentage(float $portalFeePercentage): void
    {
        $this->portal_fee_percentage = $portalFeePercentage;
    }

    public function getPortalFee(): float
    {
        return $this->portal_fee;
    }
    public function setPortalFee(float $portalFee): void
    {
        $this->portal_fee = $portalFee;
    }

    public function getAmountDue(): float
    {
        return $this->amount_due;
    }
    public function setAmountDue(float $amountDue): void
    {
        $this->amount_due = $amountDue;
    }

    public function getAmountReceived(): float
    {
        return $this->amount_received;
    }
    public function setAmountReceived(float $amountreceived): void
    {
        $this->amount_received = $amountreceived;
    }


    public function getAmountRefund(): float
    {
        return $this->amount_refund;
    }
    public function setAmountRefund(float $amountrefund): void
    {
        $this->amount_refund = $amountrefund;
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


    public static function fromModel(ProjectSaleDetail $projectSaleDetail): self
    {
        return new static([
            'id' => $projectSaleDetail->id,
            'project_sale_id' =>$projectSaleDetail->project_sale_id,
            'account_id' =>$projectSaleDetail->account_id,
            'date' =>$projectSaleDetail->date,
            'sale_amount' =>$projectSaleDetail->sale_amount,
            'portal_id' =>$projectSaleDetail->portal_id,
            'portal_fee_percentage' =>$projectSaleDetail->portal_fee_percentage,
            'portal_fee' =>$projectSaleDetail->portal_fee,
            'connect_uses' =>$projectSaleDetail->connect_uses,
            'amount_due' =>$projectSaleDetail->amount_due,
            'amount_received' =>$projectSaleDetail->amount_received,
            'amount_refund' =>$projectSaleDetail->amount_refund,
            'is_active' =>$projectSaleDetail->is_active,
            'created_at' => $projectSaleDetail->created_at,
            'updated_at' => $projectSaleDetail->updated_at,
        ]);
    }

    public static function fromRequest(Request $request): static
    {
        return new static([
            'project_sale_id' =>$request->get('project_sale_id'),
            'account_id' =>$request->get('account_id'),
            'date' =>$request->get('date'),
            'sale_amount' =>$request->get('sale_amount'),
            'portal_id' =>$request->get('portal_id'),
            'portal_fee_percentage' =>$request->get('portal_fee_percentage'),
            'portal_fee' =>$request->get('portal_fee'),
            'connect_uses' =>$request->get('connect_uses'),
            'amount_due' =>$request->get('amount_due'),
            'amount_received' =>$request->get('amount_received'),
            'amount_refund' =>$request->get('amount_refund'),
            'is_active' => isset($request->is_active),

        ]);
    }
    public static function ArrayRequest(Request $request): static
    {
        return new static([
            'project_sale_id' => $request->project_sale_id,
            'date' => $request->date,
            'connect_uses' => $request->connect_uses,
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setProjectSaleId($request->get('project_sale_id'));
        $this->setAccountId($request->get('account_id'));
        $this->setDate($request->get('date'));
        $this->setSaleAmount($request->get('sale_amount'));
        $this->setPortalId($request->get('portal_id'));
        $this->setPortalFeePercentage($request->get('portal_fee_percentage'));
        $this->setPortalFee($request->get('portal_fee'));
        $this->setConnectUses($request->get('connect_uses'));
        $this->setAmountDue($request->get('amount_due'));
        $this->setAmountReceived($request->get('amount_received'));
        $this->setAmountRefund($request->get('amount_refund'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }
}
