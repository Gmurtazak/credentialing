<?php

namespace App\Dto;

use App\Models\projectSaleLog;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class TeamData
 * @package App\Dto
 */
class ProjectSaleLogData extends DataTransferObject
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
    public ?int $project_sale_id;
    /**
     * @var float|null
     */
    public ?float $project_price;
    /**
     * @var float|null
     */
    public ?float $our_bid;
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
     * @return int
     */
    public function getProjectSaleId(): int
    {
        return $this->project_sale_id;
    }

    /**
     * @param string $project_sale_id
     * @return void
     */
    public function setProjectSaleId(int $project_sale_id): void
    {
        $this->project_sale_id = $project_sale_id;
    }

    /**
     * @return float|null
     */
    public function getProjectPrice(): ?float
    {
        return $this->project_price;
    }

    /**
     * @param bool|null $project_price
     * @return void
     */
    public function setProjectPrice(?float $project_price){
        $this->project_price = $project_price;
    }
    /**
     * @return float|null
     */
    public function getOurBid(): ?float
    {
        return $this->our_bid;
    }

    /**
     * @param bool|null $our_bid
     * @return void
     */
    public function setOurBid(?float $our_bid){
        $this->our_bid = $our_bid;
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
     * @param projectSaleLog $projectSaleLog
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(projectSaleLog $projectSaleLog): self
    {
        return new static([
            'id' => $projectSaleLog->id,
            'project_sale_id' =>$projectSaleLog->project_sale_id,
            'project_price'=>$projectSaleLog->project_price,
            'our_bid' => $projectSaleLog->our_bid,
            'created_at' => $projectSaleLog->created_at,
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
            'project_sale_id' => $request->get('id'),
            'project_price' => $request->get('project_price'),
            'our_bid' => $request->get('our_bid'),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setProjectSaleId($request->get('project_sale_id'));
        $this->setProjectPrice($request->get('project_price'));
        $this->setOurBid($request->get('our_bid'));
        return $this;
    }


}
