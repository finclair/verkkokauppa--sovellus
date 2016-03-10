<?php

// null is default parameter for $queryParameters
function executeQuery($query, $queryParameters = null) {
    global $dbh;
    $stmt = $dbh->prepare($query);
    
    if ($queryParameters == null) {
        $ok = $stmt->execute();
    }
    else {
        $ok = $stmt->execute($queryParameters);
    }
    if (!$ok) { print_r($stmt->errorInfo()); }
    $dbh = null;

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>