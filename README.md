<a href="http://www.bornfight.com">
<img width="84px" src="https://github.com/bornfight/wp-modal-plugin/blob/master/static/icons/bf-logo-dark.svg" title="Bornfight" alt="Bornfight">
</a>

## WP MODAL PLUGIN

> WordPress plugin for converting pages and post types to modals

## Table of Contents

- [Installation](#installation)
- [Features](#features)
- [Usage](#usage)
- [FAQ](#faq)
- [Support](#support)
- [License](#license)

## Installation

> WordPress plugin install

## Features

- converting pages to modal
- converting default post type to modal
- converting custom post types to modal
- registering custom modal templates
- overriding modal templates
- custom js events

## Usage

1. Converting Pages to modals

Edit Page -> Is Modal (Yes)

Choose archive page (page that opens in background of modal)


2. Converting Post Types to modal

WP Modal Options -> Choose post type to convert

3. Registering modal templates

Use wpbfml_register_modal_templates( array $templates ) {}

```
$templates = array('Default Modal Template', 'Test Modal Template');

if ( function_exists( 'wpbfml_register_modal_templates' ) ) {
    wpbfml_register_modal_templates( array( 'Default Template', 'Test Modal Template' ) );
 }
```

Name of templates are created with WordPress function sanitize_title_with_dashes()

Example: Default Modal Template -> default-modal-template

4. Overriding templates

All templates can be found in templates folder
To override for example modal content template
Create folder templates/wp-modal-plugin/layout/ and inside modal-inner.php file

Overrides can be also for post types.

Example: modal-inner_{post_type}

Plugin also provides possibility to add custom modal templates
So to override modal content file you can register and use modal templates

To override with templates example: modal-inner_{template-name}

5. Opening popups
* add class js-wpbfml-modal-trigger -> it triggers endpoint to populate modal
* data-post-data-id (required) -> id of post/page to pull content from
* data-return-url(optional) -> returning URL, by default returns to current URL modal is opened from

```
<a href="<?= get_permalink( $post_id ); ?>" class="js-wpbfml-modal-trigger" data-post-data-id="<?= 42; ?>">
    This is a test page Link
</a>
```

6. Custom JS Events
   * wpbfml:init-modal
   * wpbfml:open-modal
   * wpbfml:close-modal
   * wpbfml:populate-modal
   * wpbfml:after-populate-modal

## Support
Reach out to us:

- email <a href="mailto: wpadmin@bornfight.com" target="_blank">`wpadmin@bornfight.com`</a>

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2020 © <a href="https://www.bornfight.com" target="_blank">Bornfight</a>.
