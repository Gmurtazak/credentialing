<?php

namespace App\Support\Dto;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ListViewData
 * @package Support\Dto
 */
class ListViewData extends DataTransferObject
{
    /**
     * @var bool
     */
    protected $ignoreMissing = true;

    /**
     * @var string|null
     */
    public ?string $query;
    /**
     * @var string
     */
    public string $sortByColumn = 'id';
    /**
     * @var string
     */
    public string $sortByDirection = 'desc';
    /**
     * @var int
     */
    public int $page = 1;
    /**
     * @var int
     */
    public int $perPage = 100;

    /**
     * @var bool
     */
    public bool $isExternalPath = false;

    /**
     * @var Collection|null
     */
    public ?Collection $filter;

    public int $userId = 0;
    public ?int $team = 0;
    public ?int $bidder = 0;
    public ?int $closer = 0;

    public string $sale = "";
    public ?string $dates;

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(Request $request): ListViewData
    {
        return new self([
            'query' => $request->get('query',''),
            'sortByColumn' => $request->get('col','id'),
            'sortByDirection' => $request->get('dir','desc'),
            'page' => $request->get('page',1),
            'perPage' => $request->get('per_page',100),
            'isExternalPath' => $request->get('is_external_path',false),
            'filter' => collect($request->get('filter',[])),
            'userId' => $request->get('userId',0),
            'team' => $request->get('team',0),
            'bidder' => $request->get('bidder',0),
            'closer' => $request->get('closer',0),
            'sale' => $request->get('sale',''),
            'dates' => $request->get('dates',''),
        ]);
    }

}
