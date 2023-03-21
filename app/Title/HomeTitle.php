<?php 

namespace App\Title;

/**
 * Documentation
 * 
 * @method static getTitle(string $page)
 */

class HomeTitle {
    /**
     * Greet text property
     */
    private CONST HOME = [
        'HOME'              => 'Home Module | Index',
        'HOME_GRAPH'        => 'Home Module | Graph',
        'HOME_DASHBOARD'    => 'Home Module | Dashboard'
    ];

    /**
     * Get title of page
     * 
     * @param string
     * @return string
     */
    public static function getTitle(string $page = 'HOME'): string 
    {
        $upperPageName = strtoupper($page);
        return isset(self::HOME[$upperPageName]) ? self::HOME[$upperPageName] : self::HOME['HOME'];
    }
}