<?php
    $action = $_GET['action'] ?? '';
    if ($action === 'on') {
        exec("sudo python3 /home/pi/relai.py > /dev/null 2>&1 &");
    } else if ($action === 'off') {
        $pid = trim(shell_exec("pgrep -f relai.py"));
        if ($pid) {
            exec("sudo kill -2 " . $pid);
        }
    }
    echo json_encode(['status' => 'ok']);
?>
