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
            'background' => 'rgb(245,222,179)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'lemonade' => array(
            'name' => 'Lemonade',
            'background' => 'rgb(245,247,196)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'bluesky' => array(
            'name' => 'Blue Sky',
            'background' => '#80d9ff',
            'border' => 'rgb(0, 0, 0)',
        ),
        'snow' => array(
            'name' => 'Snow',
            'background' => 'rgb(255,255,255)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'maize' => array(
            'name' => 'Maize',
            'background' => '#fbec5d',
            'border' => 'rgb(0, 0, 0)',
        ),
        'orange' => array(
            'name' => 'Orange',
            'background' => '#ffc44d',
            'border' => 'rgb(0, 0, 0)',
        ),
        'crispin' => array(
            'name' => 'Crispin',
            'background' => 'rgb(222,240,165)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'sunburn' => array(
            'name' => 'Sunburn',
            'background' => '#ffaabb',
            'border' => 'rgb(0, 0, 0)',
        ),
        'cloudy' => array(
            'name' => 'Cloudy',
            'background' => 'rgb(211,211,208)',
            'border' => 'rgb(0, 0, 0)',
        ),
        'violet' => array(
            'name' => 'Violet',
            'background' => '#cca3ff',
            'border' => 'rgb(0, 0, 0)',
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
