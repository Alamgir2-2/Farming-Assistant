<?php


class userFactory
{


    public function getUser($type)
    {

        if ($type == "farmer") {
            return new farmer();
        }
        if ($type == "customer") {
            return new customer();
        }
        if ($type == "admin") {
            return new admin();
        }
        if ($type == "agriculturist") {
            return new agriculturist();
        }
    }
}