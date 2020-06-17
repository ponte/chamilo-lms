<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Migrations\Schema\V110;

use Chamilo\CoreBundle\Migrations\AbstractMigrationChamilo;
use Doctrine\DBAL\Schema\Schema;

/**
 * Class Version20150527120703
 * LP autolunch -> autolaunch.
 */
class Version20150527101600 extends AbstractMigrationChamilo
{
    public function up(Schema $schema)
    {
        $this->addSettingCurrent(
            'gamification_mode',
            '',
            'radio',
            'Platform',
            0,
            'GamificationModeTitle',
            'GamificationModeComment',
            null,
            '',
            1,
            true,
            false,
            [
                [
                    'value' => 1,
                    'text' => 'Yes',
                ],
                [
                    'value' => 0,
                    'text' => 'No',
                ],
            ]
        );
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM settings_options WHERE variable = 'gamification_mode'");
        $this->addSql("DELETE FROM settings_current WHERE variable = 'gamification_mode'");
    }
}