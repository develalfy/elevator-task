<?php
//Elevator stops problem
//There is an elevator in a building with X floors. This elevator can take a max of Y people at a time. Given that a set of people and the floor they need to stop, how many stops has the elevator
// taken to serve all the people? Consider the elevator serves in "first come first serve" basis and the order for the queue can not be changed.
//
//Sample test case:
//A = [2, 3, 5] | Answer = 5 (2, 3, G, 5, G)
//Let Array A be the floors where each person needs to be dropped off A = [2, 3, 5].
//The building has 10 floors, maximum of 2 persons are allowed in the elevator at a time. For this example, the elevator would take total of 5 stops in floors: 2, 3, G, 5 and finally G.
//
//More test cases:
//A = [2, 2, 4, 5, 6] | Answer = 7 (2, G, 4, 5, G, 6, G)
//A = [5, 5, 5, 5]    | Answer = 4 (5, G, 5, G)
//
//Guidelines
//
//What we want
//
//php script that will process input and show the answer
//
//
//Restrictions
//
//Vanilla PHP

$floors = [2, 3, 5];
$floors = [2, 2, 4, 5, 6];
$floors = [5,5,5,5];

$stops = 0;

$elevates = array_chunk($floors, 2);

$countableFloors = [];
foreach ($elevates as $elevate) {
    $countableFloors = array_merge($countableFloors, array_unique($elevate));
}

$stops += count($elevates) + count($countableFloors);
echo $stops;