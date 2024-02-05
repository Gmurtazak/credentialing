<?php

namespace App\Services\Client;

use App\Dto\ClientData;
use App\Models\Client;
use App\Repositories\Client\IClientRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;
use function PHPUnit\Framework\isEmpty;


class ClientService
{
    /**
     * @var
     */
    protected IClientRepository $repository;

    /**
     * @param IClientRepository $categoryRepository
     */
    public function __construct(IClientRepository $clientRepository)
    {
        $this->repository = $clientRepository;
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function getById(int $category_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($category_id);
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function find(int $category_id): ?Model
    {
        return $this->repository->find($category_id);
    }

    /**
     * @param string $client_name
     * @return string
     */
    public function findname(string $client_name): mixed
    {
        return $this->repository->where('name', $client_name)->all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->sortBy('id','desc')->all();
    }

    /**
     * @param $attr
     * @param $value
     * @return Model|null
     */
    public function findByAttribute($attr,$value): ?Model
    {
        return $this->repository->findByAttribute($attr, $value);
    }

    /**
     * @param ClientData $clientData
     * @return Model|null
     */
    public function create(ClientData $clientData): ?Model
    {

        $clientData->setCreatedAt(now());
        $upload_file_path = 'provider/';
        if($clientData->getFile()){
            $new_file_name = time() . '_logo.' . $clientData->getFile()->getClientOriginalName();
            $clientData->setLogo($new_file_name);
            $clientData->getFile()->storeAs($upload_file_path, $new_file_name);
        }

        if($clientData->getFileone()){
            $new_file_nameo = time() . '_logoone.' . $clientData->getFileone()->getClientOriginalName();
            $clientData->setLogoone($new_file_nameo);
            $clientData->getFileone()->storeAs($upload_file_path, $new_file_nameo);
        }
        if($clientData->getFiletwo()){
            $new_file_namet = time() . '_logotwo.' . $clientData->getFiletwo()->getClientOriginalName();
            $clientData->setLogotwo($new_file_namet);
            $clientData->getFiletwo()->storeAs($upload_file_path, $new_file_namet);
        }
        if($clientData->getFilethree()){
            $new_file_name = time() . '_logothree.' . $clientData->getFilethree()->getClientOriginalName();
            $clientData->setLogothree($new_file_name);
            $clientData->getFilethree()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilefour()){
            $new_file_name = time() . '_logofour.' . $clientData->getFilefour()->getClientOriginalName();
            $clientData->setLogofour($new_file_name);
            $clientData->getFilefour()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilefive()){
            $new_file_name = time() . '_logofive.' . $clientData->getFilefive()->getClientOriginalName();
            $clientData->setLogofive($new_file_name);
            $clientData->getFilefive()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilesix()){
            $new_file_name = time() . '_logosix.' . $clientData->getFilesix()->getClientOriginalName();
            $clientData->setLogosix($new_file_name);
            $clientData->getFilesix()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileseven()){
            $new_file_name = time() . '_logoseven.' . $clientData->getFileseven()->getClientOriginalName();
            $clientData->setLogoseven($new_file_name);
            $clientData->getFileseven()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileeight()){
            $new_file_name = time() . '_logoeight.' . $clientData->getFileeight()->getClientOriginalName();
            $clientData->setLogoeight($new_file_name);
            $clientData->getFileeight()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilenine()){
            $new_file_name = time() . '_logonine.' . $clientData->getFilenine()->getClientOriginalName();
            $clientData->setLogonine($new_file_name);
            $clientData->getFilenine()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileten()){
            $new_file_name = time() . '_logotene.' . $clientData->getFileten()->getClientOriginalName();
            $clientData->setLogoten($new_file_name);
            $clientData->getFileten()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileeleven()){
            $new_file_name = time() . '_logoeleven.' . $clientData->getFileeleven()->getClientOriginalName();
            $clientData->setLogoeleven($new_file_name);
            $clientData->getFileeleven()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFiletwelve()){
            $new_file_name = time() . '_logotwelve.' . $clientData->getFiletwelve()->getClientOriginalName();
            $clientData->setLogotwelve($new_file_name);
            $clientData->getFiletwelve()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilethird()){
            $new_file_name = time() . '_logothird.' . $clientData->getFilethird()->getClientOriginalName();
            $clientData->setLogothird($new_file_name);
            $clientData->getFilethird()->storeAs($upload_file_path, $new_file_name);
        }
        return $this->repository->create($clientData->except('id')->toArray());
    }

    public function createbysaleform($request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->save();
        return  $client->id;
    }

    /**
     * @param ClientData $clientData
     * @return Model|null
     */
    public function update(ClientData $clientData): ?Model
    {
        $clientData->setUpdatedAt(now());
        $upload_file_path = 'provider/';
        if($clientData->getFile()){
            $new_file_name = time() . '_logo.' . $clientData->getFile()->getClientOriginalName();
            $clientData->setLogo($new_file_name);
            $clientData->getFile()->storeAs($upload_file_path, $new_file_name);
        }

        if($clientData->getFileone()){
            $new_file_nameo = time() . '_logoone.' . $clientData->getFileone()->getClientOriginalName();
            $clientData->setLogoone($new_file_nameo);
            $clientData->getFileone()->storeAs($upload_file_path, $new_file_nameo);
        }
        if($clientData->getFiletwo()){
            $new_file_namet = time() . '_logotwo.' . $clientData->getFiletwo()->getClientOriginalName();
            $clientData->setLogotwo($new_file_namet);
            $clientData->getFiletwo()->storeAs($upload_file_path, $new_file_namet);
        }
        if($clientData->getFilethree()){
            $new_file_name = time() . '_logothree.' . $clientData->getFilethree()->getClientOriginalName();
            $clientData->setLogothree($new_file_name);
            $clientData->getFilethree()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilefour()){
            $new_file_name = time() . '_logofour.' . $clientData->getFilefour()->getClientOriginalName();
            $clientData->setLogofour($new_file_name);
            $clientData->getFilefour()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilefive()){
            $new_file_name = time() . '_logofive.' . $clientData->getFilefive()->getClientOriginalName();
            $clientData->setLogofive($new_file_name);
            $clientData->getFilefive()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilesix()){
            $new_file_name = time() . '_logosix.' . $clientData->getFilesix()->getClientOriginalName();
            $clientData->setLogosix($new_file_name);
            $clientData->getFilesix()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileseven()){
            $new_file_name = time() . '_logoseven.' . $clientData->getFileseven()->getClientOriginalName();
            $clientData->setLogoseven($new_file_name);
            $clientData->getFileseven()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileeight()){
            $new_file_name = time() . '_logoeight.' . $clientData->getFileeight()->getClientOriginalName();
            $clientData->setLogoeight($new_file_name);
            $clientData->getFileeight()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilenine()){
            $new_file_name = time() . '_logonine.' . $clientData->getFilenine()->getClientOriginalName();
            $clientData->setLogonine($new_file_name);
            $clientData->getFilenine()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileten()){
            $new_file_name = time() . '_logotene.' . $clientData->getFileten()->getClientOriginalName();
            $clientData->setLogoten($new_file_name);
            $clientData->getFileten()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFileeleven()){
            $new_file_name = time() . '_logoeleven.' . $clientData->getFileeleven()->getClientOriginalName();
            $clientData->setLogoeleven($new_file_name);
            $clientData->getFileeleven()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFiletwelve()){
            $new_file_name = time() . '_logotwelve.' . $clientData->getFiletwelve()->getClientOriginalName();
            $clientData->setLogotwelve($new_file_name);
            $clientData->getFiletwelve()->storeAs($upload_file_path, $new_file_name);
        }
        if($clientData->getFilethird()){
            $new_file_name = time() . '_logothird.' . $clientData->getFilethird()->getClientOriginalName();
            $clientData->setLogothird($new_file_name);
            $clientData->getFilethird()->storeAs($upload_file_path, $new_file_name);
        }
        return $this->repository->update($clientData->getId(), $clientData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
