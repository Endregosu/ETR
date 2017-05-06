<body>
<?php
include_once('../config.php');
//// -- SQL QUERY
$stid = oci_parse($conn, 'SELECT * FROM EMP');
oci_execute($stid);

echo '<table>';
//// -- COLUMN NAME
$nfields = oci_num_fields($stid);
echo '<tr>';
for ($i = 1; $i<=$nfields; $i++){
    $field = oci_field_name($stid, $i);
    echo '<td>' . $field . '</td>';
}
echo '</tr>';

//// -- SQL QUERY #2
oci_execute($stid);
while ( $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
    echo '<tr>';
    foreach ($row as $item) {
        echo '<td>' . $item . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

//// -- CLOSE CONN
oci_close($conn);
?>
</body>
</html>
