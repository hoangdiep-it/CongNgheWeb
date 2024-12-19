<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản lý phòng máy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
    }
    .table-wrapper {
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-title {
      background-color: #435d7d;
      color: #fff;
      padding: 16px;
      border-radius: 10px 10px 0 0;
    }
    .table-title h2 {
      margin: 0;
      font-size: 20px;
    }
    .table-title .btn {
      background-color: #28a745;
      color: #fff;
    }
    .table th, .table td {
      vertical-align: middle;
      text-align: center;
    }
    .table td .btn {
      margin: 0 5px;
      font-size: 16px;
      padding: 8px 15px;
    }
    .btn-primary {
      background-color: #007bff;
    }
    .btn-danger {
      background-color: #dc3545;
    }
    .modal-content {
      border-radius: 10px;
    }
    .badge {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="container-xl">
  <div class="table-wrapper">
    <div class="table-title d-flex justify-content-between align-items-center">
      <h2>Quản lý <b>Vấn Đề</b></h2>
      <a href="{{ route('issues.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm đồ án mới</a>
    </div>
    @if(session('success'))
      <div class="alert alert-success mt-3">
        {{ session('success') }}
      </div>
    @endif
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>Mã vấn đề</th>
          <th>Tên máy tính</th>
          <th>Tên phiên bản</th>
          <th>Ng báo cáo sự cố</th>
          <th>Tg báo cáo</th>
          <th>Mức độ</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($issues as $issue)
        <tr>
          <td>{{ $issue->id }}</td>
          <td>{{ $issue->computer->computer_name }}</td>
          <td>{{ $issue->computer->model }}</td>
          <td>{{ $issue->reported_by }}</td>
          <td>{{ $issue->reported_date }}</td>
          <td>
            <span class="badge {{ $issue->urgency == 'High' ? 'bg-danger' : ($issue->urgency == 'Medium' ? 'bg-warning' : 'bg-success') }}">
              {{ $issue->urgency }}
            </span>
          </td>
          <td>
            <span class="badge {{ $issue->status == 'Resolved' ? 'bg-success' : 'bg-secondary' }}">
              {{ $issue->status }}
            </span>
          </td>
          <td>
            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">
              <i class="fa fa-pencil"></i> Sửa
            </a>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
              <i class="fa fa-trash"></i> Xóa
            </button>
          </td>
        </tr>
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Bạn có chắc chắn muốn xóa vấn đề này không?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $issues->links('pagination::bootstrap-4') }}
    </div>
  </div>
</div>
</body>
</html>
