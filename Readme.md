# WC Order Numbers Prefix & Suffix Plugin

WC Order Numbers Prefix & Suffix is a WordPress plugin that allows you to customize WooCommerce order numbers with date and time formatting and additional prefixes or suffixes.

## Installation

Follow these steps to install and configure the plugin:

1. **Download the Plugin**
   - Download the "WC Order Numbers Prefix & Suffix" plugin ZIP file from [the plugin's GitHub repository](https://github.com/muktoapb/wc-order-number-prefix-suffix/tree/main) or [Direct download link](https://github.com/muktoapb/wc-order-number-prefix-suffix/archive/refs/heads/main.zip).

2. **Install the Plugin**
   - Log in to your WordPress Admin Dashboard.
   - Navigate to **Plugins > Add New**.
   - Click on the **Upload Plugin** button at the top of the page.
   - Choose the ZIP file you downloaded in Step 1 and click **Install Now**.
   - After installation, click **Activate** to activate the plugin.

3. **Access Plugin Settings**
   - After activation, a new menu item named **WC Order Numbers Prefix & Suffix** will appear in your WordPress Admin sidebar under the WooCommerce menu.

4. **Configure Order Number Format**
   - Click on the **WC Order Numbers Prefix & Suffix** menu item.
   - You'll find fields for configuring the prefix and suffix for your order numbers.
   - Use format placeholders like `{Y}`, `{M}`, `{D}`, `{H}`, `{i}`, etc., to customize the order number format with date and time values.

5. **Save Changes**
   - After configuring your order number format, click the **Save Changes** button to save your settings.

6. **Customize Order Numbers**
   - The plugin will now customize your order numbers according to the format you specified when new orders are created.

## Format Placeholders

You can use the following format placeholders in the prefix and suffix to customize your order numbers:

- `{d}` - Day of the month (01 to 31)
- `{D}` - Day textual representation (three letters)
- `{j}` - Day of the month without leading zeros (1 to 31)
- `{l}` - A full textual representation of a day
- `{N}` - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)
- `{S}` - The English ordinal suffix for the day of the month (2 characters st, nd, rd, or th. Works well with `{j}`)
- `{w}` - A numeric representation of the day (0 for Sunday, 6 for Saturday)
- `{z}` - The day of the year (from 0 through 365)
- `{W}` - The ISO-8601 week number of the year (weeks starting on Monday)
- `{F}` - A full textual representation of a month (January through December)
- `{m}` - A numeric representation of a month (from 01 to 12)
- `{M}` - A short textual representation of a month (three letters)
- `{n}` - A numeric representation of a month, without leading zeros (1 to 12)
- `{t}` - The number of days in the given month
- `{L}` - Whether it's a leap year (1 if it is a leap year, 0 otherwise)
- `{o}` - The ISO-8601 year number
- `{Y}` - A four-digit representation of a year
- `{y}` - A two-digit representation of a year
- `{a}` - Lowercase am or pm
- `{A}` - Uppercase AM or PM
- `{B}` - Swatch Internet time (000 to 999)
- `{g}` - 12-hour format of an hour (1 to 12)
- `{G}` - 24-hour format of an hour (0 to 23)
- `{h}` - 12-hour format of an hour (01 to 12)
- `{H}` - 24-hour format of an hour (00 to 23)
- `{i}` - Minutes with leading zeros (00 to 59)
- `{s}` - Seconds, with leading zeros (00 to 59)
- `{u}` - Microseconds (added in PHP 5.2.2)
- `{e}` - The timezone identifier (Examples: UTC, GMT, Atlantic/Azores)
- `{I}` (capital i) - Whether the date is in daylight savings time (1 if Daylight Savings Time, 0 otherwise)
- `{O}` - Difference to Greenwich time (GMT) in hours (Example: +0100)
- `{P}` - Difference to Greenwich time (GMT) in hours:minutes (added in PHP 5.1.3)
- `{T}` - Timezone abbreviations (Examples: EST, MDT)
- `{Z}` - Timezone offset in seconds. The offset for timezones west of UTC is negative (-43200 to 50400)
- `{c}` - The ISO-8601 date (e.g., 2013-05-05T16:34:42+00:00)
- `{r}` - The RFC 2822 formatted date (e.g., Fri, 12 Apr 2013 12:01:05 +0200)
- `{U}` - The seconds since the Unix Epoch (January 1, 1970, 00:00:00 GMT)

## Support and Feedback

If you encounter any issues or have questions about this plugin, please feel free to [contact me](mailto:hello@mukto.info). We welcome your feedback and suggestions.

---

**WC Order Numbers Prefix & Suffix** Plugin developed by [MUKTO](https://mukto.info/).
