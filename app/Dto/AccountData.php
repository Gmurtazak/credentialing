<?php

namespace App\Dto;

use App\Models\Account;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class AccountData
 * @package App\Dto
 */
class AccountData extends DataTransferObject
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
     * @param Account $account
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Account $account): self
    {
        return new static([
            'id' => $account->id,
            'name' =>$account->name,
            'is_active'=>$account->is_active,
            'created_at' => $account->created_at,
            'updated_at' => $account->updated_at,
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
            'name' =>$request->get('name'),
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
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }
}
