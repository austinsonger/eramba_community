<?php
use Phinx\Migration\AbstractMigration;

class Release44 extends AbstractMigration
{
    protected function bumpVersion($value) {
        $ret = true;

        $this->query("UPDATE `settings` SET `value`='" . $value . "' WHERE `settings`.`variable`='DB_SCHEMA_VERSION'");

        if (class_exists('App')) {
            $status = [];
            App::uses('Configure', 'Core');

            if (class_exists('Configure')) {
                Configure::write('Eramba.Settings.DB_SCHEMA_VERSION', $value);
            }

            // testing handler for exception
            if (Configure::read('Eramba.TRIGGER_UPDATE_FAIL') === true) {
                $status['ConfiguredFailTriggered'] = true;
                throw new Exception("This is a test exception for failed update.", 1);
                return false;
            }

            $cacheDisable = Configure::read('Cache.disable');
            Configure::write('Cache.disable', true);

            App::uses('ConnectionManager', 'Model');
            App::uses('ClassRegistry', 'Utility');

            $ds = ConnectionManager::getDataSource('default');
            $ds->cacheSources = false;

            ClassRegistry::init('Setting')->deleteCache(null);

            if (Configure::read('Eramba.version') === 'e1.0.6.043') {
                $this->recalculateRiskScores();
            }

            Configure::write('Cache.disable', $cacheDisable);

            ClassRegistry::init('Setting')->deleteCache(null);
        }

        if (!$ret) {
            App::uses('CakeLog', 'Log');
            $log = "Error occured when processing database synchronization for release 1.0.6.044.";
            CakeLog::write('error', "{$log} \n" . print_r($status, true));

            throw new Exception($log, 1);
            return false;
        }
    }

    // recalculate risk scores after fixes to it in this update package
    public function recalculateRiskScores() {
        $models = [
            'Risk' => 'Asset',
            'ThirdPartyRisk' => 'ThirdParty',
            'BusinessContinuity' => 'BusinessUnit'
        ];

        foreach ($models as $riskModel => $assocModel) {
            $Model = ClassRegistry::init($riskModel);
            $ids = $Model->find('list', ['fields' => "{$Model->alias}.id"]);

            foreach ($ids as $id) {
                $Model->afterSaveRiskScore($id, $assocModel);
            }
        }
    }

    public function up()
    {
        $this->bumpVersion('e1.0.1.024');
    }

    public function down()
    {
        $this->bumpVersion('e1.0.1.023');
    }
}
