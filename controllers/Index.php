<?php namespace RainLab\Builder\Controllers;

use Backend\Classes\Controller;
use Backend\Traits\InspectableContainer;
use RainLab\Builder\Widgets\PluginList;
use RainLab\Builder\Traits\IndexPluginOperations;
use ApplicationException;
use Exception;
use BackendMenu;

/**
 * Builder index controller
 *
 * @package rainlab\builder
 * @author Alexey Bobkov, Samuel Georges
 */
class Index extends Controller
{
    use InspectableContainer;
 
     public $implement = [
        'RainLab.Builder.Behaviors.IndexPluginOperations'
    ];

    public $requiredPermissions = ['rainlab.buileder.*'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('RainLab.Builder', 'builder');

        $this->bodyClass = 'compact-container side-panel-not-fixed';
        $this->pageTitle = 'rainlab.builder::lang.plugin.name';

        new PluginList($this, 'pluginList');
    }

    public function index()
    {
        // TODO: combine the scripts
        $this->addJs('/plugins/rainlab/builder/assets/js/builder.index.entity.base.js', 'RainLab.Builder');
        $this->addJs('/plugins/rainlab/builder/assets/js/builder.index.entity.plugin.js', 'RainLab.Builder');
        $this->addJs('/plugins/rainlab/builder/assets/js/builder.index.js', 'RainLab.Builder');
    }
}