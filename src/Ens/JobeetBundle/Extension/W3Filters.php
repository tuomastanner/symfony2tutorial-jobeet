<?php
namespace Ens\JobeetBundle\Extension;

class W3Filters extends \Twig_Extension {

    public function getFilters() {
        return array(
            'var_dump'   => new \Twig_Filter_Function('var_dump'),
            'highlight'  => new \Twig_Filter_Method($this, 'highlight'),
            'slug'  => new \Twig_Filter_Method($this, 'slug'),
        );
    }

    public function highlight($sentence, $expr) {
        return preg_replace('/(' . $expr . ')/',
                            '<span style="color:red">\1</span>', $sentence);
    }
    static public function slug($text)
    {
        $text = preg_replace('/\W+/u', '-', $text); // replace all non letters or digits with -
        $text = mb_strtolower(trim($text, '-'), 'UTF-8'); // trim and lowercase
        return $text;
    }

    public function getName()
    {
        return 'w3_filters';
    }

}