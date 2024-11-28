<?php include 'employees.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./font/css/all.min.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Quản Lý Nhân Viên</h2>
            <div class="buttons">
                <button class="add-btn" onclick="showAddEmployeeForm()">Thêm Nhân Viên Mới</button>
            </div>
        </div>
        <table id="employeeTable">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getEmployees() as $index => $employee): ?>
                <tr>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['address']; ?></td>
                    <td><?php echo $employee['phone']; ?></td>
                    <td>
                        <button class="edit-btn" onclick="showEditEmployeeForm(<?php echo $index; ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="delete-btn" onclick="deleteEmployee(<?php echo $index; ?>)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Modal for Add/Edit Employee -->
        <div id="employeeModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <form id="employeeForm" onsubmit="return saveEmployee(event)">
                    <input type="hidden" id="employeeIndex" value="">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" required>
                    <label for="address">Địa Chỉ:</label>
                    <input type="text" id="address" required>
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="text" id="phone" required>
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showAddEmployeeForm() {
            document.getElementById('employeeIndex').value = '';
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('address').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('employeeModal').style.display = 'block';
        }

        function showEditEmployeeForm(index) {
            const employee = <?php echo json_encode(getEmployees()); ?>[index];
            document.getElementById('employeeIndex').value = index;
            document.getElementById('name').value = employee.name;
            document.getElementById('email').value = employee.email;
            document.getElementById('address').value = employee.address;
            document.getElementById('phone').value = employee.phone;
            document.getElementById('employeeModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('employeeModal').style.display = 'none';
        }

        function saveEmployee(event) {
            event.preventDefault();
            const index = document.getElementById('employeeIndex').value;
            const employee = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                address: document.getElementById('address').value,
                phone: document.getElementById('phone').value
            };

            if (index) {
                // Update existing employee
                fetch('employees.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ action: 'update', index: index, employee: employee })
                }).then(() => location.reload());
            } else {
                // Add new employee
                fetch('employees.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ action: 'add', employee: employee })
                }).then(() => location.reload());
            }
            closeModal();
        }

        function deleteEmployee(index) {
            fetch('employees.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ action: 'delete', index: index })
            }).then(() => location.reload());
        }
    </script>
</body>
</html>