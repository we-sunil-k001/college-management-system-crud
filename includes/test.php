<?php
if (extension_loaded('pdo_mysql')) {
    echo "PDO MySQL extension is enabled.";
} else {
    echo "PDO MySQL extension is not enabled.";
}
?>