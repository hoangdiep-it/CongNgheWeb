
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin đồ án</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <label for="computer_id">Tên máy tính:</label>
    <select name="computer_id" required>
        @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                {{ $computer->computer_name }} - {{ $computer->model }}
            </option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
        <input type="text" class="form-control" name="reported_by" value="{{ $issue->reported_by }}" required>
    </div>
    <div class="mb-3">
        <label for="reported_date" class="form-label">Thời gian báo cáo</label>
        <input type="date" class="form-control" name="reported_date" value="{{ date('Y-m-d', strtotime($issue->reported_date)) }}" required>
    </div>


    <div class="form-group">
        <label for="urgency">Mức độ sự cố</label>
        <select name="urgency" class="form-control" required>
            <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
            <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" required>
            <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
            <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>

    
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>