<?php

namespace App\Dto;

use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class InsuranceData
 * @package App\Dto
 */
class InsuranceData extends DataTransferObject
{
    /**
     * @var bool
     */
    protected $ignoreMissing = true;

    /**
     * @var int|null
     */
    public ?int $id;
    public ?int $clinic;
    public ?int $provider;
    public ?int $insurance;
    /**
     * @var string|null
     */
    public ?string $credentialing;
    public ?string $status;
    public ?string $effectivedate;
    public ?string $remarks;
    public ?string $remarksdate;

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
    public function getClinic(): ?int
    {
        return $this->clinic;
    }

    /**
     * @param int|null $clinic
     * @return void
     */
    public function setClinic(?int $clinic): void
    {
        $this->clinic = $clinic;
    }

    /**
     * @return int|null
     */
    public function getProvider(): ?int
    {
        return $this->provider;
    }

    /**
     * @param int|null $provider
     * @return void
     */
    public function setProvider(?int $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return int|null
     */
    public function getInsurance(): ?int
    {
        return $this->insurance;
    }

    /**
     * @param int|null $insurance
     * @return void
     */
    public function setInsurance(?int $insurance): void
    {
        $this->insurance = $insurance;
    }

    /**
     * @return string
     */
    public function getCredentialing(): string
    {
        return $this->credentialing;
    }

    /**
     * @param string $credentialing
     * @return void
     */
    public function setCredentialing(string $credentialing): void
    {
        $this->credentialing = $credentialing;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getEffectivedate(): string
    {
        return $this->effectivedate;
    }

    /**
     * @param string $effectivedate
     * @return void
     */
    public function setEffectivedate(string $effectivedate): void
    {
        $this->effectivedate = $effectivedate;
    }

    /**
     * @return string
     */
    public function getRemarks(): string
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     * @return void
     */
    public function setRemarks(string $remarks): void
    {
        $this->remarks = $remarks;
    }

    /**
     * @return string
     */
    public function getRemarksdate(): string
    {
        return $this->remarksdate;
    }

    /**
     * @param string $remarksdate
     * @return void
     */
    public function setRemarksdate(string $remarksdate): void
    {
        $this->remarksdate = $remarksdate;
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
     * @param Insurance $insurance
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Insurance $insurance): self
    {
        return new static([
            'id' => $insurance->id,
            'clinic' =>$insurance->clinic,
            'provider' =>$insurance->provider,
            'credentialing' =>$insurance->credentialing,
            'insurance'=>$insurance->insurance,
            'status'=>$insurance->status,
            'effectivedate'=>$insurance->effectivedate,
            'remarks'=>$insurance->remarks,
            'remarksdate'=>$insurance->remarksdate,
            'created_at' => $insurance->created_at,
            'updated_at' => $insurance->updated_at,
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
            'clinic' => $request->get('clinic'),
            'provider' => $request->get('provider'),
            'credentialing' => $request->get('credentialing'),
            'insurance' => $request->get('insurance'),
            'status' => $request->get('status'),
            'effectivedate' => $request->get('effectivedate'),
            'remarks' => $request->get('remarks'),
            'remarksdate' => $request->get('remarksdate'),

        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setClinic($request->get('clinic') ?? "");
        $this->setProvider($request->get('provider') ?? "");
        $this->setCredentialing($request->get('credentialing') ?? "");
        $this->setInsurance($request->get('insurance') ?? "");
        $this->setStatus($request->get('status') ?? "");
        $this->setEffectivedate($request->get('effectivedate') ?? "");
        $this->setRemarks($request->get('remarks') ?? "");
        $this->setRemarksdate($request->get('remarksdate') ?? "");
        $this->setUpdatedAt(now());
        return $this;
    }

    /*public static function fromArray($arrayData): static
    {
        return new static([
            'name' => @$arrayData[2],
            'email' => 'N/A',
            'logo' => null,
            'plan_group' => 'N/A',
            'phone' => 'N/A',
            'website' => 'N/A',
            'is_active' => true,
        ]);
    }*/
}
