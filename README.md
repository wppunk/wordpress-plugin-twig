# WordPress plugin template

## Structure
```
admin/ - Admin area
--assets/ - Asset files for admin area
----css/
------main.css
----js/
------main.js
--views/ - Twig views for admin area
----page-options.twig - Plugin options template
--admin.php - Main class for admin panel
core/ - Business logic
--main.php - All hooks and basic settigs
front/ - Front area
--assets/ - Assets files for front area 
----css/
------main.css
----js/
------main.js
--views/ - Twig views for front area
----partial.twig
--front.php - Main class for front area
includes/
--autoload.php - Autoload you classes
--controller.php - Controller for twig
--hook.php - Model for hook
--loader.php - Loader for include hooks
tests/ - Test folder
--phpunit/
--bootstrap.php
composer.json
composer.lock
custom-plugin.php - Main file
phpunit.xml.dist
```

## Twig
For using twig need extends your class from Plugin_Name\Includes\Controller

```php
//admin/admin.php

use Plugin_Name\Includes\Conroller;

class Admin extends Controller {

    private $options;

    public function __constuct() {
        parent::__constuct( __DIR__ ); // __DIR__ - path to the directory where your views folder is located. You can use several directories passing them to an array.
        $this->options = get_option('plugin_name');
    }
    
    public function page_options() {
        $options = 
        $this->render( 'page-options', [
            'options' => $this->options;
        ]
    }

}
```

```twig
# admin/views/page-options.twig #
{{ dump(options) }}
```

## Autoload
WordPress uses its style guide. Class Autoload will automatically load classes if you follow the spelling of namespaces.

Namespace should describe the location of your class in the plugin. For example:
`namespace Plugin_Name\Front;` means the file is located `plugin-name/front/file`

Each world in class name should be a capital letter. 
The file name should be the same as the class name, but in lower case and between the words a hyphen `-`. For example: class `Some_Class` filename will be `some-class.php` 