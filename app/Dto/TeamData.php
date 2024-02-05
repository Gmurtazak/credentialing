<?php

namespace App\Dto;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class TeamData
 * @package App\Dto
 */
class TeamData extends DataTransferObject
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
    public ?string $principalowner;
    /**
     * @var string|null
     */
    public ?string $primaryaddress;
    /**
     * @var string|null
     */
    public ?string $phone;
    /**
     * @var String|null
     */
    public ?string $fax;
    /**
     * @var string|null
     */
    public ?string $email;
    /**
     * @var string|null
     */
    public ?string $groupspecialty;
    /**
     * @var string|null
     */
    public ?string $facilitynpi;
    /**
     * @var string|null
     */
    public ?string $facilitytax;
    /**
     * @var string|null
     */
    public ?string $facilitytaxclass;
    /**
     * @var string|null
     */
    public ?string $clianumber;
    /**
     * @var string|null
     */
    public ?string $cliaissue;
    /**
     * @var string|null
     */
    public ?string $cliaexpiration;
    /**
     * @var string|null
     */
    public ?string $businessestab;
    /**
     * @var string|null
     */
    public ?string $medicarenum;
    /**
     * @var string|null
     */
    public ?string $medicareeff;
    /**
     * @var string|null
     */
    public ?string $medicaidnum;
    /**
     * @var string|null
     */
    public ?string $medicaideff;
    /**
     * @var string|null
     */
    public ?string $doingbusiness;
    /**
     * @var string|null
     */
    public ?string $nameofprovider;
    /**
     * @var string|null
     */
    public ?string $nameofoffice;
    /**
     * @var string|null
     */
    public ?string $practicelocation;
    /**
     * @var string|null
     */
    public ?string $pphone;
    /**
     * @var string|null
     */
    public ?string $ffax;
    /**
     * @var string|null
     */
    public ?string $nameofemr;
    /**
     * @var string|null
     */
    public ?string $nameofbilling;
    /**
     * @var string|null
     */
    public ?string $is_active;


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
    public function getPrincipalowner(): string
    {
        return $this->principalowner;
    }
    /**
     * @param string $principalowner
     * @return void
     */
    public function setPrincipalowner(string $principalowner): void
    {
        $this->principalowner = $principalowner;
    }
    /**
     * @return string
     */
    public function getPrimaryaddress(): string
    {
        return $this->primaryaddress;
    }
    /**
     * @param string $primaryaddress
     * @return void
     */
    public function setPrimaryaddress(string $primaryaddress): void
    {
        $this->primaryaddress = $primaryaddress;
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
    public function getFax(): string
    {
        return $this->fax;
    }
    /**
     * @param string $fax
     * @return void
     */
    public function setFax(string $fax): void
    {
        $this->fax = $fax;
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
     * @return string
     */
    public function getGroupspecialty(): string
    {
        return $this->groupspecialty;
    }
    /**
     * @param string $groupspecialty
     * @return void
     */
    public function setGroupspecialty(string $groupspecialty): void
    {
        $this->groupspecialty = $groupspecialty;
    }
    /**
     * @return string
     */
    public function getFacilitynpi(): string
    {
        return $this->facilitynpi;
    }
    /**
     * @param string $facilitynpi
     * @return void
     */
    public function setFacilitynpi(string $facilitynpi): void
    {
        $this->facilitynpi = $facilitynpi;
    }
    /**
     * @return string
     */
    public function getFacilitytax(): string
    {
        return $this->facilitytax;
    }
    /**
     * @param string $facilitytax
     * @return void
     */
    public function setFacilitytax(string $facilitytax): void
    {
        $this->facilitytax = $facilitytax;
    }
    /**
     * @return string
     */
    public function getFacilitytaxclass(): string
    {
        return $this->facilitytaxclass;
    }
    /**
     * @param string $facilitytaxclass
     * @return void
     */
    public function setFacilitytaxclass(string $facilitytaxclass): void
    {
        $this->facilitytaxclass = $facilitytaxclass;
    }
    /**
     * @return string
     */
    public function getClianumber(): string
    {
        return $this->clianumber;
    }
    /**
     * @param string $clianumber
     * @return void
     */
    public function setClianumber(string $clianumber): void
    {
        $this->clianumber = $clianumber;
    }
    /**
     * @return string
     */
    public function getCliaissue(): string
    {
        return $this->cliaissue;
    }
    /**
     * @param string $cliaissue
     * @return void
     */
    public function setCliaissue(string $cliaissue): void
    {
        $this->cliaissue = $cliaissue;
    }
    /**
     * @return string
     */
    public function getCliaexpiration(): string
    {
        return $this->cliaexpiration;
    }
    /**
     * @param string $cliaexpiration
     * @return void
     */
    public function setCliaexpiration(string $cliaexpiration): void
    {
        $this->cliaexpiration = $cliaexpiration;
    }
    /**
     * @return string
     */
    public function getBusinessestab(): string
    {
        return $this->businessestab;
    }
    /**
     * @param string $businessestab
     * @return void
     */
    public function setBusinessestab(string $businessestab): void
    {
        $this->businessestab = $businessestab;
    }
    /**
     * @return string
     */
    public function getMedicarenum(): string
    {
        return $this->medicarenum;
    }
    /**
     * @param string $medicarenum
     * @return void
     */
    public function setMedicarenum(string $medicarenum): void
    {
        $this->medicarenum = $medicarenum;
    }
    /**
     * @return string
     */
    public function getMedicareeff(): string
    {
        return $this->medicareeff;
    }
    /**
     * @param string $medicareeff
     * @return void
     */
    public function setMedicareeff(string $medicareeff): void
    {
        $this->medicareeff = $medicareeff;
    }
    /**
     * @return string
     */
    public function getMedicaidnum(): string
    {
        return $this->medicaidnum;
    }
    /**
     * @param string $medicaidnum
     * @return void
     */
    public function setMedicaidnum(string $medicaidnum): void
    {
        $this->medicaidnum = $medicaidnum;
    }
    /**
     * @return string
     */
    public function getMedicaideff(): string
    {
        return $this->medicaideff;
    }
    /**
     * @param string $medicaideff
     * @return void
     */
    public function setMedicaideff(string $medicaideff): void
    {
        $this->medicaideff = $medicaideff;
    }
    /**
     * @return string
     */
    public function getDoingbusiness(): string
    {
        return $this->doingbusiness;
    }
    /**
     * @param string $doingbusiness
     * @return void
     */
    public function setDoingbusiness(string $doingbusiness): void
    {
        $this->doingbusiness = $doingbusiness;
    }
    /**
     * @return string
     */
    public function getNameofprovider(): string
    {
        return $this->nameofprovider;
    }
    /**
     * @param string $nameofprovider
     * @return void
     */
    public function setNameofprovider(string $nameofprovider): void
    {
        $this->nameofprovider = $nameofprovider;
    }
    /**
     * @return string
     */
    public function getNameofoffice(): string
    {
        return $this->nameofoffice;
    }
    /**
     * @param string $nameofoffice
     * @return void
     */
    public function setNameofoffice(string $nameofoffice): void
    {
        $this->nameofoffice = $nameofoffice;
    }
    /**
     * @return string
     */
    public function getPracticelocation(): string
    {
        return $this->practicelocation;
    }
    /**
     * @param string $practicelocation
     * @return void
     */
    public function setPracticelocation(string $practicelocation): void
    {
        $this->practicelocation = $practicelocation;
    }
    /**
     * @return string
     */
    public function getPphone(): string
    {
        return $this->pphone;
    }
    /**
     * @param string $pphone
     * @return void
     */
    public function setPphone(string $pphone): void
    {
        $this->pphone = $pphone;
    }
    /**
     * @return string
     */
    public function getFfax(): string
    {
        return $this->ffax;
    }
    /**
     * @param string $ffax
     * @return void
     */
    public function setFfax(string $ffax): void
    {
        $this->ffax = $ffax;
    }
    /**
     * @return string
     */
    public function getNameofemr(): string
    {
        return $this->nameofemr;
    }
    /**
     * @param string $ffax
     * @return void
     */
    public function setNameofemr(string $nameofemr): void
    {
        $this->nameofemr = $nameofemr;
    }
    /**
     * @return string
     */
    public function getNameofbilling(): string
    {
        return $this->nameofbilling;
    }
    /**
     * @param string $nameofbilling
     * @return void
     */
    public function setNameofbilling(string $nameofbilling): void
    {
        $this->nameofbilling = $nameofbilling;
    }


    /**
     * @return string
     */
    public function getIsActive(): string
    {
        return $this->is_active;
    }

    /**
     * @param string $isActive
     * @return void
     */
    public function setIsActive(string $isActive): void{
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
     * @param Team $team
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Team $team): self
    {
        return new static([
            'id' => $team->id,
            'name' =>$team->name,
            'principalowner'=>$team->principalowner,
            'primaryaddress'=>$team->primaryaddress,
            'phone'=>$team->phone,
            'fax'=>$team->fax,
            'email'=>$team->email,
            'groupspecialty'=>$team->groupspecialty,
            'facilitynpi'=>$team->facilitynpi,
            'facilitytax'=>$team->facilitytax,
            'facilitytaxclass'=>$team->facilitytaxclass,
            'clianumber'=>$team->clianumber,
            'cliaissue'=>$team->cliaissue,
            'cliaexpiration'=>$team->cliaexpiration,
            'businessestab'=>$team->businessestab,
            'medicarenum'=>$team->medicarenum,
            'medicareeff'=>$team->medicareeff,
            'medicaidnum'=>$team->medicaidnum,
            'medicaideff'=>$team->medicaideff,
            'doingbusiness'=>$team->doingbusiness,
            'nameofprovider'=>$team->nameofprovider,
            'nameofoffice'=>$team->nameofoffice,
            'practicelocation'=>$team->practicelocation,
            'pphone'=>$team->pphone,
            'ffax'=>$team->ffax,
            'nameofemr'=>$team->nameofemr,
            'nameofbilling'=>$team->nameofbilling,
            'is_active'=>$team->is_active,
            'created_at' => $team->created_at,
            'updated_at' => $team->updated_at,
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
            'principalowner' => $request->get('principalowner'),
            'primaryaddress' => $request->get('primaryaddress'),
            'phone' => $request->get('phone'),
            'fax' => $request->get('fax'),
            'email' => $request->get('email'),
            'groupspecialty' => $request->get('groupspecialty'),
            'facilitynpi' => $request->get('facilitynpi'),
            'facilitytax' => $request->get('facilitytax'),
            'facilitytaxclass' => $request->get('facilitytaxclass'),
            'clianumber' => $request->get('clianumber'),
            'cliaissue' => $request->get('cliaissue'),
            'cliaexpiration' => $request->get('cliaexpiration'),
            'businessestab' => $request->get('businessestab'),
            'medicarenum' => $request->get('medicarenum'),
            'medicareeff' => $request->get('medicareeff'),
            'medicaidnum' => $request->get('medicaidnum'),
            'medicaideff' => $request->get('medicaideff'),
            'doingbusiness' => $request->get('doingbusiness'),
            'nameofprovider' => $request->get('nameofprovider'),
            'nameofoffice' => $request->get('nameofoffice'),
            'practicelocation' => $request->get('practicelocation'),
            'pphone' => $request->get('pphone'),
            'ffax' => $request->get('ffax'),
            'nameofemr' => $request->get('nameofemr'),
            'nameofbilling' => $request->get('nameofbilling'),
            'is_active' => $request->is_active,
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setName($request->get('name') ?? "");
        $this->setPrincipalowner($request->get('principalowner') ?? "");
        $this->setPrimaryaddress($request->get('primaryaddress') ?? "");
        $this->setPhone($request->get('phone') ?? "");
        $this->setFax($request->get('fax') ?? "");
        $this->setEmail($request->get('email') ?? "");
        $this->setGroupspecialty($request->get('groupspecialty') ?? "");
        $this->setFacilitynpi($request->get('facilitynpi') ?? "");
        $this->setFacilitytax($request->get('facilitytax') ?? "");
        $this->setFacilitytaxclass($request->get('facilitytaxclass') ?? "");
        $this->setClianumber($request->get('clianumber') ?? "");
        $this->setCliaissue($request->get('cliaissue') ?? "");
        $this->setCliaexpiration($request->get('cliaexpiration') ?? "");
        $this->setBusinessestab($request->get('businessestab') ?? "");
        $this->setMedicarenum($request->get('medicarenum') ?? "");
        $this->setMedicareeff($request->get('medicareeff') ?? "");
        $this->setMedicaidnum($request->get('medicaidnum') ?? "");
        $this->setMedicaideff($request->get('medicaideff') ?? "");
        $this->setDoingbusiness($request->get('doingbusiness') ?? "");
        $this->setNameofprovider($request->get('nameofprovider') ?? "");
        $this->setNameofoffice($request->get('nameofoffice') ?? "");
        $this->setPracticelocation($request->get('practicelocation') ?? "");
        $this->setPphone($request->get('pphone') ?? "");
        $this->setFfax($request->get('ffax',)?? "");
        $this->setNameofemr($request->get('nameofemr') ?? "");
        $this->setNameofbilling($request->get('nameofbilling') ?? "");
        $this->setIsActive($request->get('is_active') ?? "");
        $this->setUpdatedAt(now());
        return $this;
    }
}
