<?php

/**
 * Model_Car
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Model_Car extends Model_Base_Car
{
   public static function findAll()
    {
        return Doctrine_Query::create()
                      ->from('Model_Car c')->execute();
    }
}