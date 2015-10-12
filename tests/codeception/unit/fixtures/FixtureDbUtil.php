<?php
namespace tests\codeception\unit\fixtures;

/**
 * Исправляет некоторые недостатки оригинальной реализации
 *
 * @author Самойлов Владимир <leammas@gmail.com>
 */
trait FixtureDbUtil 
{

    protected function resetTable()
    {
        $this->db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
        parent::resetTable();
    }

    public function unload()
    {
        $this->resetTable();
    }

}
