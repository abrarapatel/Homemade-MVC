<?php class AjaxPracModel extends Dbh
{
    function __construct()
    {
    }

    protected function updateTitleDesc($id, $title, $desc)
    {
        $sql = "UPDATE plans SET p_title = ?, p_description = ? WHERE p_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $desc, $id]);
    }
}
