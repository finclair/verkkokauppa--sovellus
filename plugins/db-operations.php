
<?php
function executeQuery($query) {
    global $dbh;
    $stmt = $dbh->prepare($query);
    $ok = $stmt->execute();
    if (!$ok) { print_r($stmt->errorInfo()); }
    $dbh = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>