<?php
use Phinx\Seed\AbstractSeed;

/**
 * AssetMediaTypesVulnerabilities seed.
 */
class AssetMediaTypesVulnerabilitiesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'asset_media_type_id' => '1',
                'vulnerability_id' => '2',
            ],
            [
                'id' => '2',
                'asset_media_type_id' => '1',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '3',
                'asset_media_type_id' => '3',
                'vulnerability_id' => '1',
            ],
            [
                'id' => '4',
                'asset_media_type_id' => '3',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '5',
                'asset_media_type_id' => '5',
                'vulnerability_id' => '2',
            ],
            [
                'id' => '6',
                'asset_media_type_id' => '5',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '7',
                'asset_media_type_id' => '6',
                'vulnerability_id' => '2',
            ],
            [
                'id' => '8',
                'asset_media_type_id' => '6',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '9',
                'asset_media_type_id' => '7',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '10',
                'asset_media_type_id' => '8',
                'vulnerability_id' => '3',
            ],
            [
                'id' => '11',
                'asset_media_type_id' => '8',
                'vulnerability_id' => '2',
            ],
        ];

        $table = $this->table('asset_media_types_vulnerabilities');
        $table->insert($data)->save();
    }
}
