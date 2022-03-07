<?php

class CarType
{
    final const SUV = 'SUV';
    final const MPV = 'MPV';
    final const HATCHBACK = 'HATCHBACK';
}

class SedanCarType extends CarType
{
    //const HATCHBACK = 'MINI SEDAN'; // cannot override
}