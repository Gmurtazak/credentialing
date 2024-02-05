<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property string|null $subregion
 * @property string|null $timezones
 * @property string|null $translations
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $emoji
 * @property string|null $emojiU
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property Collection|City[] $cities
 * @property Collection|State[] $states
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';

	protected $casts = [
		'latitude' => 'float',
		'longitude' => 'float',
		'flag' => 'bool'
	];

	protected $fillable = [
		'name',
		'iso3',
		'numeric_code',
		'iso2',
		'phonecode',
		'capital',
		'currency',
		'currency_name',
		'currency_symbol',
		'tld',
		'native',
		'region',
		'subregion',
		'timezones',
		'translations',
		'latitude',
		'longitude',
		'emoji',
		'emojiU',
		'flag',
		'wikiDataId'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}

	public function states()
	{
		return $this->hasMany(State::class);
	}
}
