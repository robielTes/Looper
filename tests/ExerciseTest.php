<?php

require 'models/Exercise.php';

use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase
{

    /**
     * @covers $exercise->index()
     */
    public function testIndex()
    {
        $exercise = new Exercise();
        $this->assertEquals(10,count($exercise->index()));
    }

    /**
     * @covers $exercise->show()
     */
    public function testShow()
    {
        $exercise = new Exercise();
        $this->assertNull($exercise->show(3));
    }

    /**
     * @covers $exercise->store()
     */
    public function testStore()
    {
        $exercise = new Exercise();
        $title = $exercise->title;
        $exercise->state = 2;
        $this->assertTrue($exercise->store());
    }

    /**
     * @covers $exercise->create()
     */
    public function testCreate()
    {
        $exercise = new Exercise();
        $exercise->state = 1;
        $this->assertTrue($exercise->create('test'));
    }


    /**
     * @covers $exercise->destroy(id)
     */
    public function testDestroy()
    {
        $exercise = new Exercise();
        $this->assertFalse($exercise::destroy(1));
    }

}
