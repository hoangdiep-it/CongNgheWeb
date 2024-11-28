<?php
$employees = [
    ["name" => "Diep", "email" => "diep@mail.com", "address" => "Bac Giang, Viet Nam", "phone" => "012345678"],
];

?>
<?php
session_start();

if (!isset($_SESSION['employees'])) {
    $_SESSION['employees'] = [
        ["name" => "Diep", "email" => "diep@mail.com", "address" => "Bac Giang, Viet Nam", "phone" => "012345678"],
    ];
}

function getEmployees() {
    return $_SESSION['employees'];
}

function addEmployee($employee) {
    $_SESSION['employees'][] = $employee;
}

function updateEmployee($index, $employee) {
    $_SESSION['employees'][$index] = $employee;
}

function deleteEmployee($index) {
    unset($_SESSION['employees'][$index]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data['action'] === 'add') {
        addEmployee($data['employee']);
    } elseif ($data['action'] === 'update') {
        updateEmployee($data['index'], $data['employee']);
    } elseif ($data['action'] === 'delete') {
        deleteEmployee($data['index']);
    }
}
?>