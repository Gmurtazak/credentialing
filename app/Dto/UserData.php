<?php

namespace App\Dto;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Date;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class UserData
 * @package App\Dto
 */
class UserData extends DataTransferObject
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
    public ?string $employee_id;
    /**
     * @var String|null
     */
    public ?String $dob;
    /**
     * @var string|null
     */
    public ?string $gender;
    /**
     * @var string|null
     */
    public ?string $phone;
    /**
     * @var string|null
     */
    public ?string $address;
    /**
     * @var string|null
     */
    public ?string $country;
    /**
     * @var string|null
     */
    public ?string $state;
    /**
     * @var string|null
     */
    public ?string $city;
    /**
     * @var int|null
     */
    public ?int $department_id;
    /**
     * @var int|null
     */
    public ?int $team_id;
    /**
     * @var int|null
     */
    public ?int $report_to;
    /**
     * @var int|null
     */
    public ?int $portal_id;
    /**
     * @var string|null
     */
    public ?string $accounts_id;
    /**
     * @var int|null
     */
    public ?int $job_description_id;
    /**
     * @var int|null
     */
    public ?int $role_id;
    /**
     * @var string|null
     */
    public ?string $project;
    public ?string $project_type;

    public ?string $pesudo_name;
    public ?string $image;
    public ?UploadedFile $file;
    /**
     * @var string|null
     */
    public ?string $email;
    /**
     * @var \Carbon\Carbon|null
     */
    public ?\Carbon\Carbon $email_verified_at;
    /**
     * @var string|null
     */
    public ?string $password;

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
     * @return string
     */
    public function getEmployeeId(): string
    {
        return $this->employee_id;
    }

    /**
     * @param string $employeeId
     * @return void
     */
    public function setEmployeeId(string $employeeId): void
    {
        $this->employee_id = $employeeId;
    }

    public function getDob(): ?string
    {
        return $this->dob;
    }

    /**
     * @param String|null $dob
     * @return void
     */
    public function setDob(?String $dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return void
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return void
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return void
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     * @return void
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return void
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return void
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }


    /**
     * @return int|null
     */
    public function getDepartmentId(): ?int
    {
        return $this->department_id;
    }

    /**
     * @param int|null $department_id
     * @return void
     */
    public function setDepartmentId(?int $department_id): void
    {
        $this->department_id = $department_id;
    }

    /**
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->team_id;
    }

    /**
     * @param int|null $teamId
     * @return void
     */
    public function setTeamId(?int $teamId): void
    {
        $this->team_id = $teamId;
    }

    /**
     * @return int|null
     */
    public function getRoleId(): ?int
    {
        return $this->role_id;
    }

    /**
     * @param int|null $roleId
     * @return void
     */
    public function setRoleId(?int $roleId): void
    {
        $this->role_id = $roleId;
    }

    /**
     * @return int|null
     */
    public function getJobDescriptionId(): ?int
    {
        return $this->job_description_id;
    }

    /**
     * @param int|null $job_description_id
     * @return void
     */
    public function setJobDescriptionId(?int $job_description_id): void
    {
        $this->job_description_id = $job_description_id;
    }
    /**
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->account_id;
    }

    /**
     * @param string|null $account_id
     */
    public function setAccountId(?string $account_id)
    {
        $this->account_id = $account_id;
    }


    /**
     * @return string|null
     */
    public function getProject(): ?string
    {
        return $this->project;
    }

    /**
     * @param string|null $project
     */
    public function setProject(?string $project)
    {
        $this->project = $project;
    }

    public function getProjectType(): ?string
    {
        return $this->project_type;
    }

    public function setProjectType(?string $project_type)
    {
        $this->project_type = $project_type;
    }

    /**
     * @return int|null
     */
    public function getReportTo(): ?int
    {
        return $this->report_to;
    }

    /**
     * @param int|null $reportTo
     * @return void
     */
    public function setReportTo(?int $reportTo): void
    {
        $this->report_to = $reportTo;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return \Carbon\Carbon|null
     */
    public function getEmailVerifiedAt(): ?\Carbon\Carbon
    {
        return $this->email_verified_at;
    }

    /**
     * @param \Carbon\Carbon|null $email_verified_at
     * @return void
     */
    public function setEmailVerifiedAt(?\Carbon\Carbon $email_verified_at): void
    {
        $this->email_verified_at = $email_verified_at;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password):void
    {
        $this->password = $password;
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

    public function getPesudoName(): string
    {
        return $this->pesudo_name;
    }
    public function setPesudoName(?string $pesudo_name): void
    {
        $this->pesudo_name = $pesudo_name;
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

    public function getImage(){
        return $this->image;
    }

    public function setImage(?string $image){
        $this->image = $image;
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
     * @param User $user
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(User $user): self
    {
        return new static([
            'id' => $user->id,
            'name' =>$user->name,
            'pesudo_name' =>$user->pesudo_name,
            'image' =>$user->image,
            'employee_id' =>$user->employee_id,
            'dob' =>$user->dob,
            'gender' =>$user->gender,
            'email' => $user->email,
            'password' =>$user->password,
            'phone' =>$user->phone,
            'address' =>$user->address,
            'country' =>$user->country,
            'state' =>$user->state,
            'city' =>$user->city,
            'department_id' =>$user->department_id,
            'team_id' =>$user->team_id,
            'report_to' =>$user->report_to,
            'portal_id' =>$user->portal_id,
            'is_active'=>$user->is_active,
            'account_id' =>$user->account_id,
            'job_description_id' =>$user->job_description_id,
            'email_verified_at' =>$user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }

    /**
     * @param Request $request
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(Request $request)
    {
        return new static([
            'name' => $request->get('name'),
            'dob' => $request->get('dob',NULL),
            'gender' => $request->get('gender',NULL),
            'phone' => $request->get('phone',NULL),
            'address' => $request->get('address',NULL),
            'country' => $request->get('country',NULL),
            'state' => $request->get('state',NULL),
            'city' => $request->get('city',NULL),
            'department_id' => $request->get('department_id',0),
            'team_id' => $request->get('team_id',0),
            'accounts_id' => $request->get('accounts_id',0),
            'report_to' => $request->get('report_to',0),
            'portal_id' => $request->get('portal_id',0),
            'job_description_id' => $request->get('job_description_id',0),
            'role_id' => $request->get('role_id',0),
            'project' => $request->get('project',''),
            'project_type' => $request->get('project_type',''),
            'email' => $request->get('email'),
            'pesudo_name' => $request->get('pesudo_name'),
            'file' => $request->file('file'),
            'employee_id' => $request->get('employee_id',0),
            'password' => bcrypt($request->get('password',12345)),
            'is_active' => $request->get('is_active'),
            'email_verified_at' => NULL,
        ]);
    }

    /**
     * @param Request $request
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequestForLogin(Request $request)
    {
        return [
            'password' => $request->get('password'),
            'email' => $request->get('email'),
            'is_active' => true
        ];
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setPassword(bcrypt($request->get('password',12345)),);
        $this->setIsActive($request->get('is_active',false));
        $this->setUpdatedAt(now());
        $this->setEmailVerifiedAt(now());
        return $this;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequestUpdate(Request $request): static
    {
        $this->setName($request->get('name'));
        $this->setDob($request->get('dob'));
        $this->setGender($request->get('gender'));
        $this->setPhone($request->get('phone'));
        $this->setAddress($request->get('address'));
        //$this->setProject(implode(",", $request->get('project')));
        //$this->setProjectType(implode(",", $request->get('project_type')));
        $this->setCountry($request->get('country'));
        $this->setState($request->get('state'));
        $this->setCity($request->get('city'));
        $this->setDepartmentId($request->get('department_id'));
        $this->setTeamId($request->get('team_id'));
        $this->setAccountId($request->get('accounts_id'));
        $this->setRoleId($request->get('role_id'));
        $this->setReportTo($request->get('report_to'));
        $this->setPortalId($request->get('portal_id'));
        $this->setEmail($request->get('email'));
        $this->setPesudoName($request->get('pesudo_name'));
        $this->setFile($request->file('file'));
        $this->setEmployeeId($request->get('employee_id'));
        $this->setPassword(bcrypt($request->get('password',12345)));
        $this->setIsActive($request->get('is_active'));
        return $this;
    }
}
