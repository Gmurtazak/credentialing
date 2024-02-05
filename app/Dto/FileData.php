<?php

namespace App\Dto;

use App\Models\File;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class FileData
 * @package App\Dto
 */
class FileData extends DataTransferObject
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
    public ?string $file_name;
    /**
     * @var string|null
     */
    public ?string $file_link;
    /**
     * @var int|null
     */
    public ?int $pages;
    /**
     * @var int|null
     */
    public ?int $dos_count;
    /**
     * @var string|null
     */
    public ?string $received_on;
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
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     * @return void
     */
    public function setFileName(string $file_name): void
    {
        $this->file_name = $file_name;
    }
    /**
     * @return string
     */
    public function getFileLink(): string
    {
        return $this->file_link;
    }
    /**
     * @param string $file_link
     * @return void
     */
    public function setFileLink(string $file_link): void
    {
        $this->file_link = $file_link;
    }

    /**
     * @return int|null
     */
    public function getPages(): ?int
    {
        return $this->pages;
    }

    /**
     * @param int|null $pages
     * @return void
     */
    public function setPages(?int $pages): void
    {
        $this->pages = $pages;
    }

    /**
     * @return int|null
     */
    public function getDosCount(): ?int
    {
        return $this->dos_count;
    }

    /**
     * @param int|null $dosCount
     * @return void
     */
    public function setDosCount(?int $dosCount): void
    {
        $this->dos_count = $dosCount;
    }

    /**
     * @return \Carbon\Carbon|null
     */
    public function getReceivedOn(): ?\Carbon\Carbon
    {
        return $this->received_on;
    }

    /**
     * @param string|null $received_on
     * @return void
     */
    public function setReceivedOn(?string $received_on): void
    {
        $this->received_on = $received_on;
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
     * @param File $file
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(File $file): self
    {
        return new static([
            'id' => $file->id,
            'file_name' =>$file->file_name,
            'file_link' =>$file->file_link,
            'pages' =>$file->pages,
            'dos_count' =>$file->dos_count,
            'received_on' =>$file->received_on,
            'is_active'=>$file->is_active,
            'created_at' => $file->created_at,
            'updated_at' => $file->updated_at,
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
            'file_name' => $request->get('file_name'),
            'file_link' => $request->get('file_link'),
            'pages' => $request->get('pages'),
            'dos_count' => $request->get('dos_count'),
            'received_on' => $request->get('received_on'),
            'is_active' => isset($request->is_active),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setFileName($request->get('file_name'));
        $this->setFileLink($request->get('file_link'));
        $this->setPages($request->get('pages'));
        $this->setDosCount($request->get('dos_count'));
        $this->setReceivedOn($request->get('received_on'));
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        return $this;
    }

    /**
     * @param Request $request
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromWorkAssignmentRequest(Request $request): static
    {
        return new static([
            'file_name' => $request->get('file_field'),
            'file_link' => $request->get('file_link'),
            'pages' => $request->get('pages'),
            'dos_count' => $request->get('dos_count'),
            'received_on' => $request->get('received_on'),
            'is_active' => true,
        ]);
    }

    public static function fromArray($arrayData): static
    {
        return new static([
            'file_name' => @$arrayData[0],
            'file_link' => 'N/A',
            'pages' => @$arrayData[3],
            'dos_count' => @$arrayData[4],
            'received_on' => getDateFormat($arrayData[1],'Y-m-d'),
            'is_active' => true,
        ]);
    }
}
