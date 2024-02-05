<?php

namespace App\Dto;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ClientData
 * @package App\Dto
 */
class ClientData extends DataTransferObject
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
    public ?string $clinicid;
    public ?string $name;
    public ?string $indnpi;
    public ?string $logo;
    public ?string $logoone;
    public ?string $logotwo;
    public ?string $logothree;
    public ?string $logofour;
    public ?string $logofive;
    public ?string $logosix;
    public ?string $logoseven;
    public ?string $logoeight;
    public ?string $logonine;
    public ?string $logoten;
    public ?string $logoevelen;
    public ?string $logotwelve;
    public ?string $logothird;
    public ?UploadedFile $file;
    public ?UploadedFile $fileone;
    public ?UploadedFile $filetwo;
    public ?UploadedFile $filethree;
    public ?UploadedFile $filefour;
    public ?UploadedFile $filefive;
    public ?UploadedFile $filesix;
    public ?UploadedFile $fileseven;
    public ?UploadedFile $fileeight;
    public ?UploadedFile $filenine;
    public ?UploadedFile $fileten;
    public ?UploadedFile $fileeleven;
    public ?UploadedFile $filetwelve;
    public ?UploadedFile $filethird;
    /**
     * @var string|null
     */
    public ?string $ssn;
    public ?string $ps;
    public ?string $dob;
    public ?string $phone;
    public ?string $email;
    public ?string $statel;
    public ?string $lid;
    public ?string $led;
    public ?string $driverl;
    public ?string $dlid;
    public ?string $dled;
    public ?string $deal;
    public ?string $deaid;
    public ?string $dpsl;
    public ?string $dpsid;
    public ?string $dpsed;
    public ?string $medicarenum;
    public ?string $medicareeff;
    public ?string $medicaidnum;
    public ?string $medicaideff;
    public ?string $caqhnum;
    public ?string $username;
    public ?string $password;
    public ?string $pob;
    public ?string $citizenship;
    public ?string $hospitalprivileges;
    public ?string $mdnppa;
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
    public function getClinicid(): string
    {
        return $this->clinicid;
    }

    /**
     * @param string $clinicid
     * @return void
     */
    public function setClinicid(string $clinicid): void
    {
        $this->clinicid = $clinicid;
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
    public function getIndnpi(): string
    {
        return $this->indnpi;
    }

    /**
     * @param string $indnpi
     * @return void
     */
    public function setIndnpi(string $indnpi): void
    {
        $this->indnpi = $indnpi;
    }



    /**
     * @return string
     */
    public function getSsn(): string
    {
        return $this->ssn;
    }

    /**
     * @param string $ssn
     * @return void
     */
    public function setSsn(string $ssn): void
    {
        $this->ssn = $ssn;
    }

    /**
     * @return string
     */
    public function getPs(): string
    {
        return $this->ps;
    }

    /**
     * @param string $ps
     * @return void
     */
    public function setPs(string $ps): void
    {
        $this->ps = $ps;
    }

    /**
     * @return string
     */
    public function getDob(): string
    {
        return $this->dob;
    }
    /**
     * @param string $dob
     * @return void
     */
    public function setDob(string $dob): void
    {
        $this->dob = $dob;
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
    public function getStatel(): string
    {
        return $this->statel;
    }
    /**
     * @param string $statel
     * @return void
     */
    public function setStatel(string $statel): void
    {
        $this->statel = $statel;
    }

    /**
     * @return string
     */
    public function getLid(): string
    {
        return $this->lid;
    }
    /**
     * @param string $lid
     * @return void
     */
    public function setLid(string $lid): void
    {
        $this->lid = $lid;
    }

    /**
     * @return string
     */
    public function getLed(): string
    {
        return $this->led;
    }
    /**
     * @param string $led
     * @return void
     */
    public function setLed(string $led): void
    {
        $this->led = $led;
    }

    /**
     * @return string
     */
    public function getDriverl(): string
    {
        return $this->driverl;
    }
    /**
     * @param string $driverl
     * @return void
     */
    public function setDriverl(string $driverl): void
    {
        $this->driverl = $driverl;
    }

    /**
     * @return string
     */
    public function getDlid(): string
    {
        return $this->dlid;
    }
    /**
     * @param string $dlid
     * @return void
     */
    public function setDlid(string $dlid): void
    {
        $this->dlid = $dlid;
    }

    /**
     * @return string
     */
    public function getDled(): string
    {
        return $this->dled;
    }
    /**
     * @param string $dled
     * @return void
     */
    public function setDled(string $dled): void
    {
        $this->dled = $dled;
    }

    /**
     * @return string
     */
    public function getDeal(): string
    {
        return $this->deal;
    }
    /**
     * @param string $deal
     * @return void
     */
    public function setDeal(string $deal): void
    {
        $this->deal = $deal;
    }

    /**
     * @return string
     */
    public function getDeaid(): string
    {
        return $this->deaid;
    }
    /**
     * @param string $deaid
     * @return void
     */
    public function setDeaid(string $deaid): void
    {
        $this->deaid = $deaid;
    }

    /**
     * @return string
     */
    public function getDeaed(): string
    {
        return $this->deaed;
    }
    /**
     * @param string $deaed
     * @return void
     */
    public function setDeaed(string $deaed): void
    {
        $this->deaed = $deaed;
    }

    /**
     * @return string
     */
    public function getDpsl(): string
    {
        return $this->dpsl;
    }
    /**
     * @param string $dpsl
     * @return void
     */
    public function setDpsl(string $dpsl): void
    {
        $this->dpsl = $dpsl;
    }


    /**
     * @return string
     */
    public function getDpsid(): string
    {
        return $this->dpsid;
    }
    /**
     * @param string $dpsid
     * @return void
     */
    public function setDpsid(string $dpsid): void
    {
        $this->dpsid = $dpsid;
    }

    /**
     * @return string
     */
    public function getDpsed(): string
    {
        return $this->dpsed;
    }
    /**
     * @param string $dpsed
     * @return void
     */
    public function setDpsed(string $dpsed): void
    {
        $this->dpsed = $dpsed;
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
    public function getCaqhnum(): string
    {
        return $this->caqhnum;
    }
    /**
     * @param string $caqhnum
     * @return void
     */
    public function setCaqhnum(string $caqhnum): void
    {
        $this->caqhnum = $caqhnum;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    /**
     * @param string $username
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPob(): string
    {
        return $this->pob;
    }
    /**
     * @param string $pob
     * @return void
     */
    public function setPob(string $pob): void
    {
        $this->pob = $pob;
    }

    /**
     * @return string
     */
    public function getSob(): string
    {
        return $this->sob;
    }
    /**
     * @param string $sob
     * @return void
     */
    public function setSob(string $sob): void
    {
        $this->sob = $sob;
    }

    /**
     * @return string
     */
    public function getCitizenship(): string
    {
        return $this->citizenship;
    }
    /**
     * @param string $citizenship
     * @return void
     */
    public function setCitizenship(string $citizenship): void
    {
        $this->citizenship = $citizenship;
    }

    /**
     * @return string
     */
    public function getHospitalprivileges(): string
    {
        return $this->hospitalprivileges;
    }
    /**
     * @param string $hospitalprivileges
     * @return void
     */
    public function setHospitalprivileges(string $hospitalprivileges): void
    {
        $this->hospitalprivileges = $hospitalprivileges;
    }

    /**
     * @return string
     */
    public function getMdnppa(): string
    {
        return $this->mdnppa;
    }
    /**
     * @param string $mdnppa
     * @return void
     */
    public function setMdnppa(string $mdnppa): void
    {
        $this->mdnppa = $mdnppa;
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
     * @return UploadedFile|null
     */
    public function getFileone(): ?UploadedFile
    {

        return $this->fileone;
    }

    /**
     * @param UploadedFile|null $fileone
     * @return void
     */
    public function setFileone(?UploadedFile $fileone)
    {
        $this->fileone = $fileone;
    }
    /**
     * @return UploadedFile|null
     */
    public function getFiletwo(): ?UploadedFile
    {
//        dd($this->fileone);
        return $this->filetwo;
    }

    /**
     * @param UploadedFile|null $filetwo
     * @return void
     */
    public function setFiletwo(?UploadedFile $filetwo)
    {
        $this->filetwo = $filetwo;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFilethree(): ?UploadedFile
    {
        return $this->filethree;
    }

    /**
     * @param UploadedFile|null $filethree
     * @return void
     */
    public function setFilethree(?UploadedFile $filethree)
    {
        $this->filethree = $filethree;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFilefour(): ?UploadedFile
    {
        return $this->filefour;
    }

    /**
     * @param UploadedFile|null $filefour
     * @return void
     */
    public function setFilefour(?UploadedFile $filefour)
    {
        $this->filefour = $filefour;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFilefive(): ?UploadedFile
    {
        return $this->filefive;
    }

    /**
     * @param UploadedFile|null $filefive
     * @return void
     */
    public function setFilefive(?UploadedFile $filefive)
    {
        $this->filefive = $filefive;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFilesix(): ?UploadedFile
    {
        return $this->filesix;
    }

    /**
     * @param UploadedFile|null $filesix
     * @return void
     */
    public function setFilesix(?UploadedFile $filesix)
    {
        $this->filesix = $filesix;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFileseven(): ?UploadedFile
    {
        return $this->fileseven;
    }

    /**
     * @param UploadedFile|null $fileseven
     * @return void
     */
    public function setFileseven(?UploadedFile $fileseven)
    {
        $this->fileseven = $fileseven;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFileeight(): ?UploadedFile
    {
        return $this->fileeight;
    }

    /**
     * @param UploadedFile|null $fileeight
     * @return void
     */
    public function setFileeight(?UploadedFile $fileeight)
    {
        $this->fileeight = $fileeight;
    }


    /**
     * @return UploadedFile|null
     */
    public function getFilenine(): ?UploadedFile
    {
        return $this->filenine;
    }

    /**
     * @param UploadedFile|null $filenine
     * @return void
     */
    public function setFilenine(?UploadedFile $filenine)
    {
        $this->filenine = $filenine;
    }


    /**
     * @return UploadedFile|null
     */
    public function getFileten(): ?UploadedFile
    {
        return $this->fileten;
    }

    /**
     * @param UploadedFile|null $fileten
     * @return void
     */
    public function setFileten(?UploadedFile $fileten)
    {
        $this->fileten = $fileten;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFileeleven(): ?UploadedFile
    {
        return $this->fileeleven;
    }

    /**
     * @param UploadedFile|null $fileeleven
     * @return void
     */
    public function setFileeleven(?UploadedFile $fileeleven)
    {
        $this->fileeleven = $fileeleven;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFiletwelve(): ?UploadedFile
    {
        return $this->filetwelve;
    }

    /**
     * @param UploadedFile|null $filetwelve
     * @return void
     */
    public function setFiletwelve(?UploadedFile $filetwelve)
    {
        $this->filetwelve = $filetwelve;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFilethird(): ?UploadedFile
    {
        return $this->filethird;
    }

    /**
     * @param UploadedFile|null $filethird
     * @return void
     */
    public function setFilethird(?UploadedFile $filethird)
    {
        $this->filethird = $filethird;
    }

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




    public function getLogoone(){
        return $this->logoone;
    }
    /**
     * @param string|null $logoone
     * @return void
     */
    public function setLogoone(?string $logoone){
        $this->logoone = $logoone;
    }

    public function getLogotwo(){
        return $this->logotwo;
    }
    /**
     * @param string|null $logotwo
     * @return void
     */
    public function setLogotwo(?string $logotwo){
        $this->logotwo = $logotwo;
    }

    public function getLogothree(){
        return $this->logothree;
    }
    /**
     * @param string|null $logothree
     * @return void
     */
    public function setLogothree(?string $logothree){
        $this->logothree = $logothree;
    }

    public function getLogofour(){
        return $this->logofour;
    }
    /**
     * @param string|null $logofour
     * @return void
     */
    public function setLogofour(?string $logofour){
        $this->logofour = $logofour;
    }

    public function getLogofive(){
        return $this->logofive;
    }
    /**
     * @param string|null $logofive
     * @return void
     */
    public function setLogofive(?string $logofive){
        $this->logofive = $logofive;
    }

    public function getLogosix(){
        return $this->logosix;
    }
    /**
     * @param string|null $logosix
     * @return void
     */
    public function setLogosix (?string $logosix){
        $this->logosix = $logosix;
    }

    public function getLogoseven(){
        return $this->logoseven;
    }
    /**
     * @param string|null $logoseven
     * @return void
     */
    public function setLogoseven (?string $logoseven){
        $this->logoseven = $logoseven;
    }

    public function getLogoeight(){
        return $this->logoeight;
    }
    /**
     * @param string|null $logoeight
     * @return void
     */
    public function setLogoeight (?string $logoeight){
        $this->logoeight = $logoeight;
    }


    public function getLogonine(){
        return $this->logonine;
    }
    /**
     * @param string|null $logonine
     * @return void
     */
    public function setLogonine (?string $logonine){
        $this->logonine = $logonine;
    }

    public function getLogoten(){
        return $this->logoten;
    }
    /**
     * @param string|null $logoten
     * @return void
     */
    public function setLogoten (?string $logoten){
        $this->logoten = $logoten;
    }

    public function getLogoeleven(){
        return $this->logoevelen;
    }
    /**
     * @param string|null $logoevelen
     * @return void
     */
    public function setLogoeleven (?string $logoevelen){
        $this->logoevelen = $logoevelen;
    }

    public function getLogotwelve(){
        return $this->logotwelve;
    }
    /**
     * @param string|null $logotwelve
     * @return void
     */
    public function setLogotwelve (?string $logotwelve){
        $this->logotwelve = $logotwelve;
    }

    public function getLogothird(){
        return $this->logothird;
    }
    /**
     * @param string|null $logothird
     * @return void
     */
    public function setLogothird (?string $logothird){
        $this->logothird = $logothird;
    }


    /**
     * @param Client $client
     * @return static
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromModel(Client $client): self
    {
        return new static([
            'id' => $client->id,
            'clinicid' =>$client->clinicid,
            'name' =>$client->name,
            'logo'=>$client->logo,
            'logoone'=>$client->logoone,
            'logotwo'=>$client->logotwo,
            'logothree'=>$client->logothree,
            'logofour'=>$client->logofour,
            'logofive'=>$client->logofive,
            'logosix'=>$client->logosix,
            'logoseven'=>$client->logoseven,
            'logoeight'=>$client->logoeight,
            'logonine'=>$client->logonine,
            'logoten'=>$client->logoten,
            'logoevelen'=>$client->logoevelen,
            'logotwelve'=>$client->logotwelve,
            'logothird'=>$client->logothird,
            'ssn' =>$client->ssn,
            'indnpi' =>$client->indnpi,
            'mdnppa' =>$client->mdnppa,
            'ps' =>$client->ps,
            'dob' =>$client->dob,
            'phone' =>$client->phone,
            'email' =>$client->email,
            'statel' =>$client->statel,
            'lid' =>$client->lid,
            'led' =>$client->led,
            'driverl' =>$client->driverl,
            'dlid' =>$client->dlid,
            'dled' =>$client->dled,
            'deal' =>$client->deal,
            'deaid' =>$client->deaid,
            'deaed' =>$client->deaed,
            'dpsl' =>$client->dpsl,
            'dpsid' =>$client->dpsid,
            'dpsed' =>$client->dpsed,
            'medicarenum' =>$client->medicarenum,
            'medicareeff' =>$client->medicareeff,
            'medicaidnum' =>$client->medicaidnum,
            'medicaideff' =>$client->medicaideff,
            'caqhnum' =>$client->caqhnum,
            'username' =>$client->username,
            'password' =>$client->password,
            'pob' =>$client->pob,
            'sob' =>$client->sob,
            'citizenship' =>$client->citizenship,
            'hospitalprivileges' =>$client->hospitalprivileges,
            'is_active'=>$client->is_active,
            'created_at' => $client->created_at,
            'updated_at' => $client->updated_at,
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
            'clinicid' => $request->get('clinicid'),
            'file' => $request->file('file'),
            'fileone' => $request->file('fileone'),
            'filetwo' => $request->file('filetwo'),
            'filethree' => $request->file('filethree'),
            'filefour' => $request->file('filefour'),
            'filefive' => $request->file('filefive'),
            'filesix' => $request->file('filesix'),
            'fileseven' => $request->file('fileseven'),
            'fileeight' => $request->file('fileeight'),
            'filenine' => $request->file('filenine'),
            'fileten' => $request->file('fileten'),
            'fileeleven' => $request->file('fileeleven'),
            'filetwelve' => $request->file('filetwelve'),
            'filethird' => $request->file('filethird'),
            'ssn' => $request->get('ssn'),
            'indnpi' => $request->get('indnpi'),
            'mdnppa' => $request->get('mdnppa'),
            'ps' => $request->get('ps'),
            'dob' => $request->get('dob'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'statel' => $request->get('statel'),
            'lid' => $request->get('lid'),
            'led' => $request->get('led'),
            'driverl' => $request->get('driverl'),
            'dlid' => $request->get('dlid'),
            'dled' => $request->get('dled'),
            'deal' => $request->get('deal'),
            'deaid' => $request->get('deaid'),
            'deaed' => $request->get('deaed'),
            'dpsl' => $request->get('dpsl'),
            'dpsid' => $request->get('dpsid'),
            'dpsed' => $request->get('dpsed'),
            'medicarenum' => $request->get('medicarenum'),
            'medicareeff' => $request->get('medicareeff'),
            'medicaidnum' => $request->get('medicaidnum'),
            'medicaideff' => $request->get('medicaideff'),
            'caqhnum' => $request->get('caqhnum'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'pob' => $request->get('pob'),
            'sob' => $request->get('sob'),
            'citizenship' => $request->get('citizenship'),
            'hospitalprivileges' => $request->get('hospitalprivileges'),
            'is_active' => $request->get('is_active'),
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function toRequest(Request $request): static
    {
        $this->setName($request->get('name') ?? "");
        $this->setClinicid($request->get('clinicid') ?? "");
        if($this->setFile($request->file('file'))) {
            $this->setFile($request->file('file') ?? "");
        }
        if($this->setFileone($request->file('fileone'))) {
            $this->setFileone($request->file('fileone') ?? "");
        }
        if($this->setFiletwo($request->file('filetwo'))) {
            $this->setFiletwo($request->file('filetwo') ?? "");
        }
        if($this->setFilethree($request->file('filethree'))) {
            $this->setFilethree($request->file('filethree') ?? "");
        }
        if($this->setFilefour($request->file('filefour'))) {
            $this->setFilefour($request->file('filefour') ?? "");
        }
        if($this->setFilefive($request->file('filefive'))) {
            $this->setFilefive($request->file('filefive') ?? "");
        }
        if($this->setFilesix($request->file('filesix'))) {
            $this->setFilesix($request->file('filesix') ?? "");
        }
        if($this->setFileseven($request->file('fileseven'))) {
            $this->setFileseven($request->file('fileseven') ?? "");
        }
        if($this->setFileeight($request->file('fileeight'))) {
            $this->setFileeight($request->file('fileeight') ?? "");
        }
        if($this->setFilenine($request->file('filenine'))) {
            $this->setFilenine($request->file('filenine') ?? "");
        }
        if($this->setFileten($request->file('fileten'))) {
            $this->setFileten($request->file('fileten') ?? "");
        }
        if($this->setFileeleven($request->file('fileeleven'))) {
            $this->setFileeleven($request->file('fileeleven') ?? "");
        }
        if($this->setFiletwelve($request->file('filetwelve'))) {
            $this->setFiletwelve($request->file('filetwelve') ?? "");
        }
        if($this->setFilethird($request->file('filethird'))) {
            $this->setFilethird($request->file('filethird') ?? "");
        }
        $this->setSsn($request->get('ssn') ?? "");
        $this->setIndnpi($request->get('indnpi') ?? "");
        $this->setMdnppa($request->get('mdnppa') ?? "");
        $this->setPs($request->get('ps') ?? "");
        $this->setDob($request->get('dob') ?? "");
        $this->setPhone($request->get('phone') ?? "");
        $this->setEmail($request->get('email') ?? "");
        $this->setStatel($request->get('statel') ?? "");
        $this->setLid($request->get('lid') ?? "");
        $this->setLed($request->get('led') ?? "");
        $this->setDriverl($request->get('driverl') ?? "");
        $this->setDlid($request->get('dlid') ?? "");
        $this->setDled($request->get('dled') ?? "");
        $this->setDeal($request->get('deal') ?? "");
        $this->setDeaid($request->get('deaid') ?? "");
        $this->setDeaed($request->get('deaed') ?? "");
        $this->setDpsl($request->get('dpsl') ?? "");
        $this->setDpsid($request->get('dpsid') ?? "");
        $this->setDpsed($request->get('dpsed') ?? "");
        $this->setMedicarenum($request->get('medicarenum') ?? "");
        $this->setMedicareeff($request->get('medicareeff') ?? "");
        $this->setMedicaidnum($request->get('medicaidnum') ?? "");
        $this->setMedicaideff($request->get('medicaideff') ?? "");
        $this->setCaqhnum($request->get('caqhnum') ?? "");
        $this->setUsername($request->get('username') ?? "");
        $this->setPassword($request->get('password') ?? "");
        $this->setPob($request->get('pob') ?? "");
        $this->setSob($request->get('sob') ?? "");
        $this->setCitizenship($request->get('citizenship') ?? "");
        $this->setHospitalprivileges($request->get('hospitalprivileges') ?? "");
        $this->setIsActive($request->get('is_active') ?? "" );
        $this->setUpdatedAt(now());
        return $this;
    }
}
