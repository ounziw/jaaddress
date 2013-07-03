<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

Nos\I18n::current_dictionary(array('local::jaform', 'noviusos_form::common'));

$pref = array(
    __('hokkaido'), __('aomori'), __('iwate'), __('miyagi'), __('akita'), __('yamagata'), __('fukushima'),
    __('ibaraki'), __('tochigi'), __('gunma'), __('saitama'), __('chiba'), __('tokyo'), __('kanagawa'),
    __('niigata'), __('toyama'), __('ishikawa'), __('fukui'), __('yamanashi'), __('nagano'),
    __('gifu'), __('shizuoka'), __('aichi'), __('mie'),
    __('shiga'), __('kyoto'), __('osaka'), __('hyogo'), __('nara'), __('wakayama'),
    __('tottori'), __('shimane'), __('okayama'), __('hiroshima'), __('yamaguchi'),
    __('tokushima'), __('kagawa'), __('ehime'), __('kochi'),
    __('fukuoka'), __('saga'), __('nagasaki'), __('kumamoto'), __('oita'), __('miyazaki'), __('kagoshima'), __('okinawa'));

$config = \Config::load('noviusos_form::metadata', true);
if ($config['zip'] === 'two') {
    $layout = "postal1=1,postal2=1\npref=1\nline_1=4\nline_2=4";
    $zip = array(
        'postal1' => array(
            'field_type' => 'text',
            'field_label' => __('zip1'),
            'field_technical_id' => 'zip21',
        ),
        'postal2' => array(
            'field_type' => 'text',
            'field_label' => __('zip2'),
            'field_technical_id' => 'zip22',
        )
    );
} else {
    $layout = "postal=2\npref=1\nline_1=4\nline_2=4";
    $zip = array(
        'postal' => array(
            'field_type' => 'text',
            'field_label' => __('zip'),
            'field_technical_id' => 'zip22',
        )
    );
}

return array(
    'fields_meta' => array(
        'special' => array(
            'jpaddress' => array(
                'icon' => 'static/apps/noviusos_form/img/fields/address.png',
                'title' => __('ja_address'),
                'definition' => array(
                    'layout' => $layout,
                    'fields_list' => array_merge($zip, array(
                        'pref' => array(
                            'field_type' => 'select',
                            'field_label' => __('prefecture'),
                            'field_choices' => implode("\n", $pref),
                            'field_technical_id' => 'pref21',
                        ),
                        'line_1' => array(
                            'field_type' => 'text',
                            'field_label' => __('First address line:'),
                            'field_technical_id' => 'addr21',
                        ),
                        'line_2' => array(
                            'field_type' => 'text',
                            'field_label' => __('Second address line:'),
                            'field_technical_id' => 'strt21',
                        ),
                    )),
                ),
            ),
        ),
    ),
);