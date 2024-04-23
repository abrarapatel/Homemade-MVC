<?php

class IndexModel extends Dbh
{
    function __construct()
    {
    }

    protected function getPlans($cat)
    {
        $sql = "SELECT * FROM plans WHERE p_category = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cat]);

        $result = $stmt->fetchAll();
        return $result;
    }
}
