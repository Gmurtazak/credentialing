<?php

namespace App\Dto;

use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class PortalData
 * @package App\Dto
 */
class PortalData extends DataTransferObject
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
    public ?string $email;
    /**
     * @var string|null
     */
    public ?string $logo;
    /**
     * @var UploadedFile
     */
    public ?UploadedFile $file;
    /**
     * @var string|null
     */
    public ?string $plan_group;
    /**
     * @var string|null
     */
    public ?string $phone;

    /**
     * @var string|null
     */
    public ?string $website;
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
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return void
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
    }


    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     * @return void
     */
    public function setFile(?UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return string|null
     */
    public function getLogo(){
        return $this->logo;
    }

    /**
     * @param string|null $logo
     * @return void
     */
    public function setLogo(?string $logo){
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getPlanGroup(): string
    {
        return $this->plan_group;
    }

    /**
     * @param string $plan_group
     * @return void
     */
    public function setPlanGroup(string $plan_group): void
    {
        $this->plan_group = $plan_group;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return void
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
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
     * @param Portal $portal
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Portal $portal): self
    {
        return new static([
            'id' => $portal->id,
            'name' =>$portal->name,
            'website' =>$portal->website,
            'logo' =>$portal->logo,
            'plan_group' =>$portal->plan_group,
            'phone' =>$portal->phone,
            'is_active'=>$portal->is_active,
            'created_at' => $portal->created_at,
            'updated_at' => $portal->updated_at,
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
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'file' => $request->file('file'),
            'plan_group' => $request->get('plan_group'),
            'phone' => $request->get('phone'),
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
        $this->setEmail($request->get('email'));
        $this->setWebsite($request->get('website'));
        $this->setFile($request->file('file'));
        $this->setPlanGroup($request->get('plan_group'));
        $this->setPhone($request->get('phone'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }

    public static function fromArray($arrayData): static
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
    }
}
