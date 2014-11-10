<?php

namespace aCube\SmartUI;

use aCube\SmartUI\Components\SmartUI;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['accordion'] = $this->app->share(function($app)
        {
            // smartui code
            $panels = array(
                'panel1' => 'Collapsible Group Item #1',
                'panel2' => 'Collapsible Group Item #2',
                'panel3' => 'Collapsible Group Item #3'
            );

            return new Components\Accordion($panels);            
        });
        
        $this->app['button'] = $this->app->share(function($app)
        {
            return new Components\Button();            
        });
        
        $this->app['carousel'] = $this->app->share(function($app)
        {
            $items = array(
                asset("img/demo/m3.jpg"),
                asset("img/demo/m1.jpg"),
                asset("img/demo/m2.jpg"),
            );

            return new Components\Carousel($items);            
        });
        
        $this->app['datatable'] = $this->app->share(function($app)
        {
            $data = array(
                [
                    "ID" => "1",
                    "Name" => "Jennifer",
                    "Phone" => "1-342-463-8341",
                    "Company" => "Et Rutrum Non Associates",
                    "Zip" => "35728",
                    "City" => "Fogo",
                    "Date" => "03\/04\/14"
                ],
            );

            return new Components\DataTable($data);            
        });
        
        $this->app['info'] = $this->app->share(function($app)
        {
            return new Components\Info(array());            
        });

        $this->app['nav'] = $this->app->share(function($app)
        {
            return new Components\Nav(array());            
        });

        $this->app['smartform'] = $this->app->share(function($app){
            $fields = array(
                'fname' => array(
                    'type' => 'input', // or FormField::FORM_FIELD_INPUT
                    'col' => 6,
                    'properties' => array(
                         'placeholder' => 'First name',
                         'icon' => 'fa-user',
                         'icon_append' => false
                    )
                ),
            );
            return new Components\SmartForm($fields);
        });

        $this->app['smartui'] = $this->app->share(function($app)
        {
            return new Components\SmartUI();            
        });

        $this->app['tab'] = $this->app->share(function($app)
        {
            $tabs = array(
                'tab1' => 'My Tab', 
                'tab2' => 'My Tab 2', 
                'tab3' => 'My Tab 3'
            );

            return new Components\Tab($tabs);            
        });

        $this->app['widget'] = $this->app->share(function($app)
        {
            return new Components\Widget();            
        });

        $this->app['wizard'] = $this->app->share(function($app)
        {
            return new Components\Wizard(array());            
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('accordion','button', 'carousel', 'datatable', 'info', 'nav', 'smartform', 'smartui', 'tab', 'widget','wizard');
    }

} 