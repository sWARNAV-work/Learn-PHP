<?php
// Exampul 
// test('NameOfTest', function () {
//     expect(false)->toBeTrue();
// });

use core\Container;

test("Whether it can resolve something out of the container.", function ()
{
    $test = new Container;
    $test->bind("Gemdu", fn() => "giri");

    $result = $test->resolve("Gemdu");
    expect($result)->toEqual("Nonsense");

});