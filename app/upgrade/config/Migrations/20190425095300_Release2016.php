<?php
use Phinx\Migration\AbstractMigration;

class Release2016 extends AbstractMigration
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

            App::uses('ConnectionManager', 'Model');
            App::uses('ClassRegistry', 'Utility');

            $ds = ConnectionManager::getDataSource('default');
            $ds->cacheSources = false;

            ClassRegistry::init('Setting')->deleteCache(null);

            App::uses('AppModule', 'Lib');
            AppModule::loadAll();
            
            ClassRegistry::flush();

            if (Configure::read('Eramba.version') === 'e2.0.15') {
                App::uses('AdvancedFiltersModule', 'AdvancedFilters.Lib');
                
                $AdvancedFiltersModule = new AdvancedFiltersModule();
                $ret &= $AdvancedFiltersModule->migrateFilterArgs();

                // synchronize missing notification objects
                // bug until release 16 for subsections that had objects automatically created
                // during creation of their parent object
                $ret &= ClassRegistry::init('NotificationSystem.NotificationSystem')->sync();

                App::uses('DashboardCalendar', 'Dashboard.Lib');
                $DashboardCalendar = new DashboardCalendar();
                $ret &= $DashboardCalendar->sync();

                // App::uses('ObjectStatusModule', 'ObjectStatus.Lib');
                // $ObjectStatusModule = new ObjectStatusModule();
                // $ret &= (bool) $ObjectStatusModule->syncAllStatuses([
                //     'ComplianceManagement'
                // ]);
            }

            ClassRegistry::init('Setting')->deleteCache(null);
        }

        if (!$ret) {
            App::uses('CakeLog', 'Log');
            $log = "Error occured when processing database synchronization for new template.";
            CakeLog::write('error', "{$log} \n" . print_r($status, true));

            throw new Exception($log, 1);
            return false;
        }
    }

    public function up()
    {
        $this->bumpVersion('e2.0.16');
    }

    public function down()
    {
        $this->bumpVersion('e2.0.15');
    }
}