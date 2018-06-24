<?php

/**
 * SubSubCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SubSubCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SubSubCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SubSubCategory');
    }

    public function tmGetItems($params)
    {
        $q = self::getInstance()
            ->createQuery('a')
            ->where('a.sub_category_id = ?', $params['sub_category_id'])
            ->andWhere('a.is_active = ?', true)
            ->orderBy('a.name ASC');

        return $q->execute();

    }
}