<?php

namespace App\Dto;

use App\Models\ProjectSale;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProjectSaleData
 * @package App\Dto
 */
class ProjectSaleData extends DataTransferObject
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
    public ?string $project_name;
    /**
     * @var int|null
     */
    public ?int $project_type_id;
    /**
     * @var string|null
     */
    public ?string $project_details;
    public ?string $project_link;
    public ?string $trello_link;
    /**
     * @var int|null
     */
    public ?int $portal_id;
    /**
     * @var int|null
     */
    public ?int $team_id;

    /**
     * @var int|null
     */
    public ?int $created_by;
    /**
     * @var int|null
     */
    public ?int $client_id;
    /**
     * @var string|null
     */
    public ?string $country;
    /**
     * @var string|null
     */
    public ?string $city;
    /**
     * @var float|null
     */
    public ?float $project_price;
    /**
     * @var string|null
     */
    public ?string $rate_method;
    /**
     * @var float|null
     */
    public ?float $our_bid;
    /**
     * @var string|null
     */
    public ?string $contact_date;
    /**
     * @var bool|null
     */
    public ?bool $is_meeting_requested;
    /**
     * @var string|null
     */
    public ?string $meeting_datetime;
    /**
     * @var bool|null
     */
    public ?bool $meeting_status;
    /**
     * @var string|null
     */
    public ?string $comments;
    /**
     * @var bool|null
     */
    public ?bool $is_convertion;
    /**
     * @var string|null
     */
    public ?string $reason;
    /**
     * @var string|null
     */
    public ?string $reason_details;


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
    public function getProjectName(): string
    {
        return $this->project_name;
    }

    /**
     * @param string $projectName
     * @return void
     */
    public function setProjectName(string $projectName): void
    {
        $this->project_name = $projectName;
    }

    /**
     * @return int|null
     */
    public function getProjectTypeId(): ?int
    {
        return $this->project_type_id;
    }

    /**
     * @param int|null $projectTypeId
     * @return void
     */
    public function setProjectTypeId(?int $projectTypeId): void
    {
        $this->project_type_id = $projectTypeId;
    }

    /**
     * @return string
     */
    public function getProjectDetails(): string
    {
        return $this->project_details;
    }

    /**
     * @param string $projectDetails
     * @return void
     */
    public function setProjectDetails(string $projectDetails): void
    {
        $this->project_details = $projectDetails;
    }

    public function getProjectLink(): string
    {
        return $this->project_link;
    }

    public function setProjectLink(string $projectLink): void
    {
        $this->project_link = $projectLink;
    }

    public function getTrelloLink(): string
    {
        return $this->trello_link;
    }

    public function setTrelloLink(string $trello_link): void
    {
        $this->trello_link = $trello_link;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    /**
     * @param int|null $clientId
     * @return void
     */
    public function setClientId(?int $clientId): void
    {
        $this->client_id = $clientId;
    }
    /**
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    /**
     * @param int|null $team_id
     * @return void
     */
    public function setTeamId(?int $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return int|null
     */
    public function getCreatedBy(): ?int
    {
        return $this->created_by;
    }

    /**
     * @param int|null $created_by
     * @return void
     */
    public function setCreatedBy(?int $created_by): void
    {
        $this->created_by = $created_by;
    }

    /**
     * @return int|null
     */
    public function getPortalId(): ?int
    {
        return $this->portal_id;
    }

    /**
     * @param int|null $portal_id
     * @return void
     */
    public function setPortalId(?int $portal_id): void
    {
        $this->portal_id = $portal_id;
    }



    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return void
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return float
     */
    public function getProjectPrice(): float
    {
        return $this->project_price;
    }

    /**
     * @param float $projectPrice
     * @return void
     */
    public function setProjectPrice(float $projectPrice): void
    {
        $this->project_price = $projectPrice;
    }

    /**
     * @return string
     */
    public function getRateMethod(): string
    {
        return $this->rate_method;
    }

    /**
     * @param string $rate_method
     * @return void
     */
    public function setRateMethod(string $rate_method): void
    {
        $this->rate_method = $rate_method;
    }
    /**
     * @return float
     */
    public function getOurBid(): float
    {
        return $this->our_bid;
    }

    /**
     * @param float $ourBid
     * @return void
     */
    public function setOurBid(float $ourBid): void
    {
        $this->our_bid = $ourBid;
    }

    /**
     * @return string
     */
    public function getContactDate(): string
    {
        return $this->contact_date;
    }

    /**
     * @param string $contactDate
     * @return void
     */
    public function setContactDate(string $contactDate): void
    {
        $this->contact_date = $contactDate;
    }

    /**
     * @return bool|null
     */
    public function getIsMeetingRequested(): ?bool
    {
        return $this->is_meeting_requested;
    }

    /**
     * @param bool|null $isMeetingRequested
     * @return void
     */
    public function setIsMeetingRequested(?bool $isMeetingRequested){
        $this->is_meeting_requested = $isMeetingRequested;
    }

    /**
     * @return string
     */
    public function getMeetingDatetime(): string
    {
        return $this->meeting_datetime;
    }

    /**
     * @param string $meetingDatetime
     * @return void
     */
    public function setMeetingDatetime(string $meetingDatetime): void
    {
        $this->meeting_datetime = $meetingDatetime;
    }

    /**
     * @return bool|null
     */
    public function getMeetingStatus(): ?bool
    {
        return $this->meeting_status;
    }

    /**
     * @param bool|null $meetingStatus
     * @return void
     */
    public function setMeetingStatus(?bool $meetingStatus){
        $this->meeting_status = $meetingStatus;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return void
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return bool|null
     */
    public function getIsConvertion(): ?bool
    {
        return $this->is_convertion;
    }

    /**
     * @param bool|null $isConvertion
     * @return void
     */
    public function setIsConvertion(?bool $isConvertion){
        $this->is_convertion = $isConvertion;
    }

    /**
     * @return bool|null
     */
    public function getReason(): ?bool
    {
        return $this->reason;
    }

    /**
     * @param bool|null $reason
     * @return void
     */
    public function setReason(?bool $reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return bool|null
     */
    public function getReasonDetails(): ?bool
    {
        return $this->reason_details;
    }

    /**
     * @param bool|null $reasonDetails
     * @return void
     */
    public function setReasonDetails(?bool $reasonDetails)
    {
        $this->reason_details = $reasonDetails;
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
     * @param ProjectSale $projectSale
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(ProjectSale $projectSale): self
    {
        return new static([
            'id' => $projectSale->id,
            'project_name' =>$projectSale->project_name,
            'project_type_id' =>$projectSale->project_type_id,
            'project_details' =>$projectSale->project_details,
            'project_link' =>$projectSale->project_link,
            'trello_link' =>$projectSale->trello_link,
            'client_id' =>$projectSale->client_id,
            'potal_id' =>$projectSale->portal_id,
            'team_id' =>$projectSale->team_id,
            'country' =>$projectSale->country,
            'city' =>$projectSale->city,
            'project_price' =>$projectSale->project_price,
            'rate_method' =>$projectSale->rate_method,
            'our_bid' =>$projectSale->our_bid,
            'contact_date' =>$projectSale->contact_date,
            'is_meeting_requested' =>$projectSale->is_meeting_requested,
            'meeting_datetime' =>$projectSale->meeting_datetime,
            'meeting_status' =>$projectSale->meeting_status,
            'comments' =>$projectSale->comments,
            'is_convertion' =>$projectSale->is_convertion,
            'reason' =>$projectSale->reason,
            'reason_details' =>$projectSale->reason_details,
            'is_active' =>$projectSale->is_active,
            'created_at' => $projectSale->created_at,
            'updated_at' => $projectSale->updated_at,
            'created_by' => $projectSale->created_by,
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
            'project_name' =>$request->get('project_name'),
            'project_type_id' =>$request->get('project_type_id'),
            'project_details' =>$request->get('project_details'),
            'project_link' =>$request->get('project_link'),
            'trello_link' =>$request->get('trello_link'),
            'client_id' =>$request->get('client_id'),
            'portal_id' =>$request->get('portal_id'),
            'team_id' =>$request->get('team_id'),
            'country' =>$request->get('country'),
            'city' =>$request->get('city'),
            'project_price' =>$request->get('project_price'),
            'rate_method' =>$request->get('rate_method'),
            'our_bid' =>$request->get('our_bid'),
            'contact_date' =>$request->get('contact_date'),
            'is_meeting_requested' =>$request->get('is_meeting_requested'),
            'meeting_datetime' =>$request->get('meeting_datetime'),
            'meeting_status' =>$request->get('meeting_status'),
            'comments' =>$request->get('comments'),
            'is_convertion' =>$request->get('is_convertion'),
            'reason' =>$request->get('reason'),
            'reason_details' =>$request->get('reason_details'),
            'is_active' => isset($request->is_active),
            'created_by' =>$request->get('created_by'),

        ]);
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setProjectName($request->get('project_name'));
        $this->setProjectTypeId($request->get('project_type_id'));
        $this->setProjectDetails($request->get('project_details'));
        $this->setProjectLink($request->get('project_link'));
        $this->setTrelloLink($request->get('trello_link'));
        $this->setClientId($request->get('client_id'));
        $this->setPortalId($request->get('portal_id'));
        $this->setTeamId($request->get('team_id'));
        $this->setCountry($request->get('country'));
        $this->setCity($request->get('city'));
        $this->setProjectPrice($request->get('project_price'));
        $this->setRateMethod($request->get('rate_method'));
        $this->setOurBid($request->get('our_bid'));
        $this->setContactDate($request->get('contact_date'));
        $this->setIsMeetingRequested($request->get('is_meeting_requested'));
        $this->setMeetingDatetime($request->get('meeting_datetime'));
        $this->setMeetingStatus($request->get('meeting_status'));
        $this->setComments($request->get('comments'));
        $this->setIsConvertion($request->get('is_convertion'));
        $this->setReason($request->get('reason'));
        $this->setReasonDetails($request->get('reason_details'));
        $this->setIsActive($request->get('is_active',false));
        $this->setCreatedBy($request->get('created_by'));
        $this->setUpdatedAt(now());
        return $this;
    }
}
