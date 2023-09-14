<?php
/*
Plugin Name: WC Order Numbers Prefix & Suffix
Description: Allows users to customize WooCommerce order numbers with date and time formatting.
Version: 1.0
Author: Mukto
Author URI: https://mukto.info
License: GPLv2
Text Domain: custom-order-numbers
*/

// Add the admin menu page
function custom_order_numbers_menu() {
    add_submenu_page(
        'woocommerce',
        'Custom Order Numbers',
        'Custom Order Numbers',
        'manage_options',
        'custom-order-numbers-settings',
        'custom_order_numbers_settings_page'
    );
}
add_action('admin_menu', 'custom_order_numbers_menu');

// Settings page callback
function custom_order_numbers_settings_page() {
    // Handle form submissions and save data
    if (isset($_POST['submit'])) {
        if (isset($_POST['custom_order_numbers_prefix'])) {
            update_option('custom_order_numbers_prefix', sanitize_text_field($_POST['custom_order_numbers_prefix']));
        }

        if (isset($_POST['custom_order_numbers_suffix'])) {
            update_option('custom_order_numbers_suffix', sanitize_text_field($_POST['custom_order_numbers_suffix']));
        }
    }

    ?>
<div class="wrap">
    <h2>WC Order Numbers Prefix & Suffix</h2>
    <form method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">Prefix</th>
                <td>
                    <input type="text" name="custom_order_numbers_prefix"
                        value="<?php echo esc_attr(get_option('custom_order_numbers_prefix', '')); ?>">
                    <p class="description">Enter the Prefix for custom order numbers. Use format placeholders like {Y},
                        {M}, {D}, {H}, {i}, etc.</p>
                </td>
            </tr>
            <tr>
                <th scope="row">Suffix</th>
                <td>
                    <input type="text" name="custom_order_numbers_suffix"
                        value="<?php echo esc_attr(get_option('custom_order_numbers_suffix', '')); ?>">
                    <p class="description">Enter the Suffix for custom order numbers. Use format placeholders like {Y},
                        {M}, {D}, {H}, {i}, etc.</p>
                </td>
            </tr>
        </table>
        
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
        <hr>
        <p class="description">
        <h3>Format placeholders:</h3>
        <ul>
            <li>{d} - Day of the month (01 to 31)</li>
            <li>{D} - Day textual representation (three letters)</li>
            <li>{j} - Day of the month without leading zeros (1 to 31)</li>
            <li>{l} - A full textual representation of a day</li>
            <li>{N} - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)</li>
            <li>{S} - The English ordinal suffix for the day of the month (2 characters st, nd, rd, or th. Works well
                with {j})</li>
            <li>{w} - A numeric representation of the day (0 for Sunday, 6 for Saturday)</li>
            <li>{z} - The day of the year (from 0 through 365)</li>
            <li>{W} - The ISO-8601 week number of the year (weeks starting on Monday)</li>
            <li>{F} - A full textual representation of a month (January through December)</li>
            <li>{m} - A numeric representation of a month (from 01 to 12)</li>
            <li>{M} - A short textual representation of a month (three letters)</li>
            <li>{n} - A numeric representation of a month, without leading zeros (1 to 12)</li>
            <li>{t} - The number of days in the given month</li>
            <li>{L} - Whether it's a leap year (1 if it is a leap year, 0 otherwise)</li>
            <li>{o} - The ISO-8601 year number</li>
            <li>{Y} - A four-digit representation of a year</li>
            <li>{y} - A two-digit representation of a year</li>
            <li>{a} - Lowercase am or pm</li>
            <li>{A} - Uppercase AM or PM</li>
            <li>{B} - Swatch Internet time (000 to 999)</li>
            <li>{g} - 12-hour format of an hour (1 to 12)</li>
            <li>{G} - 24-hour format of an hour (0 to 23)</li>
            <li>{h} - 12-hour format of an hour (01 to 12)</li>
            <li>{H} - 24-hour format of an hour (00 to 23)</li>
            <li>{i} - Minutes with leading zeros (00 to 59)</li>
            <li>{s} - Seconds, with leading zeros (00 to 59)</li>
            <li>{u} - Microseconds (added in PHP 5.2.2)</li>
            <li>{e} - The timezone identifier (Examples: UTC, GMT, Atlantic/Azores)</li>
            <li>{I} (capital i) - Whether the date is in daylight savings time (1 if Daylight Savings Time, 0 otherwise)
            </li>
            <li>{O} - Difference to Greenwich time (GMT) in hours (Example: +0100)</li>
            <li>{P} - Difference to Greenwich time (GMT) in hours:minutes (added in PHP 5.1.3)</li>
            <li>{T} - Timezone abbreviations (Examples: EST, MDT)</li>
            <li>{Z} - Timezone offset in seconds. The offset for timezones west of UTC is negative (-43200 to 50400)
            </li>
            <li>{c} - The ISO-8601 date (e.g., 2013-05-05T16:34:42+00:00)</li>
            <li>{r} - The RFC 2822 formatted date (e.g., Fri, 12 Apr 2013 12:01:05 +0200)</li>
            <li>{U} - The seconds since the Unix Epoch (January 1, 1970, 00:00:00 GMT)</li>

        </ul>
        </p>
    </form>
</div>
<?php
}

// Save and display custom order numbers with date and time formatting
function custom_order_numbers_filter($order_number, $order) {
    $prefix = get_option('custom_order_numbers_prefix', '');
    $suffix = get_option('custom_order_numbers_suffix', '');

    // Replace format placeholders with corresponding date and time values
    $prefix = preg_replace_callback('/\{([^}]+)\}/', function($matches) {
        return date_i18n($matches[1]);
    }, $prefix);

    $suffix = preg_replace_callback('/\{([^}]+)\}/', function($matches) {
        return date_i18n($matches[1]);
    }, $suffix);

    // Construct the custom order number
    $custom_order_number = $prefix . $order->get_id() . $suffix;

    return $custom_order_number;
}
add_filter('woocommerce_order_number', 'custom_order_numbers_filter', 10, 2);

// Handle form submissions and save data
function custom_order_numbers_save_settings() {
    if (isset($_POST['submit'])) {
        if (isset($_POST['custom_order_numbers_prefix'])) {
            update_option('custom_order_numbers_prefix', sanitize_text_field($_POST['custom_order_numbers_prefix']));
        }

        if (isset($_POST['custom_order_numbers_suffix'])) {
            update_option('custom_order_numbers_suffix', sanitize_text_field($_POST['custom_order_numbers_suffix']));
        }
    }
}
add_action('admin_init', 'custom_order_numbers_save_settings');