<?php

namespace Kanboard\Model;

/**
 * Color model
 *
 * @package  model
 * @author   Frederic Guillot
 */
class Color extends Base
{
    /**
     * Default colors
     *
     * @access private
     * @var array
     */
    private $default_colors = array(
        'wheat' => array(
            'name' => 'Wheat',
            'background' => 'rgb(245, 222, 179)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'white' => array(
            'name' => 'White',
            'background' => 'rgb(255, 255, 255)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'yellow' => array(
            'name' => 'Yellow',
            'background' => 'rgb(245, 247, 196)',
            'border' => 'rgb(223, 227, 45)',
        ),
        'blue' => array(
            'name' => 'Blue',
            'background' => 'rgb(219, 235, 255)',
            'border' => 'rgb(168, 207, 255)',
        ),
        'purple' => array(
            'name' => 'Purple',
            'background' => 'rgb(223, 176, 255)',
            'border' => 'rgb(205, 133, 254)',
        ),
        'red' => array(
            'name' => 'Red',
            'background' => 'rgb(255, 187, 187)',
            'border' => 'rgb(255, 151, 151)',
        ),
        'orange' => array(
            'name' => 'Orange',
            'background' => 'rgb(255, 215, 179)',
            'border' => 'rgb(255, 172, 98)',
        ),
        'amber' => array(
            'name' => 'Amber',
            'background' => '#ffe082',
            'border' => '#ffa000',
        ),
        'brown' => array(
            'name' => 'Brown',
            'background' => '#d7ccc8',
            'border' => '#4e342e',
        ),
        'dark_grey' => array(
            'name' => 'Dark Grey',
            'background' => '#cfd8dc',
            'border' => '#455a64',
        ),
        'light_green' => array(
            'name' => 'Light Green',
            'background' => '#dcedc8',
            'border' => '#689f38',
        ),
        'grey' => array(
            'name' => 'Grey',
            'background' => 'rgb(238, 238, 238)',
            'border' => 'rgb(204, 204, 204)',
        ),
    );

    /**
     * Find a color id from the name or the id
     *
     * @access public
     * @param  string  $color
     * @return string
     */
    public function find($color)
    {
        $color = strtolower($color);

        foreach ($this->default_colors as $color_id => $params) {
            if ($color_id === $color) {
                return $color_id;
            } elseif ($color === strtolower($params['name'])) {
                return $color_id;
            }
        }

        return '';
    }

    /**
     * Get color properties
     *
     * @access public
     * @param  string  $color_id
     * @return array
     */
    public function getColorProperties($color_id)
    {
        if (isset($this->default_colors[$color_id])) {
            return $this->default_colors[$color_id];
        }

        return $this->default_colors[$this->getDefaultColor()];
    }

    /**
     * Get available colors
     *
     * @access public
     * @return array
     */
    public function getList($prepend = false)
    {
        $listing = $prepend ? array('' => t('All colors')) : array();

        foreach ($this->default_colors as $color_id => $color) {
            $listing[$color_id] = t($color['name']);
        }

        return $listing;
    }

    /**
     * Get the default color
     *
     * @access public
     * @return string
     */
    public function getDefaultColor()
    {
        return $this->config->get('default_color', 'yellow');
    }

    /**
     * Get the default colors
     *
     * @access public
     * @return array
     */
    public function getDefaultColors()
    {
        return $this->default_colors;
    }

    /**
     * Get Bordercolor from string
     *
     * @access public
     * @param  string   $color_id   Color id
     * @return string
     */
    public function getBorderColor($color_id)
    {
        $color = $this->getColorProperties($color_id);
        return $color['border'];
    }

    /**
     * Get background color from the color_id
     *
     * @access public
     * @param  string   $color_id   Color id
     * @return string
     */
    public function getBackgroundColor($color_id)
    {
        $color = $this->getColorProperties($color_id);
        return $color['background'];
    }

    /**
     * Get CSS stylesheet of all colors
     *
     * @access public
     * @return string
     */
    public function getCss()
    {
        $buffer = '';

        foreach ($this->default_colors as $color => $values) {
            $buffer .= 'div.color-'.$color.' {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'];
            $buffer .= '}';
            $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'}';
        }

        return $buffer;
    }
}
