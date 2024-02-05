<?php

namespace App\Dto;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class DepartmentData
 * @package App\Dto
 */
class DepartmentData extends DataTransferObject
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
     * @var bool|null
     */
    public ?bool $is_active;
    /**
     * @var int|null
     */
    public ?int $owner_id;
    /**
     * @var string|null
     */
    public ?string $logo;

    /**
     * @var UploadedFile
     */
    public ?UploadedFile $file;

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
    public function setIsActive(?bool $isActive)
    {
        $this->is_active = $isActive;
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

    public function getOwnerId(){
        return $this->owner_id;
    }
    public function setOwnerId(?int $owner_id){
        $this->owner_id = $owner_id;
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
     * @param Department $department
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Department $department): self
    {
        return new static([
            'id' => $department->id,
            'name' =>$department->name,
            'is_active'=>$department->is_active,
            'logo'=>$department->logo,
            'owner_id'=>$department->owner_id,
            'created_at' => $department->created_at,
            'updated_at' => $department->updated_at,
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
            'owner_id' => $request->get('owner_id'),
            'file' => $request->file('file'),
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
        $this->setOwnerId($request->get('owner_id'));
        $this->setFile($request->file('file'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }
}
